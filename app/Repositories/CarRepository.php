<?php

namespace App\Repositories;


use App\Models\Car;
use App\Models\Year;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Repositories\Interfaces\CarRepositoryInterface;

class CarRepository implements CarRepositoryInterface
{




    /**
     * allCars
     *
     * @return LengthAwarePaginator
     */
    public function allCars($search = null, $perpage = 10): LengthAwarePaginator
    {
        return Car::where('name', 'LIKE', "%{$search}%")
                    ->latest()
                    ->paginate($perpage);
    }

    /**
     * allCarsNonPaginated
     *
     * @return LengthAwarePaginator
     */
    public function allCarsNonPaginated(): Collection
    {
        return Car::get();
    }

    /**
     * store
     *
     * @param  mixed $data
     * @return Model
     */
    public function store($data): Model
    {
        $car = Car::create($data);

        return  $car;
    }


    /**
     * findCar
     *
     * @param  mixed $id
     * @return Model
     */
    public function findCar($id): Model
    {
        return Car::findorFail($id);
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
        $car = Car::findorFail($id);
        $car->update($data);

        return  $car;
    }

    /**
     * destroy
     *
     * @param  mixed $id
     * @return void
     */
    public function destroy($id)
    {
        $car = Car::findorFail($id);
        $car->delete();
    }
}


