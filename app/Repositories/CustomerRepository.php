<?php

namespace App\Repositories;


use App\Models\Car;
use App\Models\Year;
use App\Models\Customer;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Repositories\Interfaces\CustomerRepositoryInterface;
use App\Repositories\Interfaces\CustomerTypeRepositoryInterface;

class CustomerRepository implements CustomerRepositoryInterface
{

    private $customerTypeRepository;


    /**
     * __construct
     *
     * @param  mixed $saleTransactionRepository
     * @return void
     */
    public function __construct(
        CustomerTypeRepositoryInterface $customerTypeRepository
    ) {
        $this->customerTypeRepository = $customerTypeRepository;
    }


    /**
     * allCustomers
     *
     * @return LengthAwarePaginator
     */
    public function allCustomers($search = null, $perpage = 10): LengthAwarePaginator
    {
        return Customer::where('name', 'LIKE', "%{$search}%")
            ->orWhere('email', 'LIKE', "%{$search}%")
            ->orWhere('phone', 'LIKE', "%{$search}%")
            ->with('customerType')
            ->latest()->paginate($perpage);
    }

    /**
     * allCustomersNonPaginated
     *
     * @return Collection
     */
    public function allCustomersNonPaginated(): Collection
    {
        return Customer::get();
    }

    /**
     * store
     *
     * @param  mixed $data
     * @return Model
     */
    public function store($data): Model
    {
        if (!isset($data['customer_Type_id']))
        {
            $customerType = $this->customerTypeRepository->findByName('Website');
            if (!$customerType) {
                $customerType = $this->customerTypeRepository->store(['name' => 'Website']);
            }

            $data['customer_Type_id'] = $customerType->id;
        }
        $customer = Customer::create($data);

        return $customer;
    }



    /**
     * findCustomer
     *
     * @param  mixed $id
     * @return Model
     */
    public function findCustomer($id): Model
    {
        return Customer::findorFail($id);
    }

    /**
     * update
     *
     * @param  mixed $data
     * @param  mixed $id
     * @return model
     */
    public function update($data, $id): model
    {
        $customer = Customer::findorFail($id);
        $customer->update($data);

        return $customer;
    }

    /**
     * destroy
     *
     * @param  mixed $id
     * @return void
     */
    public function destroy($id)
    {
        $customer = Customer::findorFail($id);
        $customer->delete();
    }
}
