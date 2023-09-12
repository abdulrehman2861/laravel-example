<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Repositories\Interfaces\SaleTransactionRepositoryInterface;

class QuotationController extends Controller
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
        $quotations =  $this->saleTransactionRepository->getAllQuotes();

        return view('dashboard.quotation.index', compact('quotations'));
    }

    /**
     * show
     *
     * @param  mixed $quotations
     * @return View
     */
    public function show($id): View
    {
        $quotations = $this->saleTransactionRepository->findQuotation($id);
        return view('dashboard.quotation.show', compact('quotations'));
    }

    /**
     * destroy
     *
     * @param  mixed $id
     * @return RedirectResponse
     */
    public function destroy($id): RedirectResponse
    {
        $this->saleTransactionRepository->destroyQuotation($id);

        return redirect()->route('dashboard.quotation.index')->with('success', 'Quotation Deleted Successfully');
    }


}
