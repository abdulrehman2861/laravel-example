<?php
namespace App\Repositories\Interfaces;

Interface ExpenseCategoryRepositoryInterface{

    public function allExpenseCategories();
    public function store($data);
    public function findExpenseCategory($id);
    public function update($data, $id);
    public function destroy($id);
}
