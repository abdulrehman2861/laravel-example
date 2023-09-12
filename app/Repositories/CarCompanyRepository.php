<?php

namespace App\Repositories;


use App\Models\Year;
use App\Models\CarCompany;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Repositories\Interfaces\CarCompanyRepositoryInterface;

class CarCompanyRepository implements CarCompanyRepositoryInterface
{



    /**
     * allCompanies
     *
     * @return LengthAwarePaginator
     */
    public function allCompanies($search = null, $perpage = 10): LengthAwarePaginator
    {
        return CarCompany::where('name', 'LIKE', "%{$search}%")
                            ->latest()
                            ->paginate($perpage);
    }

    /**
     * allCompaniesNonpaginated
     *
     * @return LengthAwarePaginator
     */
    public function allCompaniesNonpaginated(): Collection
    {
        return CarCompany::get();
    }

    /**
     * store
     *
     * @param  mixed $data
     * @return Model
     */
    public function store($data): Model
    {
        $carCompany = CarCompany::create($data);

        return  $carCompany;
    }




    /**
     * findCompany
     *
     * @param  mixed $id
     * @return Model
     */
    public function findCompany($id): Model
    {
        return CarCompany::findorFail($id);
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
        $carCompany = CarCompany::findorFail($id);
        $carCompany->update($data);

        return  $carCompany;
    }

    /**
     * destroy
     *
     * @param  mixed $id
     * @return void
     */
    public function destroy($id)
    {
        $carCompany = CarCompany::findorFail($id);
        $carCompany->delete();
    }
}


