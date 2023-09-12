<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\Dashboard\SaleReturnRequest;
use App\Repositories\Interfaces\SaleReturnRepositoryInterface;

class SaleReturnController extends Controller
{

    private $saleReturnRepository;


    public function __construct(SaleReturnRepositoryInterface $saleReturnRepository)
    {
        $this->saleReturnRepository = $saleReturnRepository;
    }

    /**
     * index
     *
     * @param  mixed $request
     * @return View
     */
    public function index(Request $request): View|string
    {
        $saleReturns =  $this->saleReturnRepository->allReturns();

        return view('dashboard.saleReturn.index', compact('saleReturns'));
    }

    /**
     * create
     *
     * @return View
     */
    public function create(): View
    {
        return view('dashboard.saleReturn.create');
    }


    /**
     * store
     *
     * @param  mixed $request
     * @return RedirectResponse
     */
    public function store(SaleReturnRequest $request): RedirectResponse
    {
        $this->saleReturnRepository->store($request->validated());

        return redirect()->route('dashboard.sale-return.index')->with('success', 'Saved Successfully!');
    }

    /**
     * edit
     *
     * @param  mixed $id
     * @return View
     */
    public function edit($id): View
    {
        $saleReturn = $this->saleReturnRepository->findReturn($id);

        return view('dashboard.saleReturn.edit', compact('saleReturn'));
    }

    /**
     * update
     *
     * @param  mixed $request
     * @param  mixed $id
     * @return RedirectResponse
     */
    public function update(SaleReturnRequest $request, $id): RedirectResponse
    {
        $this->saleReturnRepository->update($request->validated(), $id);

        return redirect()->back()->with('success', 'saleReturn Updated Successfully!');
    }

    /**
     * destroy
     *
     * @param  mixed $id
     * @return RedirectResponse
     */
    public function destroy($id): RedirectResponse
    {
        $this->saleReturnRepository->destroy($id);

        return redirect()->route('dashboard.sale-return.index')->with('success', 'saleReturn Deleted Successfully');
    }
}
