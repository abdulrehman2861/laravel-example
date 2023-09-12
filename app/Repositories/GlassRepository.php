<?php

namespace App\Repositories;


use App\Models\Car;
use App\Models\Year;
use App\Models\Glass;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Repositories\Interfaces\GlassRepositoryInterface;

class GlassRepository implements GlassRepositoryInterface
{


    /**
     * allGlasses
     *
     * @return LengthAwarePaginator
     */
    public function allGlasses($search = null, $perpage = 10): LengthAwarePaginator
    {
        return Glass::where('name', 'LIKE', "%{$search}%")
                        ->latest()
                        ->paginate($perpage);
    }

    /**
     * allGlassesNonPaginated
     *
     * @return Collection
     */
    public function allGlassesNonPaginated(): Collection
    {
        return Glass::get();
    }

    /**
     * store
     *
     * @param  mixed $data
     * @return Model
     */
    public function store($data): Model
    {
        $glass = Glass::create($data);

        return  $glass;
    }


    /**
     * findGlass
     *
     * @param  mixed $id
     * @return Model
     */
    public function findGlass($id): Model
    {
        return Glass::findorFail($id);
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
        $glass = Glass::findorFail($id);
        $glass->update($data);

        return  $glass;
    }

    /**
     * destroy
     *
     * @param  mixed $id
     * @return void
     */
    public function destroy($id)
    {
        $glass = Glass::findorFail($id);
        $glass->delete();
    }
}


