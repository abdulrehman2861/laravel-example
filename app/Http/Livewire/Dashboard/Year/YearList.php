<?php

namespace App\Http\Livewire\Dashboard\Year;

use Livewire\Component;
use Livewire\WithPagination;
use App\Repositories\Interfaces\YearRepositoryInterface;

class YearList extends Component
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

    private $yearRepository;

    /**
     * boot
     *
     * @param  mixed $yearRepository
     * @return void
     */
    public function boot(YearRepositoryInterface $yearRepository)
    {
        $this->yearRepository = $yearRepository;
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
        return view('livewire.dashboard.year.year-list',[

            'years' => $this->yearRepository->allYears($this->searchKey,$this->perPage),

        ]);
    }
}
