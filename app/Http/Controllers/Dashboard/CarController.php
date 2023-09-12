<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\Dashboard\CarRequest;
use App\Repositories\Interfaces\CarRepositoryInterface;
use App\Repositories\Interfaces\CarCompanyRepositoryInterface;

class CarController extends Controller
{

    private $carRepository,
            $CarCompanyRepository;

    /**
     * __construct
     *
     * @param  mixed $carRepository
     * @return void
     */
    public function __construct(CarRepositoryInterface $carRepository,CarCompanyRepositoryInterface $CarCompanyRepository)
    {
        $this->carRepository = $carRepository;
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
        $makes =  $this->CarCompanyRepository->allCompaniesNonpaginated();

        return view('dashboard.model.index', compact('makes'));
    }

    /**
     * create
     *
     * @return View
     */
    public function create(): View
    {
        return view('dashboard.model.create');
    }


    /**
     * store
     *
     * @param  mixed $request
     * @return RedirectResponse
     */
    public function store(CarRequest $request): RedirectResponse
    {
        $this->carRepository->store($request->validated());

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
        $makes =  $this->CarCompanyRepository->allCompaniesNonpaginated();
        $model = $this->carRepository->findCar($id);

        return view('dashboard.model.edit', compact('model','makes'));
    }

    /**
     * fetchBodystyle
     *
     * @param  mixed $request
     * @return JsonResponse
     */
    public function fetchBodystyle(Request $request) :JsonResponse
    {
        $model = $this->carRepository->findCar($request->id);


        return response()->json([
            'data' => $model?->bodyStyles
        ]);
    }

    /**
     * update
     *
     * @param  mixed $request
     * @param  mixed $id
     * @return RedirectResponse
     */
    public function update(CarRequest $request, $id): RedirectResponse
    {
        $this->carRepository->update($request->validated(), $id);

        return redirect()->route('dashboard.model.index')->with('success', 'Model Updated Successfully!');
    }

    /**
     * destroy
     *
     * @param  mixed $id
     * @return RedirectResponse
     */
    public function destroy($id): RedirectResponse
    {
        $this->carRepository->destroy($id);

        return redirect()->route('dashboard.model.index')->with('success', 'Model Deleted Successfully');
    }
}
