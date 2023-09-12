<?php
namespace App\Repositories\Interfaces;

Interface ExpenseRepositoryInterface{

    public function allExpense();
    public function store($data);
    public function findExpense($id);
    public function update($data, $id);
    public function destroy($id);
}
