<?php

namespace App\Http\Livewire\Dashboard\Purchase;

use Livewire\Component;
use Livewire\WithPagination;
use App\Repositories\Interfaces\PurchaseTransactionRepositoryInterface;

class PurchaseList extends Component
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

    private $PurchaseTransactionRepository;

    /**
     * boot
     *
     * @param  mixed $PurchaseTransactionRepository
     * @return void
     */
    public function boot(PurchaseTransactionRepositoryInterface $PurchaseTransactionRepository)
    {
        $this->PurchaseTransactionRepository = $PurchaseTransactionRepository;
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
        return view('livewire.dashboard.purchase.purchase-list',[

            'purchases' => $this->PurchaseTransactionRepository->alltransactions($this->searchKey,$this->perPage),

        ]);
    }
}
