<?php

namespace App\Http\Livewire\Dashboard\Sale;

use Livewire\Component;
use App\Models\ProductFitting;
use App\Models\SaleTransaction;
use App\Repositories\Interfaces\CustomerRepositoryInterface;
use App\Repositories\Interfaces\InstallerRepositoryInterface;
use App\Repositories\Interfaces\CustomerTypeRepositoryInterface;
use App\Repositories\Interfaces\SaleTransactionRepositoryInterface;

class CreateSale extends Component
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
        $transactionStatuses = SaleTransaction::ALL_TRANSACTION_STATUS;

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
    public function boot(CustomerRepositoryInterface $customerRepository
                            ,InstallerRepositoryInterface $installerRepository,
                            CustomerTypeRepositoryInterface $customerTypeRepository)
    {
        $this->customerRepository = $customerRepository;
        $this->installerRepository = $installerRepository;
        $this->customerTypeRepository = $customerTypeRepository;
        $this->customers = $this->customerRepository->allCustomersNonPaginated();
        $this->installers = $this->installerRepository->allInstallersNonPaginated();
        $this->customerTypes = $this->customerTypeRepository->allCustomerTypesNonPaginated();
    }

    public function mount()
    {
        //$this->addProduct(15);
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
        return view('livewire.dashboard.sale.create-sale');
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
