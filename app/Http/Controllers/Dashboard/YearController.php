<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\Dashboard\YearRequest;
use App\Repositories\Interfaces\YearRepositoryInterface;

class YearController extends Controller
{

    private $yearRepository;

    /**
     * __construct
     *
     * @param  mixed $productRepository
     * @return void
     */
    public function __construct(YearRepositoryInterface $yearRepository)
    {
        $this->yearRepository = $yearRepository;
    }

    /**
     * index
     *
     * @param  mixed $request
     * @return View
     */
    public function index(Request $request): View|string
    {
        $years =  $this->yearRepository->allYears();

        return view('dashboard.year.index', compact('years'));
    }

    /**
     * create
     *
     * @return View
     */
    public function create(): View
    {
        return view('dashboard.year.create');
    }


    /**
     * store
     *
     * @param  mixed $request
     * @return RedirectResponse
     */
    public function store(YearRequest $request): RedirectResponse
    {
        $this->yearRepository->store($request->validated());

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
        $year = $this->yearRepository->findYear($id);

        return view('dashboard.year.edit', compact('year'));
    }

    /**
     * update
     *
     * @param  mixed $request
     * @param  mixed $id
     * @return RedirectResponse
     */
    public function update(YearRequest $request, $id): RedirectResponse
    {
        $this->yearRepository->update($request->validated(), $id);

        return redirect()->route('dashboard.year.index')->with('success', 'year Updated Successfully!');
    }

    /**
     * destroy
     *
     * @param  mixed $id
     * @return RedirectResponse
     */
    public function destroy($id): RedirectResponse
    {
        $this->yearRepository->destroy($id);

        return redirect()->route('dashboard.year.index')->with('success', 'year Deleted Successfully');
    }
}
