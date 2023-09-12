<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\Dashboard\SupplierRequest;
use App\Repositories\Interfaces\SupplierRepositoryInterface;

class SupplierController extends Controller
{

    private $supplierRepository;

    /**
     * __construct
     *
     * @param  mixed $productRepository
     * @return void
     */
    public function __construct(SupplierRepositoryInterface $supplierRepository)
    {
        $this->supplierRepository = $supplierRepository;
    }

    /**
     * index
     *
     * @param  mixed $request
     * @return View
     */
    public function index(Request $request): View|string
    {
        $suppliers =  $this->supplierRepository->allSuppliers();

        return view('dashboard.supplier.index', compact('suppliers'));
    }

    /**
     * create
     *
     * @return View
     */
    public function create(): View
    {
        return view('dashboard.supplier.create');
    }


    /**
     * store
     *
     * @param  mixed $request
     * @return RedirectResponse
     */
    public function store(SupplierRequest $request): RedirectResponse
    {
        $this->supplierRepository->store($request->validated());

        return redirect()->route('dashboard.supplier.index')->with('success', 'Saved Successfully!');
    }

    /**
     * edit
     *
     * @param  mixed $id
     * @return View
     */
    public function edit($id): View
    {
        $supplier = $this->supplierRepository->findSupplier($id);

        return view('dashboard.supplier.edit', compact('supplier'));
    }

    /**
     * show
     *
     * @param  mixed $supplier
     * @return View
     */
    public function show(Supplier $supplier): View
    {

        return view('dashboard.supplier.show', compact('supplier'));
    }

    /**
     * update
     *
     * @param  mixed $request
     * @param  mixed $id
     * @return RedirectResponse
     */
    public function update(SupplierRequest $request, $id): RedirectResponse
    {
        $this->supplierRepository->update($request->validated(), $id);

        return redirect()->route('dashboard.supplier.index')->with('success', 'Supplier Updated Successfully!');
    }

    /**
     * destroy
     *
     * @param  mixed $id
     * @return RedirectResponse
     */
    public function destroy($id): RedirectResponse
    {
        $this->supplierRepository->destroy($id);

        return redirect()->route('dashboard.supplier.index')->with('success', 'Supplier Deleted Successfully');
    }
}
