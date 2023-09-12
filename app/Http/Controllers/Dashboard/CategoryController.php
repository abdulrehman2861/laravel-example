<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\Dashboard\CategoryRequest;
use App\Repositories\Interfaces\CategoryRepositoryInterface;

class CategoryController extends Controller
{

    private $categoryRepository;

    /**
     * __construct
     *
     * @param  mixed $productRepository
     * @return void
     */
    public function __construct(CategoryRepositoryInterface $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    /**
     * index
     *
     * @param  mixed $request
     * @return View
     */
    public function index(Request $request): View|string
    {
        return view('dashboard.category.index');
    }

    /**
     * create
     *
     * @return View
     */
    // public function create(): View
    // {
    //     return view('dashboard.category.create');
    // }


    /**
     * store
     *
     * @param  mixed $request
     * @return RedirectResponse
     */
    public function store(CategoryRequest $request): RedirectResponse
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
        $category = $this->categoryRepository->findCategory($id);

        return view('dashboard.category.edit', compact('category'));
    }

    /**
     * fetchSubcategories
     *
     * @param  mixed $request
     * @return void
     */
    public function fetchSubcategories(Request $request) :JsonResponse
    {
        $category = $this->categoryRepository->findCategory($request->id);


        return response()->json([
            'data' => $category?->subCategories
        ]);
    }

    /**
     * update
     *
     * @param  mixed $request
     * @param  mixed $id
     * @return RedirectResponse
     */
    public function update(CategoryRequest $request, $id): RedirectResponse
    {
        $this->categoryRepository->update($request->validated(), $id);

        return redirect()->route('dashboard.category.index')->with('success', 'Category Updated Successfully');
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

        return redirect()->route('dashboard.category.index')->with('success', 'Category Deleted Successfully');
    }
}
