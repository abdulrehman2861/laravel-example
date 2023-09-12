<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\AdjustmentRequest;
use App\Repositories\Interfaces\AdjustmentRepositoryInterface;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class AdjustmentController extends Controller
{
    private $adjustmentRepository;

    public function __construct(AdjustmentRepositoryInterface $adjustmentRepository)
    {
        $this->adjustmentRepository = $adjustmentRepository;
    }

    /**
     * index
     *
     * @param  mixed $request
     * @return View
     */
    public function index(Request $request): View|string
    {
        $adjustments =  $this->adjustmentRepository->allAdjustments();

        return view('dashboard.adjustment.index', compact('adjustments'));
    }
    

    /**
     * create
     *
     * @return View
     */
    public function create(): View
    {
        return view('dashboard.adjustment.create');
    }


    /**
     * store
     *
     * @param  mixed $request
     * @return RedirectResponse
     */
    public function store(AdjustmentRequest $request): RedirectResponse
    {
        $this->adjustmentRepository->store($request->validated());

        return redirect()->route('dashboard.adjustment.index')->with('success', 'Saved Successfully!');
    }
    /**
     * edit
     *
     * @param  mixed $id
     * @return View
     */
    public function edit($id): View
    {
        $adjustment = $this->adjustmentRepository->findAdjustment($id);
        return view('dashboard.adjustment.edit', compact('adjustment'));
    }

    public function show($id): View
    {
        $adjustment = $this->adjustmentRepository->findAdjustment($id);
        return view('dashboard.adjustment.show', compact('adjustment'));
    }
    

    /**
     * update
     *
     * @param  mixed $request
     * @param  mixed $id
     * @return RedirectResponse
     */
    public function update(AdjustmentRequest $request, $id): RedirectResponse
    {
        $this->adjustmentRepository->update($request->validated(), $id);


        return redirect()->route('dashboard.adjustment.index')->with('success', 'Updated Successfully!');
    }

    /**
     * destroy
     *
     * @param  mixed $id
     * @return RedirectResponse
     */
    public function destroy($id): RedirectResponse
    {
        $this->adjustmentRepository->destroy($id);

        return redirect()->route('dashboard.adjustment.index')->with('success', 'Deleted Successfully');
    }
}
