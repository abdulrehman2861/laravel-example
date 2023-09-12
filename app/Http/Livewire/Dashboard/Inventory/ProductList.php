<?php

namespace App\Http\Livewire\Dashboard\Inventory;

use Livewire\Component;
use Livewire\WithPagination;
use App\Repositories\Interfaces\ProductRepositoryInterface;
use App\Repositories\Interfaces\InventoryManagementRepositoryInterface;

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
     * products
     *
     * @var string
     * @var int
     * @var array
     */
    public $searchKey = '',
            $perPage = 10;

    public $selectAll = false;
    public $selectedProducts = [];

    private $productRepository;
    private $privproducts;
    private $inventoryManagementRepository;

    /**
     * boot
     *
     * @param  mixed $productRepository
     * @return void
     */
    public function boot(InventoryManagementRepositoryInterface $inventoryManagementRepository,ProductRepositoryInterface $productRepository)
    {
        $this->inventoryManagementRepository = $inventoryManagementRepository;
        $this->productRepository = $productRepository;

        $this->privproducts = $this->productRepository->allProducts($this->searchKey,$this->perPage);
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

    /**
     * updatedSelectAll
     *
     * @return void
     */
    public function updatedSelectAll()
    {
        if ($this->selectAll) {
            $this->selectedProducts = $this->privproducts->pluck('id') ?? [];
        } else {
            $this->selectedProducts = [];
        }
    }

    /**
     * updatedSelectedProducts
     *
     * @return void
     */
    public function updatedSelectedProducts()
    {
        $this->selectAll = count($this->selectedProducts) === $this->privproducts->count() ?? 0;
    }

    /**
     * deleteSelected
     *
     * @return void
     */
    public function deleteSelected()
    {
        if ($this->selectAll) {
            $this->inventoryManagementRepository->clearInventoryColumn('fullRecord',$this->selectedProducts,'all');
        } elseif (!empty($this->selectedProducts)) {
            $this->inventoryManagementRepository->clearInventoryColumn('fullRecord',$this->selectedProducts,'ids');
        }

    }

    /**
     * emptyColumn
     *
     * @param  mixed $column
     * @param  mixed $operation_on
     * @return void
     */
    public function emptyColumn($column,$operation_on)
    {
        $this->inventoryManagementRepository->clearInventoryColumn('onColumn',$this->selectedProducts,$operation_on,$column);
    }

    public function render()
    {

        return view('livewire.dashboard.inventory.product-list',[

            'products' => $this->productRepository->allProducts($this->searchKey,$this->perPage),

        ]);
    }
}
