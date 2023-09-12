<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Repositories\Interfaces\SettingRepositoryInterface;
use App\Repositories\Interfaces\CurrencyRepositoryInterface;

class SettingController extends Controller
{

    private $settingRepository;
    private $currencyRepository;

    /**
     * __construct
     *
     * @param  mixed $settingRepository
     * @return void
     */
    public function __construct(SettingRepositoryInterface $settingRepository,
                                    CurrencyRepositoryInterface $currencyRepository)
    {
        $this->settingRepository = $settingRepository;
        $this->currencyRepository = $currencyRepository;
    }

    /**
     * index
     *
     * @return View
     */
    public function index(): View
    {
        $setting = $this->settingRepository->getSetting();
        $currencies = $this->currencyRepository->allCurrencyNonpaginated();
        $smtpSetting = $this->settingRepository->getSmtpSetting();
        $upsSetting = $this->settingRepository->getUpsSetting();
        $fedexSetting = $this->settingRepository->getFedexSetting();
        $stripeSetting = $this->settingRepository->getStripeSetting();
        $paypalSetting = $this->settingRepository->getPaypalSetting();
        return view('dashboard.settings.index', compact('setting','currencies','smtpSetting', 'upsSetting', 'fedexSetting', 'stripeSetting', 'paypalSetting'));
    }

    /**
     * store
     *
     * @param  mixed $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        $this->settingRepository->store($request->except('_token'));
        return redirect()->back()->with('success', 'Setting has been updated successfully');
    }

    /**
     * update
     *
     * @param  mixed $request
     * @return RedirectResponse
     */
    public function update(Request $request): RedirectResponse
    {
        $this->settingRepository->update($request->except('_token'));
        return redirect()->back()->with('success', 'Setting has been updated successfully');
    }

    /**
     * smtp
     *
     * @return View
     */
    public function smtp(): View
    {
        $setting = $this->settingRepository->getSmtpSetting();
        return view('dashboard.settings.smtp', compact('setting'));
    }

    /**
     * smtpUpdate
     *
     * @param  mixed $request
     * @return RedirectResponse
     */
    public function smtpUpdate(Request $request): RedirectResponse
    {
        $this->settingRepository->setSmtpSetting($request->except('_token'));
        return redirect()->back()->with('success', 'SMTP Setting has been updated successfully');
    }

    public function shippingUpdate(Request $request){
        $this->settingRepository->setShippingSetting($request->except('_token'));
        return redirect()->back()->with('success', 'Shipping Setting has been updated successfully');
    }

    public function upsUpdate(Request $request){
        $this->settingRepository->setUpsSetting($request->except('_token'));
        return redirect()->back()->with('success', 'UPS Setting has been updated successfully');
    }

    public function fedexUpdate(Request $request){
        $this->settingRepository->setFedexSetting($request->except('_token'));
        return redirect()->back()->with('success', 'Fedex Setting has been updated successfully');
    }

    public function stripeUpdate(Request $request){
        $this->settingRepository->setStripeSetting($request->except('_token'));
        return redirect()->back()->with('success', 'Stripe Setting has been updated successfully');
    }

    public function paypalUpdate(Request $request){
        $this->settingRepository->setPaypalSetting($request->except('_token'));
        return redirect()->back()->with('success', 'Paypal Setting has been updated successfully');
    }
}
