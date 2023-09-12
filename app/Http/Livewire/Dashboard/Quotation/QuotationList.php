<?php

namespace App\Http\Livewire\Dashboard\Quotation;

use Livewire\Component;
use Livewire\WithPagination;
use App\Repositories\Interfaces\SaleTransactionRepositoryInterface;

class QuotationList extends Component
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
            $sortBy = 'latest',
            $sortColumn = 'created_at',
            $sortDirection = 'desc';

    private $saleTransactionRepository;

    /**
     * boot
     *
     * @param  mixed $saleTransactionRepository
     * @return void
     */
    public function boot(SaleTransactionRepositoryInterface $saleTransactionRepository)
    {
        $this->saleTransactionRepository = $saleTransactionRepository;
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
     * updatingSortBy
     *
     * @return void
     */
    public function updatedSortBy()
    {
        if ($this->sortBy == 'latest')
        {
            $this->sortColumn = 'created_at';
            $this->sortDirection = 'desc';

        } elseif($this->sortBy == 'oldest')
        {
            $this->sortColumn = 'created_at';
            $this->sortDirection = 'asc';
        }
        else
        {
            $this->sortColumn = $this->sortBy;
            $this->sortDirection = 'asc';
        }


        $this->resetPage();

    }
    public function render()
    {
        return view('livewire.dashboard.quotation.quotation-list',[

            'quotations' => $this->saleTransactionRepository->getAllQuotes($this->searchKey,
                                                                                    $this->perPage,
                                                                                    $this->sortColumn,
                                                                                    $this->sortDirection),

        ]);
    }
}
