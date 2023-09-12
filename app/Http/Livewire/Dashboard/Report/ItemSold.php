<?php

namespace App\Http\Livewire\Dashboard\Report;

use Livewire\Component;
use Livewire\WithPagination;
use App\Repositories\Interfaces\ProductRepositoryInterface;

class ItemSold extends Component
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
            $from,$to;

    private $productRepository;

    /**
     * boot
     *
     * @param  mixed $productRepository
     * @return void
     */
    public function boot(ProductRepositoryInterface $productRepository)
    {
        $this->productRepository = $productRepository;
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
    public function updatingFrom()
    {

        $this->resetPage();

    }
    public function updatingTo()
    {

        $this->resetPage();

    }

    public function resetAll()
    {

        $this->resetPage();
        $this->reset();

    }
    public function render()
    {
        return view('livewire.dashboard.report.item-sold',[

            'products' => $this->productRepository->allProductsWithTransactionsPaid($this->searchKey,$this->perPage,$this->from,$this->to),

        ]);
    }
}
