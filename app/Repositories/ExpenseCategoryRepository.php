<?php

namespace App\Repositories;

use App\Models\ExpenseCategory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Repositories\Interfaces\ExpenseCategoryRepositoryInterface;

class ExpenseCategoryRepository implements ExpenseCategoryRepositoryInterface
{

    /**
     * allExpenseCategories
     *
     * @return LengthAwarePaginator
     */
    public function allExpenseCategories($search = null, $perpage = 10): LengthAwarePaginator
    {
        return ExpenseCategory::where('name', 'LIKE', "%{$search}%")->with('expenses')->latest()->paginate($perpage);
    }

    /**
     * store
     *
     * @param  mixed $data
     * @return Model
     */
    public function store($data): Model
    {
        $expenseCategory = ExpenseCategory::create($data);

        return  $expenseCategory;
    }

    /**
     * findExpemseCategory
     *
     * @param  mixed $id
     * @return Model
     */
    public function findExpenseCategory($id): Model
    {
        return ExpenseCategory::findorFail($id);
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
        $expenseCategory = ExpenseCategory::findorFail($id);
        $expenseCategory->update($data);

        return  $expenseCategory;
    }

    /**
     * destroy
     *
     * @param  mixed $id
     * @return void
     */
    public function destroy($id)
    {
        $expenseCategory = ExpenseCategory::findorFail($id);
        $expenseCategory->delete();
    }
}


