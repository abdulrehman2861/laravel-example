<?php

namespace App\Http\Livewire\Dashboard\Make;

use Livewire\Component;
use Livewire\WithPagination;
use App\Repositories\Interfaces\CarCompanyRepositoryInterface;

class MakeList extends Component
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

    private $CarCompanyRepository;

    /**
     * boot
     *
     * @param  mixed $CarCompanyRepository
     * @return void
     */
    public function boot(CarCompanyRepositoryInterface $CarCompanyRepository)
    {
        $this->CarCompanyRepository = $CarCompanyRepository;
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
        return view('livewire.dashboard.make.make-list',[

            'makes' => $this->CarCompanyRepository->allCompanies($this->searchKey,$this->perPage),

        ]);
    }
}
