<?php

namespace App\Http\Livewire\Dashboard\Widget;

use App\Models\Product;
use Livewire\Component;

class ListProduct extends Component
{
    public $products = [];


    /**
     * listeners
     *
     * @var array
     */
    protected $listeners = ['globalWidgetProducts' => 'listProducts'];

    public function render()
    {
        return view('livewire.dashboard.widget.list-product');
    }

    /**
     * listProducts
     *
     * @param  mixed $products_id
     * @return void
     */
    public function listProducts($products_id)
    {
        $this->products = Product::whereIn('id', $products_id)->get();
    }

    /**
     * loadMore
     *
     * @return void
     */
    public function loadMore()
    {
        $this->emit('LoadMoreGlobalItems', false);
    }
}
