<?php

namespace App\Http\Livewire\Dashboard\Category;

use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Contracts\View\View;
use App\Repositories\Interfaces\CategoryRepositoryInterface;

class CategoryList extends Component
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

    /**
     * categoryRepository
     *
     * @var mixed
     */
    private $categoryRepository;



    /**
     * boot
     *
     * @param  mixed $categoryRepository
     * @return void
     */
    public function boot(CategoryRepositoryInterface $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
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


    /**
     * render
     *
     * @return View
     */
    public function render(): View
    {
        return view('livewire.dashboard.category.category-list',[

            'categories' => $this->categoryRepository->allCategories($this->searchKey,$this->perPage),

        ]);
    }
}
