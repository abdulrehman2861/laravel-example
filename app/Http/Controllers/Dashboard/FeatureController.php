<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\Dashboard\FeatureRequest;
use App\Repositories\Interfaces\GlassRepositoryInterface;
use App\Repositories\Interfaces\FeatureRepositoryInterface;

class FeatureController extends Controller
{

    private $featureRepository,
             $GlassRepository;


    /**
     * __construct
     *
     * @param  mixed $featureRepository
     * @param  mixed $GlassRepository
     * @return void
     */
    public function __construct(FeatureRepositoryInterface $featureRepository,GlassRepositoryInterface $GlassRepository)
    {
        $this->featureRepository = $featureRepository;
        $this->GlassRepository = $GlassRepository;
    }

    /**
     * index
     *
     * @param  mixed $request
     * @return View
     */
    public function index(Request $request): View|string
    {
        $glasses =  $this->GlassRepository->allGlassesNonPaginated();

        return view('dashboard.feature.index', compact('glasses'));
    }

    /**
     * create
     *
     * @return View
     */
    // public function create(): View
    // {
    //     return view('dashboard.subCategory.create');
    // }


    /**
     * store
     *
     * @param  mixed $request
     * @return RedirectResponse
     */
    public function store(FeatureRequest $request): RedirectResponse
    {
        $this->featureRepository->store($request->validated());

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
        $feature = $this->featureRepository->findFeature($id);
        $glasses =  $this->GlassRepository->allGlassesNonPaginated();

        return view('dashboard.feature.edit', compact('feature','glasses'));
    }

    /**
     * update
     *
     * @param  mixed $request
     * @param  mixed $id
     * @return RedirectResponse
     */
    public function update(FeatureRequest $request, $id): RedirectResponse
    {
        $this->featureRepository->update($request->validated(), $id);

        return redirect()->route('dashboard.feature.index')->with('success', 'feature Updated Successfully!');
    }

    /**
     * destroy
     *
     * @param  mixed $id
     * @return RedirectResponse
     */
    public function destroy($id): RedirectResponse
    {
        $this->featureRepository->destroy($id);

        return redirect()->route('dashboard.feature.index')->with('success', 'feature Deleted Successfully');
    }
}
