<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Dashboard\ExpenseCategoryRequest;
use App\Repositories\Interfaces\ExpenseCategoryRepositoryInterface;

class ExpenseCategoryController extends Controller
{
    private $expenseCategoryRepository;

    public function __construct(ExpenseCategoryRepositoryInterface $expenseCategoryRepository)
    {
        $this->expenseCategoryRepository = $expenseCategoryRepository;
    }

    public function index(Request $request)
    {
        $expenseCategories = $this->expenseCategoryRepository->allExpenseCategories();

        return view('dashboard.expenseCategory.index', compact('expenseCategories'));
    }

    public function create()
    {
        return view('dashboard.expenseCategory.create');
    }

    public function store(ExpenseCategoryRequest $request)
    {
        $this->expenseCategoryRepository->store($request->all());

        return redirect()->back()->with('success', 'Saved Successfully!');
    }

    public function edit($id)
    {
        $expenseCategory = $this->expenseCategoryRepository->findExpenseCategory($id);

        return view('dashboard.expenseCategory.edit', compact('expenseCategory'));
    }

    public function update(ExpenseCategoryRequest $request, $id)
    {
        $this->expenseCategoryRepository->update($request->all(), $id);

        return redirect()->route('dashboard.expenseCategory.index')->with('success', 'Updated Successfully!');
    }

    public function destroy($id)
    {
        $this->expenseCategoryRepository->destroy($id);

        return redirect()->back()->with('success', 'Deleted Successfully!');
    }
    
}
