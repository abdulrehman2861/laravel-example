<?php

namespace App\Http\Livewire\Dashboard\Product;

use Livewire\Component;
use Livewire\WithPagination;
use App\Repositories\Interfaces\ProductRepositoryInterface;

class ProductList extends Component
{
    use WithPagination;

    /**
     * paginationTheme
     *
     * @var string
     */
    protected $paginationTheme = 'bootstrap';

    /**
     * searchKey
     * perPage
     *
     * @var string
     * @var int
     */
    public $searchKey = '',
            $perPage = 10;

    private $productRepository;

    /**
     * boot
     *
     * @param  mixed $productRepository
     * @return void
     */
    public function boot(ProductRepositoryInterface $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    /**
     * updatingSearchKey
     *
     * @return void
     */
    public function updatingSearchKey()
    {

        $this->resetPage();

    }
    public function render()
    {
        return view('livewire.dashboard.product.product-list',[

            'products' => $this->productRepository->allProducts($this->searchKey,$this->perPage),

        ]);
    }
}
