<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\Dashboard\SubCategoryRequest;
use App\Repositories\Interfaces\CategoryRepositoryInterface;
use App\Repositories\Interfaces\SubCategoryRepositoryInterface;

class SubCategoryController extends Controller
{

    private $categoryRepository,
             $subCategoryRepository;

    /**
     * __construct
     *
     * @param  mixed $productRepository
     * @return void
     */
    public function __construct(SubCategoryRepositoryInterface $subCategoryRepository,CategoryRepositoryInterface $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
        $this->subCategoryRepository = $subCategoryRepository;
    }

    /**
     * index
     *
     * @param  mixed $request
     * @return View
     */
    public function index(Request $request): View|string
    {
        $categories =  $this->categoryRepository->allCategories();

        return view('dashboard.subCategory.index', compact('categories'));
    }

    /**
     * create
     *
     * @return View
     */
    // public function create(): View
    // {
    //     return view('dashboard.subCategory.create');
    // }


    /**
     * store
     *
     * @param  mixed $request
     * @return RedirectResponse
     */
    public function store(SubCategoryRequest $request): RedirectResponse
    {
        $this->categoryRepository->store($request->validated());

        return redirect()->back()->with('success', 'Saved Successfully!');
    }

    /**
     * edit
     *
     * @param  mixed $id
     * @return View
     */
    public function edit($id): View
    {
        $category = $this->subCategoryRepository->findSubCategory($id);
        $categories =  $this->categoryRepository->allCategories();

        return view('dashboard.subCategory.edit', compact('category','categories'));
    }

    /**
     * update
     *
     * @param  mixed $request
     * @param  mixed $id
     * @return RedirectResponse
     */
    public function update(SubCategoryRequest $request, $id): RedirectResponse
    {
        $this->categoryRepository->update($request->validated(), $id);

        return redirect()->route('dashboard.subcategory.index')->with('success', 'Category Updated Successfully!');
    }

    /**
     * destroy
     *
     * @param  mixed $id
     * @return RedirectResponse
     */
    public function destroy($id): RedirectResponse
    {
        $this->categoryRepository->destroy($id);

        return redirect()->route('dashboard.subcategory.index')->with('success', 'Category Deleted Successfully');
    }
}
