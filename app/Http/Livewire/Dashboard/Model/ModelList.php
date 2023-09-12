<?php

namespace App\Http\Livewire\Dashboard\Model;

use Livewire\Component;
use Livewire\WithPagination;
use App\Repositories\Interfaces\CarRepositoryInterface;

class ModelList extends Component
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

    private $carRepository;

    /**
     * boot
     *
     * @param  mixed $carRepository
     * @return void
     */
    public function boot(CarRepositoryInterface $carRepository)
    {
        $this->carRepository = $carRepository;
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
        return view('livewire.dashboard.model.model-list',[

            'models' => $this->carRepository->allCars($this->searchKey,$this->perPage),

        ]);
    }
}
