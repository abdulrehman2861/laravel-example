<?php

namespace App\Http\Livewire\Dashboard\SaleReturn;

use Livewire\Component;
use Livewire\WithPagination;
use App\Repositories\Interfaces\SaleReturnRepositoryInterface;

class SaleReturnList extends Component
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

    private $saleReturnRepository;

    /**
     * boot
     *
     * @param  mixed $saleReturnRepository
     * @return void
     */
    public function boot(SaleReturnRepositoryInterface $saleReturnRepository)
    {
        $this->saleReturnRepository = $saleReturnRepository;
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
        return view('livewire.dashboard.sale-return.sale-return-list',[

            'returns' => $this->saleReturnRepository->allReturns($this->searchKey,$this->perPage),

        ]);
    }
}
