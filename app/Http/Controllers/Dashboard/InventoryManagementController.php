<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Repositories\Interfaces\ProductRepositoryInterface;
use App\Repositories\Interfaces\InventoryManagementRepositoryInterface;

class InventoryManagementController extends Controller
{

    private $inventoryManagementRepository,
                $productRepository;

    /**
     * __construct
     *
     * @param  mixed $inventoryManagementRepository
     * @return void
     */
    public function __construct(InventoryManagementRepositoryInterface $inventoryManagementRepository,
                                    ProductRepositoryInterface $productRepository)
    {
        $this->inventoryManagementRepository = $inventoryManagementRepository;
        $this->productRepository = $productRepository;
    }

    /**
     * index
     *
     * @return View
     */
    public function index(): View
    {
        $products = $this->productRepository->allProducts(request()->search,request()->perPage ?? 50);
        return view('dashboard.maintenance.inventory-management', compact('products'));
    }

    /**
     * export
     *
     * @return RedirectResponse
     */
    public function export(): RedirectResponse
    {
        $this->inventoryManagementRepository->exportInventory();
        die();
        // return redirect()->route('dashboard.inv.index')->with('success', 'Inventory exported successfully.');
    }

    /**
     * import
     *
     * @param  mixed $request
     * @return RedirectResponse
     */
    public function import(Request $request): RedirectResponse
    {
        $this->inventoryManagementRepository->importInventory($request);
        return redirect()->route('dashboard.inv.index')->with('success', 'Inventory imported successfully. It may take some time for changes to reflect.');
    }

    /**
     * clear
     *
     * @param  mixed $request
     * @return RedirectResponse
     */
    public function clear(Request $request, $column): RedirectResponse
    {
        // dd($request->column);
        $this->inventoryManagementRepository->clearInventoryColumn($column, $request->has('id_arr') ? $request->id_arr : []);
        return redirect()->route('dashboard.inv.index')->with('success', 'Inventory cleared successfully');
    }
}
