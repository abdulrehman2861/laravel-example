<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\Dashboard\BodyStyleRequest;
use App\Repositories\Interfaces\CarRepositoryInterface;
use App\Repositories\Interfaces\BodyStyleRepositoryInterface;

class BodyStyleController extends Controller
{

    private $bodyStyleRepository,
                $carRepository;

    /**
     * __construct
     *
     * @param  mixed $productRepository
     * @param  mixed $carRepository
     * @return void
     */
    public function __construct(BodyStyleRepositoryInterface $bodyStyleRepository,CarRepositoryInterface $carRepository)
    {
        $this->bodyStyleRepository = $bodyStyleRepository;
        $this->carRepository = $carRepository;
    }

    /**
     * index
     *
     * @param  mixed $request
     * @return View
     */
    public function index(Request $request): View|string
    {
        $models =  $this->carRepository->allCarsNonPaginated();

        return view('dashboard.bodyStyle.index', compact('models'));
    }

    /**
     * create
     *
     * @return View
     */
    // public function create(): View
    // {
    //     return view('dashboard.bodyStyle.create');
    // }


    /**
     * store
     *
     * @param  mixed $request
     * @return RedirectResponse
     */
    public function store(BodyStyleRequest $request): RedirectResponse
    {
        $this->bodyStyleRepository->store($request->validated());

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
        $models =  $this->carRepository->allCarsNonPaginated();
        $bodyStyle = $this->bodyStyleRepository->findBodyStyle($id);

        return view('dashboard.bodyStyle.edit', compact('bodyStyle','models'));
    }

    /**
     * update
     *
     * @param  mixed $request
     * @param  mixed $id
     * @return RedirectResponse
     */
    public function update(BodyStyleRequest $request, $id): RedirectResponse
    {
        $this->bodyStyleRepository->update($request->validated(), $id);

        return redirect()->route('dashboard.bodystyle.index')->with('success', 'Body Style Updated Successfully!');
    }

    /**
     * destroy
     *
     * @param  mixed $id
     * @return RedirectResponse
     */
    public function destroy($id): RedirectResponse
    {
        $this->bodyStyleRepository->destroy($id);

        return redirect()->route('dashboard.bodystyle.index')->with('success', 'Body Style Deleted Successfully');
    }
}
