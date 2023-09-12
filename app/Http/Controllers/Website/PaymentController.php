<?php

namespace App\Http\Controllers\Website;

use App\Models\Installer;
use Illuminate\Http\Request;
use App\Models\SaleTransaction;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use App\Models\PickupLocation;
use App\Models\ProductFitting;
use App\Models\Setting;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use App\Repositories\Interfaces\CustomerTypeRepositoryInterface;
use App\Repositories\Interfaces\SaleTransactionRepositoryInterface;
use App\Repositories\Interfaces\CartRepositoryInterface;
use Error;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Stripe\PaymentIntent;

class PaymentController extends Controller
{

    private $saleTransactionRepository,
        $customerTypeRepository,$cartRepository;


    /**
     * __construct
     *
     * @param  mixed $saleTransactionRepository
     * @return void
     */
    public function __construct(
        SaleTransactionRepositoryInterface $saleTransactionRepository,
        CustomerTypeRepositoryInterface $customerTypeRepository,
        CartRepositoryInterface $cartRepository
    ) {
        $this->saleTransactionRepository = $saleTransactionRepository;
        $this->customerTypeRepository = $customerTypeRepository;
        $this->cartRepository = $cartRepository;
    }

    /**
     * create
     *
     * @return View
     */
    public function create(): View|RedirectResponse
    {
        if (session()->has('cart') && count(session()->get('cart')) > 0) {
            // Pick-up locations
            $pickupLocations = PickupLocation::all();
            return view('payment', compact('pickupLocations'));
        } else {
            return redirect()->route('index')->with('error', 'Cart is empty!');
        }
    }

    /**
     * store
     *
     * @param  mixed $request
     * @return RedirectResponse
     */
    public function store(Request $request)
    {
        $customer = $request->validate([
            'name' => 'required|array',
            'email' => 'required|email',
            'phone' => 'required|string',
            'address' => 'required|array',
            'city' => 'required|string',
            'state' => 'required|string',
            'zip_code' => 'required|numeric',
            'country' => 'nullable|string',
            'note' => 'nullable|string',
            'pickup_location_id' => 'nullable|numeric|exists:pickup_locations,id',
            'shipping_provider' => 'nullable|string',
            'shipping_type' => 'nullable|string',
            'payment_method' => 'required|string',
            'payment_log' => 'nullable|string',
            'payment_success' => 'required|string',
        ]);

        $data['customer'] = $customer;
        $data['customer']['name'] = implode(' ', $customer['name']);
        $data['customer']['billing_address'] = implode(' ', $customer['address']);
        $data['customer']['service_address'] = implode(' ', $customer['address']);

        $customerType = $this->customerTypeRepository->findByName('Website');
        if (!$customerType) {
            $customerType = $this->customerTypeRepository->store(['name' => 'Website']);
        }

        $data['customer']['customer_Type_id'] = $customerType->id;

        $payment_address['AddressLine'] = $customer['address'];
        $payment_address['City'] = $customer['city'];
        $payment_address['State'] = $customer['state'];
        $payment_address['ZipCode'] = $customer['zip_code'];
        $payment_address['Country'] = $customer['country'] ?? 'US';

        // setting up the sale transaction
        $data['transaction_type'] = SaleTransaction::TRANSACTION_TYPE_SALE_ORDER;
        $data['service_type'] = SaleTransaction::SERVICE_TYPE_INSHOP;
        $data['status'] = SaleTransaction::TRANSACTION_STATUS_PENDING;
        $data['payment_status'] = ($customer['payment_success']) ? SaleTransaction::PAYMENT_STATUS_PAID : SaleTransaction::PAYMENT_STATUS_UNPAID;
        $data['note'] = $customer['note'];
        $data['tax_type'] = SaleTransaction::TAX_TYPE_DEFAULT;
        $data['installer_id'] = Installer::first()->id;
        $data['payment_method'] = $customer['payment_method'];
        $data['payment_log'] = $customer['payment_log'] ?? null;
        $data['address'] = json_encode($payment_address);
        $data['shipping'] = session()->get('shipping_rate') ?? 0;

        // setting up the sale transaction details
        $data['details'] = [];
        foreach (session()->get('cart') as $id => $item) {
            $data['details'][] = [
                'quantity' => $item['quantity'],
                'rate' => $item['unit_price'],
                'discount' => $item['discount'] ?? 0,
                'tax' => $item['tax'] ?? 0,
                'total' => session()->get('cartTotal') ?? 0,
                'product_id' => $id,
                'product_fitting_id' => $item['product_fitting_id'],
                'pickup_location_id' => $customer['pickup_location_id'] ?? null,
                'shipping_provider' => $customer['shipping_provider'] ?? null,
                'shipping_type' => $customer['shipping_type'] ?? null,
                'shipping_cost' => session()->get('shipping_rate'),
                'shipping_status' => 'pending',
            ];
        }

        // db trasaction commit or rollback
        DB::beginTransaction();
        try {
            $saleTransaction = $this->saleTransactionRepository->store($data);
            DB::commit();

        } catch (\Exception $e) {
            // dd($e->getMessage());
            DB::rollback();
            return false;
        }

        session()->forget('cart');
        session()->forget('cartSubtotal');
        session()->forget('cartTotal');
        session()->forget('shipping_rate');

        //set session saletransaction id
        session()->put('saleTransaction', $this->saleTransactionRepository->findTransaction($saleTransaction->id));
        
    }

    // get glass type by product id from session cart
    public function getGlassType()
    {
        $data['fitting_id'] = [];
        foreach (session()->get('cart') as $id => $item) {
            $data['fitting_id'][] = $item['product_fitting_id'];
        }
        
        $product_fitting = ProductFitting::whereIn('id', $data['fitting_id'])->with('glass');

        // Clone the initial query for allowed_ship
        $product_fitting_ship = clone $product_fitting;
        $data['allowed_ship'] = $product_fitting_ship
                                ->whereHas('glass', function ($query) {
                                    $query->whereNotIn('type', ['Windshield', 'Other']);
                                })->count();

        // Clone the initial query for allowed_pickup
        $product_fitting_pickup = clone $product_fitting;
        $data['allowed_pickup'] = $product_fitting_pickup
                                ->whereHas('glass', function ($query) {
                                    $query->whereIn('type', ['Windshield', 'Other']);
                                })->count();
        
        if($data['allowed_ship'] > 0){
            $shipping = Setting::first('shipping_rate');
            $data['shipping_rate'] = $shipping->shipping_rate * $data['allowed_ship'];

            // put shipping rate in session
            session()->put('shipping_rate', $shipping->shipping_rate);
            
            // add shipping in cartTotal session
            $this->cartRepository->calculateTotal();
        }

        $data['total'] = session()->get('cartTotal');

        $filteredData = collect($data)->except(['fitting_id'])->toArray();
            
        return response()->json($filteredData);
    }

    public function paymentByStripe(){
        try {
            // retrieve JSON from POST body
            $jsonStr = file_get_contents('php://input');
            $jsonObj = json_decode($jsonStr);
            // Create a PaymentIntent with amount and currency
            $paymentIntent = PaymentIntent::create([
                'amount' => $jsonObj->amount[0]->value,
                'currency' => 'usd',
                'automatic_payment_methods' => [
                    'enabled' => true,
                ],
            ]);
        
            $output = [
                'clientSecret' =>  $paymentIntent->client_secret,
            ];
        
            echo json_encode($output);
        } catch (Error $e) {
            http_response_code(500);
            echo json_encode(['error' => $e->getMessage()]);
        }
    }
}
