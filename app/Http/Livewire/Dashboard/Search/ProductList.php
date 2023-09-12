<?php

namespace App\Http\Livewire\Dashboard\Search;

use App\Models\Product;
use Livewire\Component;
use Illuminate\Contracts\View\View;

class ProductList extends Component
{

    public $products = [];


    /**
     * listeners
     *
     * @var array
     */
    protected $listeners = ['globalWidgetProducts' => 'listProducts'];

    /**
     * render
     *
     * @return View
     */
    public function render() :View
    {
        return view('livewire.dashboard.search.product-list');
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
        $this->emit('LoadMoreGlobalItems', true);
    }
}
