<?php

namespace App\Repositories;


use App\Models\Car;
use App\Models\Year;
use App\Models\Customer;
use App\Models\Supplier;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Repositories\Interfaces\SupplierRepositoryInterface;

class SupplierRepository implements SupplierRepositoryInterface
{

    /**
     * allSuppliers
     *
     * @return LengthAwarePaginator
     */
    public function allSuppliers($search = null,$perpage = 10): LengthAwarePaginator
    {
        return Supplier::where('name','LIKE',"%{$search}%")
                            ->orWhere('contact_person','LIKE',"%{$search}%")
                            ->orWhere('email','LIKE',"%{$search}%")
                            ->orWhere('phone','LIKE',"%{$search}%")
                            ->latest()
                            ->paginate($perpage);
    }

    /**
     * allSuppliersNonPaginated
     *
     * @return Collection
     */
    public function allSuppliersNonPaginated(): Collection
    {
        return Supplier::get();
    }

    /**
     * store
     *
     * @param  mixed $data
     * @return Model
     */
    public function store($data): Model
    {
        $supplier = Supplier::create($data);

        return  $supplier;
    }


    /**
     * findSupplier
     *
     * @param  mixed $id
     * @return Model
     */
    public function findSupplier($id): Model
    {
        return Supplier::findorFail($id);
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
        $supplier = Supplier::findorFail($id);
        $supplier->update($data);

        return  $supplier;
    }

    /**
     * destroy
     *
     * @param  mixed $id
     * @return void
     */
    public function destroy($id)
    {
        $supplier = Supplier::findorFail($id);
        $supplier->delete();
    }
}


