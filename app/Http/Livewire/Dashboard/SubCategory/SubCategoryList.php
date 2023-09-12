<?php

namespace App\Http\Livewire\Dashboard\SubCategory;

use Livewire\Component;
use Livewire\WithPagination;
use App\Repositories\Interfaces\SubCategoryRepositoryInterface;

class SubCategoryList extends Component
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

    private $categoryRepository;

    /**
     * boot
     *
     * @param  mixed $categoryRepository
     * @return void
     */
    public function boot(SubCategoryRepositoryInterface $categoryRepository)
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


    public function render()
    {
        return view('livewire.dashboard.sub-category.sub-category-list',[

            'subCategories' => $this->categoryRepository->allSubCategories($this->searchKey,$this->perPage),

        ]);
    }
}
