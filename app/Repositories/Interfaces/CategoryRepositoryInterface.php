<?php
namespace App\Repositories\Interfaces;

Interface CategoryRepositoryInterface{

    public function allCategories();
    public function allCategoriesNonPaginated();
    public function store($data);
    public function findCategory($id);
    public function update($data, $id);
    public function destroy($id);
}
