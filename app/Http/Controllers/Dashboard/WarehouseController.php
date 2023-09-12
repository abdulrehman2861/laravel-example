<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\Dashboard\WarehouseRequest;
use App\Repositories\Interfaces\WarehouseRepositoryInterface;

class WarehouseController extends Controller
{

    private $warehouseRepository;

    /**
     * __construct
     *
     * @param  mixed $productRepository
     * @return void
     */
    public function __construct(WarehouseRepositoryInterface $warehouseRepository)
    {
        $this->warehouseRepository = $warehouseRepository;
    }

    /**
     * index
     *
     * @param  mixed $request
     * @return View
     */
    public function index(Request $request): View|string
    {
        $warehouses =  $this->warehouseRepository->allWarehouses();

        return view('dashboard.warehouse.index', compact('warehouses'));
    }

    /**
     * create
     *
     * @return View
     */
    public function create(): View
    {
        return view('dashboard.warehouse.create');
    }


    /**
     * store
     *
     * @param  mixed $request
     * @return RedirectResponse
     */
    public function store(WarehouseRequest $request): RedirectResponse
    {
        $this->warehouseRepository->store($request->validated());

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
        $warehouse = $this->warehouseRepository->findWarehouse($id);

        return view('dashboard.warehouse.edit', compact('warehouse'));
    }

    /**
     * update
     *
     * @param  mixed $request
     * @param  mixed $id
     * @return RedirectResponse
     */
    public function update(WarehouseRequest $request, $id): RedirectResponse
    {
        $this->warehouseRepository->update($request->validated(), $id);

        return redirect()->route('dashboard.warehouse.index')->with('success', 'warehouse Updated Successfully!');
    }

    /**
     * destroy
     *
     * @param  mixed $id
     * @return RedirectResponse
     */
    public function destroy($id): RedirectResponse
    {
        $this->warehouseRepository->destroy($id);

        return redirect()->route('dashboard.warehouse.index')->with('success', 'warehouse Deleted Successfully');
    }
}
