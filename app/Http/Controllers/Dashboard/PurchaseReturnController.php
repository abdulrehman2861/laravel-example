<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\Dashboard\PurchaseReturnRequest;
use App\Repositories\Interfaces\PurchaseReturnRepositoryInterface;

class PurchaseReturnController extends Controller
{

    private $purchaseReturnRepository;


    public function __construct(PurchaseReturnRepositoryInterface $purchaseReturnRepository)
    {
        $this->purchaseReturnRepository = $purchaseReturnRepository;
    }

    /**
     * index
     *
     * @param  mixed $request
     * @return View
     */
    public function index(Request $request): View|string
    {
        $purchaseReturns =  $this->purchaseReturnRepository->allReturns();

        return view('dashboard.purchaseReturn.index', compact('purchaseReturns'));
    }

    /**
     * create
     *
     * @return View
     */
    public function create(): View
    {
        return view('dashboard.purchaseReturn.create');
    }


    /**
     * store
     *
     * @param  mixed $request
     * @return RedirectResponse
     */
    public function store(PurchaseReturnRequest $request): RedirectResponse
    {
        $this->purchaseReturnRepository->store($request->validated());

        return redirect()->route('dashboard.purchase-return.index')->with('success', 'Saved Successfully!');
    }

    /**
     * edit
     *
     * @param  mixed $id
     * @return View
     */
    public function edit($id): View
    {
        $purchaseReturn = $this->purchaseReturnRepository->findReturn($id);

        return view('dashboard.purchaseReturn.edit', compact('purchaseReturn'));
    }

    /**
     * update
     *
     * @param  mixed $request
     * @param  mixed $id
     * @return RedirectResponse
     */
    public function update(PurchaseReturnRequest $request, $id): RedirectResponse
    {
        $this->purchaseReturnRepository->update($request->validated(), $id);

        return redirect()->back()->with('success', 'purchaseReturn Updated Successfully!');
    }

    /**
     * destroy
     *
     * @param  mixed $id
     * @return RedirectResponse
     */
    public function destroy($id): RedirectResponse
    {
        $this->purchaseReturnRepository->destroy($id);

        return redirect()->route('dashboard.purchase-return.index')->with('success', 'purchaseReturn Deleted Successfully');
    }
}
