<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\Dashboard\GlassRequest;
use App\Repositories\Interfaces\GlassRepositoryInterface;

class GlassController extends Controller
{

    private $glassRepository;

    /**
     * __construct
     *
     * @param  mixed $glassRepository
     * @return void
     */
    public function __construct(GlassRepositoryInterface $glassRepository)
    {
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

        return view('dashboard.glass.index');
    }

    /**
     * create
     *
     * @return View
     */
    public function create(): View
    {
        return view('dashboard.glass.create');
    }


    /**
     * store
     *
     * @param  mixed $request
     * @return RedirectResponse
     */
    public function store(GlassRequest $request): RedirectResponse
    {
        $this->glassRepository->store($request->validated());

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
        $glass = $this->glassRepository->findGlass($id);

        return view('dashboard.glass.edit', compact('glass'));
    }

    /**
     * fetchFeature
     *
     * @param  mixed $request
     * @return JsonResponse
     */
    public function fetchFeature(Request $request) :JsonResponse
    {
        $glass = $this->glassRepository->findGlass($request->id);


        return response()->json([
            'data' => $glass?->features
        ]);
    }

    /**
     * update
     *
     * @param  mixed $request
     * @param  mixed $id
     * @return RedirectResponse
     */
    public function update(GlassRequest $request, $id): RedirectResponse
    {
        $this->glassRepository->update($request->validated(), $id);

        return redirect()->route('dashboard.glass.index')->with('success', 'Glass Updated Successfully!');
    }

    /**
     * destroy
     *
     * @param  mixed $id
     * @return RedirectResponse
     */
    public function destroy($id): RedirectResponse
    {
        $this->glassRepository->destroy($id);

        return redirect()->route('dashboard.glass.index')->with('success', 'Glass Deleted Successfully');
    }
}
