<?php

namespace App\Http\Controllers\Website;

use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use App\Models\Installer;
use App\Models\SaleTransaction;
use Illuminate\Http\RedirectResponse;
use App\Repositories\Interfaces\CustomerTypeRepositoryInterface;
use App\Repositories\Interfaces\SaleTransactionRepositoryInterface;
use App\Repositories\Interfaces\ServiceInstallationRepositoryInterface;
use App\Repositories\Interfaces\CartRepositoryInterface;
use Illuminate\Support\Facades\DB;

class ServiceInstallationController extends Controller
{

    private $customerTypeRepository, $saleTransactionRepository, $serviceInstallationRepository, $cartRepository;


    /**
     * __construct
     *
     * @param  mixed $saleTransactionRepository
     * @param  mixed $serviceInstallationRepository
     * @param  mixed $cartRepository
     * @return void
     */
    public function __construct(SaleTransactionRepositoryInterface $saleTransactionRepository, ServiceInstallationRepositoryInterface $serviceInstallationRepository, CartRepositoryInterface $cartRepository, CustomerTypeRepositoryInterface $customerTypeRepository)
    {
        $this->customerTypeRepository = $customerTypeRepository;
        $this->saleTransactionRepository = $saleTransactionRepository;
        $this->serviceInstallationRepository = $serviceInstallationRepository;
        $this->cartRepository = $cartRepository;
    }

    /**
     * create
     *
     * @return View
     */
    public function create(): View
    {
        if (session()->has('cart') && count(session()->get('cart')) > 0) {
            session()->forget('cart');
            session()->forget('cartSubtotal');
            session()->forget('cartTotal');
            session()->forget('shipping_rate');
            session()->save();
        }
        $years = $this->serviceInstallationRepository->getAllYear();
        $makes = $this->serviceInstallationRepository->getAllMake();
        return view('vehicle', compact('years', 'makes'));
    }

    /**
     * add-to-cart
     *
     * @param  mixed $request
     */
    public function addToCart(Request $request)
    {
        foreach ($request->product_ids as $key => $value) {
            $this->cartRepository->addProducttoCart($value, 1, $request->fitting_ids[$key]);
        }

        // get last id in sale transaction
        $lastSaleTransaction = SaleTransaction::latest()->first()['id'] ?? 0;
        $lastSaleTransaction = str_pad($lastSaleTransaction + 1, 4, '0', STR_PAD_LEFT);

        return response()->json([
            'cart' => session('cart'),
            'cartSubtotal' => session('cartSubtotal'),
            'cartTotal' => session('cartTotal') + $request->deductible,
            'lastSaleTransaction' => $lastSaleTransaction ?? null,
        ]);
    }

    /**
     * update-cart
     *
     * @param  mixed $request
     * @return View
     */
    public function updateCart(Request $request)
    {
        if (session()->has('cart') && count(session()->get('cart')) > 0) {
            session()->forget('cart');
            session()->forget('cartSubtotal');
            session()->forget('cartTotal');
            session()->save();

            $this->addToCart($request);
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
            'name' => 'required|string',
            'email' => 'required|email',
            'phone' => 'required|string',
            'address' => 'required|string',
            'city' => 'required|string',
            'state' => 'required|string',
            'zip_code' => 'numeric',
            'country' => 'nullable|string',
            'note' => 'nullable|string',
            'appointment_date' => 'required|date',
            'appointment_time' => 'required',
            'fitting' => 'required|string',
            'feature' => 'required|string',
            'glass' => 'required|string',
            'style' => 'numeric',
            'glass_issue' => 'nullable|string',
            'glass_issue_cause' => 'nullable|string',
            'glass_issue_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'vin' => 'nullable|string',
            'payment_method' => 'required|string',
            'payment_log' => 'nullable|string',
            'payment_success' => 'required|string',
            'windsheild_install_type' => 'nullable|string',
        ]);

        // Convert the JSON stringified data back to arrays or objects
        $customer['glass'] = json_decode($customer['glass'], true);
        $customer['fitting'] = json_decode($customer['fitting'], true);
        $customer['feature'] = json_decode($customer['feature'], true);
        $customer['name'] = json_decode($customer['name'], true);
        $customer['address'] = json_decode($customer['address'], true);
        $customer['glass_issue_cause'] = json_decode($customer['glass_issue_cause'], true);

        $customer['name'] = implode(' ', $customer['name']);
        $customer['address'] = implode(',', $customer['address']);

        $data['customer'] = $customer;
        $data['customer']['billing_address'] = $customer['address'];
        $data['customer']['service_address'] = $customer['address'];

        $customerType = $this->customerTypeRepository->findByName('Website');
        if (!$customerType) {
            $customerType = $this->customerTypeRepository->store(['name' => 'Website']);
        }

        $data['customer']['customer_Type_id'] = $customerType->id;

        if($customer['appointment_time'] == 1){
            $data['appointment_time'] = SaleTransaction::APPOINTMENT_TYPE_FIRST;
        }
        elseif($customer['appointment_time'] == 2){
            $data['appointment_time'] = SaleTransaction::APPOINTMENT_TYPE_SECOND;
        }
        else{
            $data['appointment_time'] = SaleTransaction::APPOINTMENT_TYPE_FIRST;
        }

        // setting up the sale transaction
        $data['transaction_type'] = SaleTransaction::TRANSACTION_TYPE_WORK_ORDER;
        $data['service_type'] = SaleTransaction::SERVICE_TYPE_INSHOP;
        $data['status'] = SaleTransaction::TRANSACTION_STATUS_PENDING;
        $data['payment_status'] = ($customer['payment_success']) ? SaleTransaction::PAYMENT_STATUS_PAID : SaleTransaction::PAYMENT_STATUS_UNPAID;
        $data['payment_method'] = $customer['payment_method'];
        $data['payment_log'] = $customer['payment_log'];
        $data['note'] = $customer['note'];
        $data['tax_type'] = SaleTransaction::TAX_TYPE_DEFAULT;
        $data['installer_id'] = Installer::first()->id;
        $data['appointment_date'] = $customer['appointment_date'];
        $data['glass_issue'] = $customer['glass_issue'];
        $data['glass_issue_cause'] = json_encode($customer['glass_issue_cause']);
        $data['windsheild_install_type'] = $customer['windsheild_install_type'];

        // setting up the sale transaction details
        $data['details'] = [];
        $details = [];
        $i = 0;
        foreach (session()->get('cart') as $id => $item) {
            // dd(session()->get('cart'));
            $details[] = [
                'quantity' => $item['quantity'],
                'rate' => $item['unit_price'],
                'discount' => $item['discount'] ?? 0,
                'tax' => $item['tax'] ?? 0,
                'total' => session()->get('cartTotal') ?? 0,
                'product_id' => $id,
                'product_fitting_id' => $item['product_fitting_id'],
                'feature_id' => $customer['feature'][$i] ?? null,
                'glass_id' => $customer['glass'][$i] ?? null,
                'style_id' => $customer['style'],
            ];
            $i++;
        }
        foreach ($details as $key => $value) {
            $data['details'][] = array_filter($details[$key]);
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

    /**
     * getMake
     *
     * @param  mixed $request
     * @return View
     */
    public function getModel(Request $request)
    {
        $make_id = $request->make_id;
        $models = $this->serviceInstallationRepository->getModel($make_id);
        return $models;
    }

    /**
     * getBodyStyle
     *
     * @param  mixed $request
     * @return View
     */
    public function getBodyStyle(Request $request)
    {
        $model_id = $request->model_id;
        $bodyStyles = $this->serviceInstallationRepository->getBodyStyle($model_id);
        return $bodyStyles;
    }

    /**
     * getGlass
     *
     * @param  mixed $request
     * @return View
     */
    public function getGlasses(Request $request){
        // validation
        $request->validate([
            'make_id' => 'required|numeric',
            'model_id' => 'required|numeric',
            'style_id' => 'required|numeric',
            'year_id' => 'required|numeric',
            'email' => 'required|email',
            'phone' => 'required|string',
            'deductible' => 'numeric',
        ]);

        $glasses = $this->serviceInstallationRepository->getGlasses($request->all());

        // if zip code is not exits in zip_codes table
        if(!$this->serviceInstallationRepository->checkZipCode($request->zip_code)){
            return response()->json([
                'message' => '  We are currently not in your area but we are working to service your place. please contact (123) 123-1234 for latested updates and get a quote on phone as well',
                'status' => 404,
            ], 404);
        }

        return $glasses;
    }

    /**
     * getFeature
     *
     * @param  mixed $request
     * @return View
     */
    public function getFeature(Request $request)
    {
        $features = $this->serviceInstallationRepository->getFeature($request->all());
        return $features;
    }
}
