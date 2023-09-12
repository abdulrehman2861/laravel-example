<?php

namespace App\Http\Livewire\Dashboard\Report;

use Livewire\Component;
use App\Models\Category;
use App\Models\Supplier;
use App\Models\Warehouse;
use Livewire\WithPagination;
use App\Repositories\Interfaces\ProductRepositoryInterface;

class ItemMulti extends Component
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
            $perPage = 10,
            $category_list = [],
            $subCategory_List = [],
            $supplier_list = [],
            $warehouse_List = [],
            $supplier_id='',
            $warehouse_id='',
            $categoryId='',
            $subcategories_id='',
            $lowStockProduct;

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
        $this->supplier_list = Supplier::get();
        $this->warehouse_List = Warehouse::get();
        $this->category_list = Category::whereNull('parent_id')->get();
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
    public function updatingFrom()
    {

        $this->resetPage();

    }
    public function updatingTo()
    {

        $this->resetPage();

    }

    public function updatedCategoryId($field)
    {
        $this->resetPage();

        $this->subCategory_List = Category::where('parent_id',$this->categoryId)->get() ?? [];
    }


    public function render()
    {
        return view('livewire.dashboard.report.item-multi',[

            'products' => $this->productRepository->allProductsForMultiReport($this->searchKey,
                                                                                        $this->perPage,
                                                                                        $this->supplier_id,
                                                                                        $this->warehouse_id,
                                                                                        $this->subcategories_id,
                                                                                        $this->lowStockProduct),

        ]);
    }
}
