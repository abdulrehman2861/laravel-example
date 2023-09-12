<?php

namespace App\Repositories;


use App\Models\Year;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Repositories\Interfaces\YearRepositoryInterface;

class YearRepository implements YearRepositoryInterface
{


    /**
     * allYears
     *
     * @return LengthAwarePaginator
     */
    public function allYears($search = null, $perpage = 10): LengthAwarePaginator
    {
        return Year::where('name', 'LIKE', "%{$search}%")
                    ->latest()
                    ->paginate($perpage);
    }

    /**
     * allYearsNonPaginated
     *
     * @return Collection
     */
    public function allYearsNonPaginated(): Collection
    {
        return Year::get();
    }

    /**
     * store
     *
     * @param  mixed $data
     * @return Model
     */
    public function store($data): Model
    {
        $year = Year::create($data);

        return  $year;
    }



    /**
     * findYear
     *
     * @param  mixed $id
     * @return Model
     */
    public function findYear($id): Model
    {
        return Year::findorFail($id);
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
        $year = Year::findorFail($id);
        $year->update($data);

        return  $year;
    }

    /**
     * destroy
     *
     * @param  mixed $id
     * @return void
     */
    public function destroy($id)
    {
        $year = Year::findorFail($id);
        $year->delete();
    }
}
