<?php

namespace App\Repositories;


use App\Models\Car;
use App\Models\Year;
use App\Models\CustomerType;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Repositories\Interfaces\CustomerTypeRepositoryInterface;

class CustomerTypeRepository implements CustomerTypeRepositoryInterface
{


    /**
     * allCustomerTypes
     *
     * @return LengthAwarePaginator
     */
    public function allCustomerTypes($search = null, $perpage = 10): LengthAwarePaginator
    {
        return CustomerType::where('name', 'LIKE', "%{$search}%")
        ->latest()->paginate($perpage);
    }

    /**
     * allCustomerTypesNonPaginated
     *
     * @return Collection
     */
    public function allCustomerTypesNonPaginated(): Collection
    {
        return CustomerType::latest()->get();
    }

    /**
     * store
     *
     * @param  mixed $data
     * @return Model
     */
    public function store($data): Model
    {
        $customerType = CustomerType::create($data);
        $customerType->refresh();
        return  $customerType;
    }


    /**
     * findCustomerType
     *
     * @param  mixed $id
     * @return Model
     */
    public function findCustomerType($id): Model
    {
        return CustomerType::findorFail($id);
    }

    /**
     * findByName
     *
     * @param  mixed $name
     * @return Model
     */
    public function findByName($name): Model|null
    {
        return CustomerType::where('name',$name)->first();
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
        $customerType = CustomerType::findorFail($id);
        $customerType->update($data);

        return  $customerType;
    }

    /**
     * destroy
     *
     * @param  mixed $id
     * @return void
     */
    public function destroy($id)
    {
        $customerType = CustomerType::findorFail($id);
        $customerType->delete();
    }
}


