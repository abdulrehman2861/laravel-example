<?php

namespace App\Http\Livewire\Dashboard\Adjustment;

use Livewire\Component;

use App\Models\ProductFitting;
use App\Models\PurchaseTransaction;

class CreatePurchase extends Component
{
    
    public $products = [];

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


    public function render()
    {
        return view('livewire.dashboard.adjustment.create-purchase');
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

    }

    public function removeProduct($index)
    {
        unset($this->products[$index]);
        $this->products = array_values($this->products);
    }

}
