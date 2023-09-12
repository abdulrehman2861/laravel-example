<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Models\PurchaseTransaction;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\Dashboard\PurchaseTransactionRequest;
use App\Repositories\Interfaces\SupplierRepositoryInterface;
use App\Repositories\Interfaces\WarehouseRepositoryInterface;
use App\Repositories\Interfaces\PurchaseTransactionRepositoryInterface;

class PurchaseTransactionController extends Controller
{

    private $purchaseTransactionRepository,
    $warehouseRepository,
    $supplierRepository;

    /**
     * __construct
     *
     * @param  mixed $purchaseTransactionRepository
     * @return void
     */
    public function __construct(
        PurchaseTransactionRepositoryInterface $purchaseTransactionRepository,
        SupplierRepositoryInterface $supplierRepository,
        WarehouseRepositoryInterface $warehouseRepository
    ) {
        $this->purchaseTransactionRepository = $purchaseTransactionRepository;
        $this->supplierRepository = $supplierRepository;
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
        //$transactions =  $this->purchaseTransactionRepository->alltransactions();

        return view('dashboard.purchase_transaction.index');
    }

    /**
     * create
     *
     * @return View
     */
    public function create(): View
    {
        $suppliers = $this->supplierRepository->allSuppliersNonPaginated();
        $transaction_status = PurchaseTransaction::ALL_TRANSACTION_STATUS;
        $warehouses = $this->warehouseRepository->allWarehousesNonPaginated();
        $payment_methods = PurchaseTransaction::ALL_PAYMENT_METHOD_TYPES;
        return view('dashboard.purchase_transaction.create', compact(
            'suppliers',
            'transaction_status',
            'warehouses',
            'payment_methods'
        )
        );
    }


    /**
     * store
     *
     * @param  mixed $request
     * @return RedirectResponse
     */
    public function store(PurchaseTransactionRequest $request): RedirectResponse
    {
        $this->purchaseTransactionRepository->store($request->validated());

        return redirect()->route('dashboard.purchase.index')->with('success', 'Saved Successfully!');
    }

    /**
     * edit
     *
     * @param  mixed $id
     * @return View
     */
    public function edit($id): View
    {
        $transaction = $this->purchaseTransactionRepository->findTransaction($id);

        return view('dashboard.purchase_transaction.edit', compact('transaction'));
        // dd($transaction);
    }

    /**
     * update
     *
     * @param  mixed $request
     * @param  mixed $id
     * @return RedirectResponse
     */
    public function update(PurchaseTransactionRequest $request, $id): RedirectResponse
    {
        $this->purchaseTransactionRepository->update($request->validated(), $id);

        return redirect()->route('dashboard.purchase.index')->with('success', 'transaction Updated Successfully!');
    }

    public function show($id): View
    {
        $transaction = $this->purchaseTransactionRepository->findTransaction($id);
        return view('dashboard.purchase_transaction.show', compact('transaction'));
    }

    /**
     * destroy
     *
     * @param  mixed $id
     * @return RedirectResponse
     */
    public function destroy($id): RedirectResponse
    {
        $this->purchaseTransactionRepository->destroy($id);

        return redirect()->route('dashboard.purchase.index')->with('success', 'transaction Deleted Successfully');
    }

    /**
     * stockList
     *
     * @param  mixed $request
     * @return View
     */
    public function stockList(Request $request): View|string
    {

        return view('dashboard.purchase_transaction.stockList');
    }

    /**
     * receiveStock
     *
     * @param  mixed $id
     * @return RedirectResponse
     */
    public function receiveStock($id): RedirectResponse
    {
        $this->purchaseTransactionRepository->recieveStock($id);

        return redirect()->route('dashboard.purchase.stock')->with('success', 'Stock Received Successfully');
    }

    /**
     * specificStockList
     *
     * @param  mixed $request
     * @return View
     */
    public function specificStockList(Request $request): View|string
    {
        $suppliers = $this->supplierRepository->allSuppliersNonPaginated();
        $transactions = [];

        if (request()->has('reference') || request()->has('supplier_id'))
        {
            $transactions = $this->purchaseTransactionRepository->getTransactionsForPartReceiving();
        }

        return view('dashboard.purchase_transaction.specificStockList', compact('suppliers','transactions'));
    }

    /**
     * receiveSpecificStock
     *
     * @param  mixed $id
     * @return RedirectResponse
     */
    public function receiveSpecificStock($id): RedirectResponse
    {
        $this->purchaseTransactionRepository->recieveSpecificStock($id);

        return redirect()->route('dashboard.purchase.specific.stock')->with('success', 'Part Received Successfully');
    }
}
