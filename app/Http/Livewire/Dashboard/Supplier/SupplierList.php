<?php

namespace App\Http\Livewire\Dashboard\Supplier;

use Livewire\Component;
use Livewire\WithPagination;
use App\Repositories\Interfaces\SupplierRepositoryInterface;

class SupplierList extends Component
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

    private $supplierRepository;

    /**
     * boot
     *
     * @param  mixed $supplierRepository
     * @return void
     */
    public function boot(SupplierRepositoryInterface $supplierRepository)
    {
        $this->supplierRepository = $supplierRepository;
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
        return view('livewire.dashboard.supplier.supplier-list',[

            'suppliers' => $this->supplierRepository->allSuppliers($this->searchKey,$this->perPage),

        ]);
    }
}
