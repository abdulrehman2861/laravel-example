<?php

namespace App\Http\Livewire\Dashboard\Purchase;

use App\Models\Product;
use Livewire\Component;
use App\Models\ProductFitting;
use App\Models\PurchaseTransaction;

class CreatePurchase extends Component
{

    public $products = [],
        $tax = 0,
        $tax_value = 0,
        $discount = 0,
        $discount_value = 0,
        $shipping = 0,
        $grandtotal = 0,
        $tax_type = PurchaseTransaction::TAX_TYPE_DEFAULT,
        $taxTypes = PurchaseTransaction::ALL_TAX_TYPES;

    /**
     * listeners
     *
     * @var array
     */
    protected $listeners = ['globalSelectedProduct' => 'addProduct'];

    public function mount()
    {
        //$this->addProduct(15);
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
        return view('livewire.dashboard.purchase.create-purchase');
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
