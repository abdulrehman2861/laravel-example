<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\Dashboard\CustomerTypeRequest;
use App\Repositories\Interfaces\CustomerTypeRepositoryInterface;

class CustomerTypeController extends Controller
{

    private $customerTypeRepository;

    /**
     * __construct
     *
     * @param  mixed $productRepository
     * @return void
     */
    public function __construct(CustomerTypeRepositoryInterface $customerTypeRepository)
    {
        $this->customerTypeRepository = $customerTypeRepository;
    }

    /**
     * index
     *
     * @param  mixed $request
     * @return View
     */
    public function index(Request $request): View|string
    {
        $customerTypes =  $this->customerTypeRepository->allCustomerTypes();

        return view('dashboard.customerType.index', compact('customerTypes'));
    }

    /**
     * create
     *
     * @return View
     */
    public function create(): View
    {
        return view('dashboard.customerType.create');
    }


    /**
     * store
     *
     * @param  mixed $request
     * @return RedirectResponse
     */
    public function store(CustomerTypeRequest $request): RedirectResponse
    {
        $this->customerTypeRepository->store($request->validated());

        return redirect()->route('dashboard.customerType.index')->with('success', 'Saved Successfully!');
    }

    /**
     * edit
     *
     * @param  mixed $id
     * @return View
     */
    public function edit($id): View
    {
        $customerType = $this->customerTypeRepository->findCustomerType($id);

        return view('dashboard.customerType.edit', compact('customerType'));
    }

    /**
     * update
     *
     * @param  mixed $request
     * @param  mixed $id
     * @return RedirectResponse
     */
    public function update(CustomerTypeRequest $request, $id): RedirectResponse
    {
        $this->customerTypeRepository->update($request->validated(), $id);

        return redirect()->route('dashboard.customerType.index')->with('success', 'Customer Type Updated Successfully!');
    }

    /**
     * destroy
     *
     * @param  mixed $id
     * @return RedirectResponse
     */
    public function destroy($id): RedirectResponse
    {
        $this->customerTypeRepository->destroy($id);

        return redirect()->route('dashboard.customerType.index')->with('message', 'Customer Type Deleted Successfully');
    }
}
