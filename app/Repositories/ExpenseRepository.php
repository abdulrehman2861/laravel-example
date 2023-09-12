<?php

namespace App\Repositories;

use App\Models\Expense;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Repositories\Interfaces\ExpenseRepositoryInterface;

class ExpenseRepository implements ExpenseRepositoryInterface
{

    /**
     * allExpenseCategories
     *
     * @return LengthAwarePaginator
     */
    public function allExpense($search = null, $perpage = 10): LengthAwarePaginator
    {
        return Expense::where('date', 'LIKE', "%{$search}%")
        ->orWhere('amount', 'LIKE', "%{$search}%")
        ->latest()->with('expenseCategory')->paginate($perpage);
    }

    /**
     * store
     *
     * @param  mixed $data
     * @return Model
     */
    public function store($data): Model
    {
        $expense = Expense::create($data);

        return  $expense;
    }

    /**
     * findExpemseCategory
     *
     * @param  mixed $id
     * @return Model
     */
    public function findExpense($id): Model
    {
        return Expense::findorFail($id);
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
        $expense = Expense::findorFail($id);
        $expense->update($data);

        return  $expense;
    }

    /**
     * destroy
     *
     * @param  mixed $id
     * @return void
     */
    public function destroy($id)
    {
        $expense = Expense::findorFail($id);
        $expense->delete();
    }
}


