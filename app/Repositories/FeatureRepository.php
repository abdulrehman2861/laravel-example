<?php

namespace App\Repositories;

use App\Models\Feature;
use App\Models\Product;
use App\Models\Category;
use App\Models\ProductImage;
use App\Models\ProductFitting;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Repositories\Interfaces\FeatureRepositoryInterface;

class FeatureRepository implements FeatureRepositoryInterface
{


    /**
     * allFeatures
     *
     * @param  mixed $search
     * @param  mixed $perpage
     * @return LengthAwarePaginator
     */
    public function allFeatures($search = null,$perpage = 10): LengthAwarePaginator
    {
        return Feature::where('name','LIKE',"%{$search}%")
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
        $feature = Feature::create($data);

        return  $feature;
    }


    /**
     * findFeature
     *
     * @param  mixed $id
     * @return Model
     */
    public function findFeature($id): Model
    {
        return Feature::findorFail($id);
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
        $feature = Feature::findorFail($id);
        $feature->update($data);

        return  $feature;
    }

    /**
     * destroy
     *
     * @param  mixed $id
     * @return void
     */
    public function destroy($id)
    {
        $feature = Feature::findorFail($id);
        $feature->delete();
    }
}


