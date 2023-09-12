<?php

namespace App\Http\Livewire\Dashboard\Warehouse;

use Livewire\Component;
use Livewire\WithPagination;
use App\Repositories\Interfaces\WarehouseRepositoryInterface;

class WarehouseList extends Component
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

    private $warehouseRepository;

    /**
     * boot
     *
     * @param  mixed $warehouseRepository
     * @return void
     */
    public function boot(WarehouseRepositoryInterface $warehouseRepository)
    {
        $this->warehouseRepository = $warehouseRepository;
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
        return view('livewire.dashboard.warehouse.warehouse-list',[

            'warehouses' => $this->warehouseRepository->allWarehouses($this->searchKey,$this->perPage),

        ]);
    }
}
