<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Requests\Dashboard\CurrencyRequest;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Repositories\Interfaces\CurrencyRepositoryInterface;

class CurrencyController extends Controller
{

    private $currencyRepository;

    /**
     * __construct
     *
     * @param  mixed $currencyRepository
     * @return void
     */
    public function __construct(CurrencyRepositoryInterface $currencyRepository)
    {
        $this->currencyRepository = $currencyRepository;
    }

    /**
     * index
     *
     * @return View
     */
    public function index(): View
    {
        $currencies = $this->currencyRepository->allCurrency();
        return view('dashboard.currency.index', compact('currencies'));
    }

    /**
     * create
     *
     * @return View
     */
    public function create(): View
    {
        return view('dashboard.currency.create');
    }

    /**
     * store
     *
     * @param  mixed $request
     * @return RedirectResponse
     */
    public function store(CurrencyRequest $request): RedirectResponse
    {
        $this->currencyRepository->store($request->all());
        return redirect()->route('dashboard.currency.index')->with('success', 'Currency created successfully');
    }

    /**
     * edit
     *
     * @param  mixed $id
     * @return View
     */
    public function edit($id): View
    {
        $currency = $this->currencyRepository->findCurrency($id);
        return view('dashboard.currency.edit', compact('currency'));
    }

    /**
     * update
     *
     * @param  mixed $request
     * @param  mixed $id
     * @return RedirectResponse
     */
    public function update(CurrencyRequest $request, $id): RedirectResponse
    {
        $this->currencyRepository->update($request->all(), $id);
        return redirect()->route('dashboard.currency.index')->with('success', 'Currency updated successfully');
    }

    /**
     * destroy
     *
     * @param  mixed $id
     * @return RedirectResponse
     */
    public function destroy($id): RedirectResponse
    {
        $this->currencyRepository->delete($id);
        return redirect()->route('dashboard.currency.index')->with('success', 'Currency deleted successfully');
    }

}
