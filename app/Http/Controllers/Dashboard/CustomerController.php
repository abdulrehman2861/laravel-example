<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\CustomerType;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\Dashboard\CustomerRequest;
use App\Repositories\Interfaces\CustomerRepositoryInterface;

class CustomerController extends Controller
{

    private $customerRepository;

    /**
     * __construct
     *
     * @param  mixed $productRepository
     * @return void
     */
    public function __construct(CustomerRepositoryInterface $customerRepository)
    {
        $this->customerRepository = $customerRepository;
    }

    /**
     * index
     *
     * @param  mixed $request
     * @return View
     */
    public function index(Request $request): View|string
    {
        $customers =  $this->customerRepository->allCustomers();

        return view('dashboard.customer.index', compact('customers'));
    }

    /**
     * create
     *
     * @return View
     */
    public function create(): View
    {
        $customerTypes = CustomerType::get();
        return view('dashboard.customer.create',['customerTypes' => $customerTypes]);
    }


    /**
     * store
     *
     * @param  mixed $request
     * @return RedirectResponse
     */
    public function store(CustomerRequest $request): RedirectResponse
    {
        $this->customerRepository->store($request->validated());

        return redirect()->route('dashboard.customer.index')->with('success', 'Saved Successfully!');
    }

    /**
     * edit
     *
     * @param  mixed $id
     * @return View
     */
    public function edit($id): View
    {
        $customer = $this->customerRepository->findCustomer($id);
        $customerTypes = CustomerType::get(); 
        return view('dashboard.customer.edit', compact('customer','customerTypes'));
    }

    /**
     * update
     *
     * @param  mixed $request
     * @param  mixed $id
     * @return RedirectResponse
     */
    public function update(CustomerRequest $request, $id): RedirectResponse
    {
        $this->customerRepository->update($request->validated(), $id);

        return redirect()->route('dashboard.customer.index')->with('success', 'Customer Updated Successfully!');
    }

    /**
     * destroy
     *
     * @param  mixed $id
     * @return RedirectResponse
     */
    public function destroy($id): RedirectResponse
    {
        $this->customerRepository->destroy($id);

        return redirect()->route('dashboard.customer.index')->with('message', 'Customer Deleted Successfully');
    }
}
