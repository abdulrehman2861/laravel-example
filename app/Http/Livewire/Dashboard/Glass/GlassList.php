<?php

namespace App\Http\Livewire\Dashboard\Glass;

use Livewire\Component;
use Livewire\WithPagination;
use App\Repositories\Interfaces\GlassRepositoryInterface;

class GlassList extends Component
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

    private $glassRepository;

    /**
     * boot
     *
     * @param  mixed $glassRepository
     * @return void
     */
    public function boot(GlassRepositoryInterface $glassRepository)
    {
        $this->glassRepository = $glassRepository;
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
        return view('livewire.dashboard.glass.glass-list',[

            'glasses' => $this->glassRepository->allGlasses($this->searchKey,$this->perPage),

        ]);
    }
}
