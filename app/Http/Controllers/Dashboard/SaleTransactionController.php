<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Models\SaleTransaction;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\Dashboard\SaleTransactionRequest;
use App\Repositories\Interfaces\SaleTransactionRepositoryInterface;

class SaleTransactionController extends Controller
{

    private $saleTransactionRepository;


    /**
     * __construct
     *
     * @param  mixed $saleTransactionRepository
     * @return void
     */
    public function __construct(SaleTransactionRepositoryInterface $saleTransactionRepository)
    {
        $this->saleTransactionRepository = $saleTransactionRepository;
    }

    /**
     * index
     *
     * @param  mixed $request
     * @return View
     */
    public function index(Request $request): View|string
    {
        $transactions =  $this->saleTransactionRepository->alltransactions();

        return view('dashboard.sale_transaction.index', compact('transactions'));
    }

    /**
     * create
     *
     * @return View
     */
    public function create(): View
    {
        return view('dashboard.sale_transaction.create');
    }


    /**
     * store
     *
     * @param  mixed $request
     * @return RedirectResponse
     */
    public function store(SaleTransactionRequest $request): RedirectResponse
    {
        $this->saleTransactionRepository->store($request->validated());

        return redirect()->route('dashboard.sale.index')->with('success', 'Saved Successfully!');
    }

    /**
     * edit
     *
     * @param  mixed $id
     * @return View
     */
    public function edit($id): View
    {
        $transaction = $this->saleTransactionRepository->findTransaction($id);

        return view('dashboard.sale_transaction.edit', compact('transaction'));
    }

    /**
     * update
     *
     * @param  mixed $request
     * @param  mixed $id
     * @return RedirectResponse
     */
    public function update(SaleTransactionRequest $request, $id): RedirectResponse
    {
        $this->saleTransactionRepository->update($request->validated(), $id);

        return redirect()->route('dashboard.sale.index')->with('success', 'transaction Updated Successfully!');
    }

    /**
     * show
     *
     * @param  mixed $transaction
     * @return View
     */
    public function show($id): View
    {
        $transaction = $this->saleTransactionRepository->findTransaction($id);
        return view('dashboard.sale_transaction.show', compact('transaction'));
    }

    /**
     * destroy
     *
     * @param  mixed $id
     * @return RedirectResponse
     */
    public function destroy($id): RedirectResponse
    {
        $this->saleTransactionRepository->destroy($id);

        return redirect()->route('dashboard.sale.index')->with('message', 'transaction Deleted Successfully');
    }


}
