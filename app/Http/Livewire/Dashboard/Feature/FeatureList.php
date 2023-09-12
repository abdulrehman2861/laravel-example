<?php

namespace App\Http\Livewire\Dashboard\Feature;

use Livewire\Component;
use Livewire\WithPagination;
use App\Repositories\Interfaces\FeatureRepositoryInterface;

class FeatureList extends Component
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

    private $FeatureRepository;

    /**
     * boot
     *
     * @param  mixed $FeatureRepository
     * @return void
     */
    public function boot(FeatureRepositoryInterface $FeatureRepository)
    {
        $this->FeatureRepository = $FeatureRepository;
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
        return view('livewire.dashboard.feature.feature-list',[

            'features' => $this->FeatureRepository->allFeatures($this->searchKey,$this->perPage),

        ]);
    }
}
