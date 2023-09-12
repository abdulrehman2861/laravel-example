<?php

namespace App\Http\Livewire\Dashboard\Adjustment;

use App\Repositories\Interfaces\AdjustmentRepositoryInterface;
use Livewire\Component;
use Livewire\WithPagination;

class AdjustmentList extends Component
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

    private $adjustmentRepository;

    /**
     * boot
     *
     * @param  mixed $adjustmentRepository
     * @return void
     */
    public function boot(AdjustmentRepositoryInterface $adjustmentRepository)
    {
        $this->adjustmentRepository = $adjustmentRepository;
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
        return view('livewire.dashboard.adjustment.adjustment-list',[
            'adjustments' => $this->adjustmentRepository->allAdjustments($this->searchKey,$this->perPage),
        ]);
    }
}
