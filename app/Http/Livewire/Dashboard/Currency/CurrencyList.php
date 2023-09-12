<?php

namespace App\Http\Livewire\Dashboard\Currency;

use Livewire\Component;
use Livewire\WithPagination;
use App\Repositories\Interfaces\CurrencyRepositoryInterface;

class CurrencyList extends Component
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

    private $currencyRepository;

    /**
     * boot
     *
     * @param  mixed $currencyRepository
     * @return void
     */
    public function boot(CurrencyRepositoryInterface $currencyRepository)
    {
        $this->currencyRepository = $currencyRepository;
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
        return view('livewire.dashboard.currency.currency-list',[

            'currencies' => $this->currencyRepository->allCurrency($this->searchKey,$this->perPage),

        ]);
    }
}
