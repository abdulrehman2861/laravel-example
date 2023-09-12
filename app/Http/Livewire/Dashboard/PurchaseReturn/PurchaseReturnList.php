<?php

namespace App\Http\Livewire\Dashboard\PurchaseReturn;

use Livewire\Component;
use Livewire\WithPagination;
use App\Repositories\Interfaces\PurchaseReturnRepositoryInterface;

class PurchaseReturnList extends Component
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

    private $purchaseReturnRepository;

    /**
     * boot
     *
     * @param  mixed $purchaseReturnRepository
     * @return void
     */
    public function boot(PurchaseReturnRepositoryInterface $purchaseReturnRepository)
    {
        $this->purchaseReturnRepository = $purchaseReturnRepository;
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
        return view('livewire.dashboard.purchase-return.purchase-return-list',[

            'returns' => $this->purchaseReturnRepository->allReturns($this->searchKey,$this->perPage),

        ]);
    }
}
