<?php

namespace App\Http\Livewire\Dashboard\Expense;

use App\Repositories\Interfaces\ExpenseCategoryRepositoryInterface;
use App\Repositories\Interfaces\ExpenseRepositoryInterface;
use Livewire\Component;
use Livewire\WithPagination;

class ExpenseList extends Component
{
    use WithPagination;
    /**
     * paginationTheme
     *
     * @var string
     */
    protected $paginationTheme = 'bootstrap';

    /**
     * searchKey
     * perPage
     *
     * @var string
     * @var int
     */
    public $searchKey = '',
    $perPage = 10;

    private $expenseRepository;

    /**
     * boot
     *
     * @param  mixed $expenseRepository
     * @return void
     */
    public function boot(ExpenseRepositoryInterface $expenseRepository)
    {
        $this->expenseRepository = $expenseRepository;
    }

    /**
     * updatingSearchKey
     *
     * @return void
     */
    public function updatingSearchKey()
    {

        $this->resetPage();

    }

    public function render()
    {

        return view('livewire.dashboard.expense.expense-list', [
            'expenses' => $this->expenseRepository->allExpense($this->searchKey, $this->perPage),
        ]);
    }
}