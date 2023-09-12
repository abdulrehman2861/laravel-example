<?php

namespace App\Repositories;


use App\Models\Year;
use App\Models\Warehouse;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Repositories\Interfaces\WarehouseRepositoryInterface;

class WarehouseRepository implements WarehouseRepositoryInterface
{


    /**
     * allWarehouses
     *
     * @return LengthAwarePaginator
     */
    public function allWarehouses($search = null,$perpage = 10): LengthAwarePaginator
    {
        return Warehouse::where('id','LIKE',"%{$search}%")
                            ->orWhere('address','LIKE',"%{$search}%")
                            ->orWhere('name','LIKE',"%{$search}%")
                            ->latest()
                            ->paginate($perpage);
    }

    /**
     * allWarehousesNonPaginated
     *
     * @return Collection
     */
    public function allWarehousesNonPaginated(): Collection
    {
        return Warehouse::get();
    }

    /**
     * store
     *
     * @param  mixed $data
     * @return Model
     */
    public function store($data): Model
    {
        $warehouse = Warehouse::create($data);

        return  $warehouse;
    }


    /**
     * findWarehouse
     *
     * @param  mixed $id
     * @return Model
     */
    public function findWarehouse($id): Model
    {
        return Warehouse::findorFail($id);
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
        $warehouse = Warehouse::findorFail($id);
        $warehouse->update($data);

        return  $warehouse;
    }

    /**
     * destroy
     *
     * @param  mixed $id
     * @return void
     */
    public function destroy($id)
    {
        $warehouse = Warehouse::findorFail($id);
        $warehouse->delete();
    }
}


