<?php

namespace App\Http\Livewire\Dashboard\Bodystyle;

use Livewire\Component;
use Livewire\WithPagination;
use App\Repositories\Interfaces\BodyStyleRepositoryInterface;

class BodystyleList extends Component
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

    private $bodyStyleRepository;

    /**
     * boot
     *
     * @param  mixed $bodyStyleRepository
     * @return void
     */
    public function boot(BodyStyleRepositoryInterface $bodyStyleRepository)
    {
        $this->bodyStyleRepository = $bodyStyleRepository;
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
        return view('livewire.dashboard.bodystyle.bodystyle-list',[

            'bodyStyles' => $this->bodyStyleRepository->allBodyStyles($this->searchKey,$this->perPage),

        ]);
    }
}
