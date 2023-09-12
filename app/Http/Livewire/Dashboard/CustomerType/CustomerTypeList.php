<?php

namespace App\Http\Livewire\Dashboard\CustomerType;

use App\Repositories\Interfaces\CustomerTypeRepositoryInterface;
use Livewire\Component;
use Livewire\WithPagination;

class CustomerTypeList extends Component
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

    private $customerTypeRepository;

    /**
     * boot
     *
     * @param  mixed $customerTypeRepository
     * @return void
     */
    public function boot(CustomerTypeRepositoryInterface $customerTypeRepository)
    {
        $this->customerTypeRepository = $customerTypeRepository;
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
        return view('livewire.dashboard.customer-type.customer-type-list', [
            'customerTypes' => $this->customerTypeRepository->allCustomerTypes($this->searchKey, $this->perPage),
        ]);
    }
}
    
 
