<?php
namespace App\Repositories\Interfaces;

Interface SubCategoryRepositoryInterface{

    public function allSubCategories();
    public function store($data);
    public function findSubCategory($id);
    public function update($data, $id);
    public function destroy($id);
}
