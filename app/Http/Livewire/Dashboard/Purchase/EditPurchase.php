<?php

namespace App\Http\Livewire\Dashboard\Purchase;

use App\Models\Product;
use App\Models\ProductFitting;
use App\Models\PurchaseTransaction;
use App\Repositories\Interfaces\SupplierRepositoryInterface;
use App\Repositories\Interfaces\WarehouseRepositoryInterface;
use Livewire\Component;

class EditPurchase extends Component
{
    public $products = [],
    $tax = 0,
        $tax_value = 0,
        $discount = 0,
        $discount_value = 0,
        $shipping = 0,
        $grandtotal = 0,
        $oldTransaction,
        $transaction_id,
        $suppliers = [],
        $warehouses = [],
        $internal_note,
        $external_note,
        $issue_date,
        $status,
        $payment_method,
        $billing_address,
        $shipping_address,
        $ship_to_warehouse_id,
        $expected_receipt_date,
        $amount_paid,
        $supplier_id,
        $tax_type = PurchaseTransaction::TAX_TYPE_DEFAULT,
        $taxTypes = PurchaseTransaction::ALL_TAX_TYPES,
        $payment_methods = PurchaseTransaction::ALL_PAYMENT_METHOD_TYPES,
        $transaction_status = PurchaseTransaction::ALL_TRANSACTION_STATUS;

    /**
     * listeners
     *
     * @var array 
     */
    protected $listeners = ['globalSelectedProduct' => 'addProduct'];

    private $supplierRepository,
    $warehouseRepository,
    $purchaseRepository;

    /**
     * boot
     *
     * @param  mixed $supplierRepository
     * @return void
     */
    public function boot(
        SupplierRepositoryInterface $supplierRepository,
        WarehouseRepositoryInterface $warehouseRepository,
        // CustomerTypeRepositoryInterface $purchaseRepository
    ) {
        $this->supplierRepository = $supplierRepository;
        $this->warehouseRepository = $warehouseRepository;
        // $this->customerTypeRepository = $customerTypeRepository;
        $this->suppliers = $this->supplierRepository->allSuppliersNonPaginated();
        $this->warehouses = $this->warehouseRepository->allWarehousesNonPaginated();
        // $this->customerTypes = $this->customerTypeRepository->allCustomerTypesNonPaginated();
    }

    public function mount($transaction)
    {
        $this->oldTransaction = $transaction->toArray();

        foreach ($transaction->transactionDetails as $key => $detail) {
            $productFitting = ProductFitting::find($detail->product_fitting_id);
            $product = Product::find($detail->product_id);
            $newProduct = [
                'product_id' => $productFitting->product->id,
                'product_fitting_id' => $productFitting->id,
                'product' => $productFitting->yearFrom?->name . ',' . $productFitting->car?->CarCompany?->name . ',' . $productFitting->car?->name . ',' . $productFitting->glass?->name,
                'part_number' => $productFitting->product->part_number,
                'cost' => (int)$productFitting->product->cost,
                'original_cost' => $productFitting->product->cost,
                'stock' => $productFitting->product->quantity,
                'quantity' => 1,
            ];

            $this->products[] = $newProduct;
        }

        $this->tax = (float) $this->oldTransaction['order_tax'];
        $this->transaction_id = (float) $this->oldTransaction['id'];
        $this->discount = (float) $this->oldTransaction['discount'];
        $this->shipping = (float) $this->oldTransaction['shipping'];
        $this->tax_type = $this->oldTransaction['tax_type'];
        $this->supplier_id = $this->oldTransaction['supplier_id'];
        $this->amount_paid = $this->oldTransaction['amount_paid'];
        $this->ship_to_warehouse_id = $this->oldTransaction['ship_to_warehouse_id'];
        $this->shipping_address = $this->oldTransaction['shipping_address'];
        $this->billing_address = $this->oldTransaction['billing_address'];
        $this->payment_method = $this->oldTransaction['payment_method'];
        $this->status = $this->oldTransaction['status'];
        $this->internal_note = $this->oldTransaction['internal_note'];
        $this->external_note = $this->oldTransaction['external_note'];
        $this->issue_date    = $this->oldTransaction['issue_date'];
        $this->expected_receipt_date    = $this->oldTransaction['expected_receipt_date'];
        $this->calculateValues();
    }

    public function updatedTaxType($field)
    {
        if ($this->tax_type == PurchaseTransaction::TAX_TYPE_EXEMPT) {
            $this->tax = 0;
            $this->tax_value = 0;
        }
        $this->calculateValues();
    }
    
    public function render()
    {
        return view('livewire.dashboard.purchase.edit-purchase');
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
                'cost' => (int)$productFitting->product->cost,
                'original_cost' => $productFitting->product->cost,
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
            $temp_total += (float)$tempProduct['cost'] * (float)$tempProduct['quantity'];
        }

        $this->tax_value = ($this->tax / 100) * $temp_total;
        $this->discount_value = ($this->discount / 100) * $temp_total;

        $this->grandtotal = ($temp_total + $this->tax_value + $this->shipping) - $this->discount_value;
    }

}