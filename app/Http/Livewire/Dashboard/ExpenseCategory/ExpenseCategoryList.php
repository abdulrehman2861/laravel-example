<?php

namespace App\Http\Livewire\Dashboard\ExpenseCategory;

use App\Repositories\Interfaces\ExpenseCategoryRepositoryInterface;
use Livewire\Component;
use Livewire\WithPagination;

class ExpenseCategoryList extends Component
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

    private $expenseCategoryRepository;

    /**
     * boot
     *
     * @param  mixed $expenseCategoryRepository
     * @return void
     */
    public function boot(ExpenseCategoryRepositoryInterface $expenseCategoryRepository)
    {
        $this->expenseCategoryRepository = $expenseCategoryRepository;
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

        return view('livewire.dashboard.expense-category.expense-category-list', [
            'expenseCategories' => $this->expenseCategoryRepository->allExpenseCategories($this->searchKey, $this->perPage),
        ]);
    }
    
}
