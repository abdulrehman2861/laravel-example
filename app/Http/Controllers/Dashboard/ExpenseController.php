<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Dashboard\ExpenseRequest;
use App\Repositories\Interfaces\ExpenseRepositoryInterface;
use App\Models\Category;
use App\Models\ExpenseCategory;

class ExpenseController extends Controller
{
    private $expenseRepository;

    public function __construct(ExpenseRepositoryInterface $expenseRepository)
    {
        $this->expenseRepository = $expenseRepository;
    }

    public function index(Request $request)
    {
        $expenses = $this->expenseRepository->allExpense();
        $categories = ExpenseCategory::get();
        return view('dashboard.expense.index', compact('expenses','categories'));
    }

    public function create()
    {
        return view('dashboard.expense.create');
    }

    public function store(ExpenseRequest $request)
    {
        $this->expenseRepository->store($request->all());

        return redirect()->back()->with('success', 'Saved Successfully!');
    }

    public function edit($id)
    {
        $expense = $this->expenseRepository->findExpense($id);
        $categories = ExpenseCategory::get();
        return view('dashboard.expense.edit', compact('expense','categories'));
    }

    public function update(ExpenseRequest $request, $id)
    {
        $this->expenseRepository->update($request->all(), $id);
        return redirect()->route('dashboard.expense.index')->with('success', 'Updated Successfully!');
    }

    public function destroy($id)
    {
        $this->expenseRepository->destroy($id);

        return redirect()->back()->with('success', 'Deleted Successfully!');
    }

}
