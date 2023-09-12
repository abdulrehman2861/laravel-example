<?php

namespace App\Http\Livewire\Dashboard\Customer;

use App\Repositories\Interfaces\CustomerRepositoryInterface;
use Livewire\Component;
use Livewire\WithPagination;

class CustomerList extends Component
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

    private $customerRepository;

    /**
     * boot
     *
     * @param  mixed $customerRepository
     * @return void
     */
    public function boot(CustomerRepositoryInterface $customerRepository)
    {
        $this->customerRepository = $customerRepository;
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
        return view('livewire.dashboard.customer.customer-list', [
            'customers' => $this->customerRepository->allCustomers($this->searchKey, $this->perPage),
        ]);
    }
}
