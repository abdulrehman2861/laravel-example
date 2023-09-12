<?php

namespace App\Repositories;

use App\Models\BodyStyle;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Repositories\Interfaces\BodyStyleRepositoryInterface;

class BodyStyleRepository implements BodyStyleRepositoryInterface
{


    /**
     * allBodyStyles
     *
     * @return LengthAwarePaginator
     */
    public function allBodyStyles($search = null, $perpage = 10): LengthAwarePaginator
    {
        return BodyStyle::where('name', 'LIKE', "%{$search}%")
                            ->latest()
                            ->paginate($perpage);
    }

    /**
     * store
     *
     * @param  mixed $data
     * @return Model
     */
    public function store($data): Model
    {
        $bodyStyle = BodyStyle::create($data);

        $bodyStyle->cars()->attach($data['car_id']);

        return  $bodyStyle;
    }



    /**
     * findBodyStyle
     *
     * @param  mixed $id
     * @return Model
     */
    public function findBodyStyle($id): Model
    {
        return BodyStyle::findorFail($id);
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
        $bodyStyle = BodyStyle::findorFail($id);
        $bodyStyle->update($data);
        $bodyStyle->cars()->sync([$data['car_id']]);

        return  $bodyStyle;
    }

    /**
     * destroy
     *
     * @param  mixed $id
     * @return void
     */
    public function destroy($id)
    {
        $bodyStyle = BodyStyle::findorFail($id);
        $bodyStyle->delete();
    }
}


