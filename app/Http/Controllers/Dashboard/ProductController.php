<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\ProductFitting;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\Dashboard\ProductRequest;
use App\Repositories\Interfaces\YearRepositoryInterface;
use App\Repositories\Interfaces\GlassRepositoryInterface;
use App\Repositories\Interfaces\ProductRepositoryInterface;
use App\Repositories\Interfaces\CategoryRepositoryInterface;
use App\Repositories\Interfaces\SupplierRepositoryInterface;
use App\Repositories\Interfaces\WarehouseRepositoryInterface;
use App\Repositories\Interfaces\CarCompanyRepositoryInterface;

class ProductController extends Controller
{

    private $productRepository,
            $warehouseRepository,
            $supplierRepository,
            $categoryRepository,
            $yearRepository,
            $CarCompanyRepository,
            $glassRepository;

    /**
     * __construct
     *
     * @param  mixed $productRepository
     * @return void
     */
    public function __construct(ProductRepositoryInterface $productRepository,
                                    WarehouseRepositoryInterface $warehouseRepository,
                                    SupplierRepositoryInterface $supplierRepository,
                                    CategoryRepositoryInterface $categoryRepository,
                                    YearRepositoryInterface $yearRepository,
                                    CarCompanyRepositoryInterface $CarCompanyRepository,
                                    GlassRepositoryInterface $glassRepository)
    {
        $this->productRepository = $productRepository;
        $this->warehouseRepository = $warehouseRepository;
        $this->supplierRepository = $supplierRepository;
        $this->categoryRepository = $categoryRepository;
        $this->yearRepository = $yearRepository;
        $this->CarCompanyRepository = $CarCompanyRepository;
        $this->glassRepository = $glassRepository;
    }

    /**
     * index
     *
     * @param  mixed $request
     * @return View
     */
    public function index(Request $request): View|string
    {
        $products =  $this->productRepository->allProducts();

        return view('dashboard.product.index', compact('products'));
    }

    /**
     * create
     *
     * @return View
     */
    public function create(): View
    {
        $products =  $this->productRepository->allProducts();
        $warehouses =  $this->warehouseRepository->allWarehousesNonPaginated();
        $suppliers =  $this->supplierRepository->allSuppliersNonPaginated();
        $barcode_symbols =  Product::ALL_BARCODE_SYMBOL_TYPES_NAMES;
        $taxTypes =  Product::ALL_TAX_TYPES;
        $categories =  $this->categoryRepository->allCategoriesNonPaginated();
        $yearTypes =  ProductFitting::ALL_YEAR_TYPES;
        $years =  $this->yearRepository->allYearsNonPaginated();
        $makes =  $this->CarCompanyRepository->allCompaniesNonpaginated();
        $glasses =  $this->glassRepository->allGlassesNonPaginated();

        return view('dashboard.product.create', compact('products',
                                                        'warehouses',
                                                        'barcode_symbols',
                                                        'suppliers',
                                                        'taxTypes',
                                                        'categories',
                                                        'yearTypes',
                                                        'years',
                                                        'makes',
                                                        'glasses'));
    }


    /**
     * store
     *
     * @param  mixed $request
     * @return RedirectResponse
     */
    public function store(ProductRequest $request): RedirectResponse
    {
        $this->productRepository->store($request->validated());

        return redirect()->route('dashboard.product.index')->with('success', 'Saved Successfully!');
    }

    /**
     * edit
     *
     * @param  mixed $id
     * @return View
     */
    public function edit($id): View
    {
        $product = $this->productRepository->findProduct($id);

        $products =  $this->productRepository->allProducts();
        $warehouses =  $this->warehouseRepository->allWarehousesNonPaginated();
        $suppliers =  $this->supplierRepository->allSuppliersNonPaginated();
        $barcode_symbols =  Product::ALL_BARCODE_SYMBOL_TYPES_NAMES;
        $taxTypes =  Product::ALL_TAX_TYPES;
        $categories =  $this->categoryRepository->allCategoriesNonPaginated();
        $yearTypes =  ProductFitting::ALL_YEAR_TYPES;
        $years =  $this->yearRepository->allYearsNonPaginated();
        $makes =  $this->CarCompanyRepository->allCompaniesNonpaginated();
        $glasses =  $this->glassRepository->allGlassesNonPaginated();

        return view('dashboard.product.edit', compact('products',
                                                        'warehouses',
                                                        'barcode_symbols',
                                                        'suppliers',
                                                        'taxTypes',
                                                        'categories',
                                                        'yearTypes',
                                                        'years',
                                                        'makes',
                                                        'glasses',
                                                        'product'));
    }

    /**
     * update
     *
     * @param  mixed $request
     * @param  mixed $id
     * @return RedirectResponse
     */
    public function update(ProductRequest $request, $id): RedirectResponse
    {
        $this->productRepository->update($request->all(), $id);

        return redirect()->route('dashboard.product.index')->with('success', 'Product Updated Successfully!');
    }

    /**
     * destroy
     *
     * @param  mixed $id
     * @return RedirectResponse
     */
    public function destroy($id): RedirectResponse
    {
        $this->productRepository->destroy($id);

        return back()->with('message', 'Product Deleted Successfully');
    }


}
