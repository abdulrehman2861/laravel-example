<?php

namespace App\Repositories;

use App\Models\Product;
use App\Models\Category;
use App\Models\ProductImage;
use App\Models\ProductFitting;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Repositories\Interfaces\CategoryRepositoryInterface;

class CategoryRepository implements CategoryRepositoryInterface
{


    /**
     * allCategories
     *
     * @return LengthAwarePaginator
     */
    public function allCategories($search = null,$perpage = 10): LengthAwarePaginator
    {
        return Category::whereNull('parent_id')
                            ->where('name','LIKE',"%{$search}%")
                            ->latest()
                            ->paginate($perpage);
    }

    /**
     * allCategoriesNonPaginated
     *
     * @return Collection
     */
    public function allCategoriesNonPaginated(): Collection
    {
        return Category::whereNull('parent_id')->get();
    }

    /**
     * store
     *
     * @param  mixed $data
     * @return Model
     */
    public function store($data): Model
    {
        $category = Category::create($data);

        return  $category;
    }


    /**
     * findCategory
     *
     * @param  mixed $id
     * @return Model
     */
    public function findCategory($id): Model
    {
        return Category::findorFail($id);
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
        $category = Category::findorFail($id);
        $category->update($data);

        return  $category;
    }

    /**
     * destroy
     *
     * @param  mixed $id
     * @return void
     */
    public function destroy($id)
    {
        $category = Category::findorFail($id);
        $category->delete();
    }
}


