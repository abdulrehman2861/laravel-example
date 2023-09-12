<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Models\SaleTransaction;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use App\Repositories\Interfaces\SettingRepositoryInterface;

class HomeController extends Controller
{
    private $settingRepository;

    /**
     * __construct
     *
     * @param  mixed $settingRepository
     * @return void
     */
    public function __construct(SettingRepositoryInterface $settingRepository)
    {
        $this->settingRepository = $settingRepository;
    }

    public function index(Request $request): View
    {

        $eventsData = SaleTransaction::whereNotNull('appointment_date')
                                    ->whereNotNull('appointment_time')
                                    ->where('transaction_type',SaleTransaction::TRANSACTION_TYPE_WORK_ORDER)
                                    ->get();


        $events = [];

        $setting = $this->settingRepository->getSetting();

        foreach($eventsData as $event){
            $newevent =  [
                'id' => $event->id,
                'description' => $event->appointment_time,
                'title' => $event->transactionDetails()?->first()?->productFitting?->yearFrom?->name .','. $event->transactionDetails()?->first()?->productFitting?->car?->carCompany?->name .','. $event->transactionDetails()?->first()?->productFitting?->car?->name .'|'. $event->transactionDetails()?->first()?->productFitting?->glass?->name  .'|'.  $event->transactionDetails()?->first()?->product?->part_number .'| Customer: '.$event->customer?->name.'|'.$event->customer?->phone,
                'start' => $event->shift_start,
                'end' => $event->shift_end,
                'allday' => false,
                'borderColor'  => $event->service_type == SaleTransaction::SERVICE_TYPE_MOBILE ? ($setting->mobile ?? '#36d95e') : ($setting->inshop ?? '#1976cc'),
                'backgroundColor'  => $event->service_type == SaleTransaction::SERVICE_TYPE_MOBILE ? ($setting->mobile ?? '#36d95e') : ($setting->inshop ?? '#1976cc'),
                // 'url'=> route('dashboard.workorder.show', $event->id),
            ];
            array_push($events, $newevent);
        }




        return view('dashboard.calender.calendar',compact('events'));
    }
}
