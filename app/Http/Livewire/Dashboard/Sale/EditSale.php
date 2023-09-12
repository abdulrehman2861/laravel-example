<?php

namespace App\Http\Livewire\Dashboard\Sale;

use App\Models\PickupLocation;
use App\Models\Product;
use Livewire\Component;
use App\Models\ProductFitting;
use App\Models\SaleTransaction;
use App\Repositories\Interfaces\CustomerRepositoryInterface;
use App\Repositories\Interfaces\InstallerRepositoryInterface;
use App\Repositories\Interfaces\CustomerTypeRepositoryInterface;

class EditSale extends Component
{

    public $products = [],
        $tax = 0,
        $tax_value = 0,
        $discount = 0,
        $discount_value = 0,
        $shipping = 0,
        $grandtotal = 0,
        $tax_type = SaleTransaction::TAX_TYPE_DEFAULT,
        $taxTypes = SaleTransaction::ALL_TAX_TYPES,
        $existingCustomer = 1,
        $customers = [],
        $serviceTypes = SaleTransaction::ALL_SERVICE_TYPES,
        $appointmentTimes = SaleTransaction::ALL_APPOINTMENT_TIMES,
        $installers = [],
        $customerTypes = [],
        $transactionStatuses = SaleTransaction::ALL_TRANSACTION_STATUS,
        $oldTransaction,
        $customer_id,
        $service_type,
        $appointment_time,
        $installer_id,
        $so_no,
        $appointment_date,
        $status,
        $note,
        $transaction_id;

    /**
     * listeners
     *
     * @var array
     */
    protected $listeners = ['globalSelectedProduct' => 'addProduct'];

    private $customerRepository,
        $installerRepository,
        $customerTypeRepository;

    /**
     * boot
     *
     * @param  mixed $customerRepository
     * @return void
     */
    public function boot(
        CustomerRepositoryInterface $customerRepository,
        InstallerRepositoryInterface $installerRepository,
        CustomerTypeRepositoryInterface $customerTypeRepository
    ) {
        $this->customerRepository = $customerRepository;
        $this->installerRepository = $installerRepository;
        $this->customerTypeRepository = $customerTypeRepository;
        $this->customers = $this->customerRepository->allCustomersNonPaginated();
        $this->installers = $this->installerRepository->allInstallersNonPaginated();
        $this->customerTypes = $this->customerTypeRepository->allCustomerTypesNonPaginated();
    }

    public function mount($transaction)
    {
        $this->oldTransaction = $transaction->toArray();

        foreach ($transaction->transactionDetails as $key => $detail)
        {
            $pickupLocation = PickupLocation::find($detail->pickup_location_id);
            $productFitting = ProductFitting::find($detail->product_fitting_id);
            $product = Product::find($detail->product_id);
            $newProduct = [
                'product_id' => $product?->id,
                'product_fitting_id' => $productFitting?->id,
                'product' => $productFitting?->yearFrom?->name . ',' . $productFitting?->car?->CarCompany?->name . ',' . $productFitting?->car?->name . ',' . $productFitting?->glass?->name,
                'part_number' => $product?->part_number,
                'rate' => (float)$detail->rate,
                'original_rate' => $product?->price,
                'stock' => $product?->quantity,
                'quantity' => (int)$detail->quantity,
                'is_pickup' => ($pickupLocation) ? true : false,
                'pickup_location' => ($pickupLocation) ? $pickupLocation->name : null,
                'shipping_status' => $detail->shipping_status,
                'shipping_provider' => ($pickupLocation) ? null : $detail->shipping_provider,
                'shipping_type' => ($pickupLocation) ? null : $detail->shipping_type,
                'detail_id' => $detail->id,
            ];

            $this->products[] = $newProduct;
        }

        $this->tax = (float)$this->oldTransaction['order_tax'];
        $this->transaction_id = (float)$this->oldTransaction['id'];
        $this->discount = (float)$this->oldTransaction['discount'];
        $this->shipping = (float)$this->oldTransaction['shipping'];
        $this->tax_type = $this->oldTransaction['tax_type'];
        $this->customer_id = $this->oldTransaction['customer_id'];
        $this->service_type = $this->oldTransaction['service_type'];
        $this->appointment_time = $this->oldTransaction['appointment_time'];
        $this->installer_id = $this->oldTransaction['installer_id'];
        $this->so_no = $this->oldTransaction['so_no'];
        $this->appointment_date = $this->oldTransaction['appointment_date'];
        $this->status = $this->oldTransaction['status'];
        $this->note = $this->oldTransaction['note'];
        $this->calculateValues();
    }

    public function updatedTaxType($field)
    {
        if ($this->tax_type == SaleTransaction::TAX_TYPE_EXEMPT) {
            $this->tax = 0;
            $this->tax_value = 0;
        }
        $this->calculateValues();
    }
    public function render()
    {
        return view('livewire.dashboard.sale.edit-sale');
    }


    public function addProduct($id)
    {
        $productFitting = ProductFitting::find($id);

        if ($productFitting) {

            $newProduct = [
                'product_id' => $productFitting->product->id,
                'product_fitting_id' => $productFitting->id,
                'product' => $productFitting->yearFrom?->name . ',' . $productFitting->car?->CarCompany?->name . ',' . $productFitting->car?->name . ',' . $productFitting->glass?->name,
                'part_number' => $productFitting->product->part_number,
                'rate' => (float)$productFitting->product->price,
                'original_rate' => $productFitting->product->price,
                'stock' => $productFitting->product->quantity,
                'quantity' => 1,
            ];

            $existingProduct = collect($this->products)->firstWhere('product_fitting_id', $newProduct['product_fitting_id']);
            if ($existingProduct) {
                // Product with the same id already exists, do not add it again
                return;
            }

            $this->products[] = $newProduct;
        }

        $this->calculateValues();
    }

    public function removeProduct($index)
    {
        unset($this->products[$index]);
        $this->products = array_values($this->products);
        $this->calculateValues();
    }

    public function calculateValues()
    {
        $temp_total = 0;

        foreach ($this->products as $key => $tempProduct) {
            $temp_total += (float)$tempProduct['rate'] * (float)$tempProduct['quantity'];
        }

        $this->tax_value = ($this->tax / 100) * $temp_total;
        $this->discount_value = ($this->discount / 100) * $temp_total;

        $this->grandtotal = ($temp_total + $this->tax_value + $this->shipping) - $this->discount_value;
    }
}
