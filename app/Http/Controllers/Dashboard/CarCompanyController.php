<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\Dashboard\CarCompanyRequest;
use App\Repositories\Interfaces\CarCompanyRepositoryInterface;

class CarCompanyController extends Controller
{

    private $CarCompanyRepository;

    /**
     * __construct
     *
     * @param  mixed $productRepository
     * @return void
     */
    public function __construct(CarCompanyRepositoryInterface $CarCompanyRepository)
    {
        $this->CarCompanyRepository = $CarCompanyRepository;
    }

    /**
     * index
     *
     * @param  mixed $request
     * @return View
     */
    public function index(Request $request): View|string
    {

        return view('dashboard.make.index');
    }

    /**
     * create
     *
     * @return View
     */
    public function create(): View
    {
        return view('dashboard.make.create');
    }


    /**
     * store
     *
     * @param  mixed $request
     * @return RedirectResponse
     */
    public function store(CarCompanyRequest $request): RedirectResponse
    {
        $this->CarCompanyRepository->store($request->validated());

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
        $make = $this->CarCompanyRepository->findCompany($id);

        return view('dashboard.make.edit', compact('make'));
    }

    /**
     * fetchModels
     *
     * @param  mixed $request
     * @return JsonResponse
     */
    public function fetchModels(Request $request) :JsonResponse
    {
        $make = $this->CarCompanyRepository->findCompany($request->id);


        return response()->json([
            'data' => $make?->cars
        ]);
    }

    /**
     * update
     *
     * @param  mixed $request
     * @param  mixed $id
     * @return RedirectResponse
     */
    public function update(CarCompanyRequest $request, $id): RedirectResponse
    {
        $this->CarCompanyRepository->update($request->validated(), $id);

        return redirect()->route('dashboard.make.index')->with('success', 'Make Updated Successfully!');
    }

    /**
     * destroy
     *
     * @param  mixed $id
     * @return RedirectResponse
     */
    public function destroy($id): RedirectResponse
    {
        $this->CarCompanyRepository->destroy($id);

        return redirect()->route('dashboard.make.index')->with('success', 'Make Deleted Successfully');
    }
}
