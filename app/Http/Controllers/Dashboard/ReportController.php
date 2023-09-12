<?php

namespace App\Http\Controllers\Dashboard;

use Carbon\Carbon;
use App\Models\Expense;
use App\Models\SaleReturn;
use Illuminate\Http\Request;
use App\Models\PurchaseReturn;
use App\Models\SaleTransaction;
use App\Models\PurchaseTransaction;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;

class ReportController extends Controller
{
    public function systemStatReport(): View
    {
        $revenue = SaleTransaction::where('status', 'Completed')->get();
        $revenue = $revenue->sum(function ($record) {
            return $record->total_amount;
        });
        $saleReturn = SaleReturn::sum('return_amount');
        $purchaseReturn = PurchaseReturn::sum('return_amount');
        $profit = (float)$revenue - (float)Expense::sum('amount');

        //bar chart data
        $endDate = Carbon::today();


        $startDate = $endDate->copy()->subDays(6);


        $sales = SaleTransaction::whereBetween('created_at', [$startDate, $endDate])->get();


        $purchases = PurchaseTransaction::whereBetween('created_at', [$startDate, $endDate])->get();


        $chartData = [
            'labels' => [],
            'datasets' => [
                [
                    'label' => 'Sales',
                    'backgroundColor' => 'rgba(60,141,188,0.9)',
                    'borderColor' => 'rgba(60,141,188,0.8)',
                    'pointRadius' => false,
                    'pointColor' => '#3b8bba',
                    'pointStrokeColor' => 'rgba(60,141,188,1)',
                    'pointHighlightFill' => '#fff',
                    'pointHighlightStroke' => 'rgba(60,141,188,1)',
                    'data' => [],
                ],
                [
                    'label' => 'Purchase',
                    'backgroundColor' => 'rgba(210, 214, 222, 1)',
                    'borderColor' => 'rgba(210, 214, 222, 1)',
                    'pointRadius' => false,
                    'pointColor' => 'rgba(210, 214, 222, 1)',
                    'pointStrokeColor' => '#c1c7d1',
                    'pointHighlightFill' => '#fff',
                    'pointHighlightStroke' => 'rgba(220,220,220,1)',
                    'data' => [],
                ],
            ],
        ];


        $currentDate = $startDate;
        while ($currentDate <= $endDate) {
            $formattedDate = $currentDate->format('d-m-y');
            $chartData['labels'][] = $formattedDate;


            $totalSalesAmount = 0;
            foreach ($sales as $sale) {
                if ($sale->created_at->toDateString() === $currentDate->toDateString()) {
                    $totalSalesAmount += $sale->getTotalAmountAttribute();
                }
            }
            $chartData['datasets'][0]['data'][] = $totalSalesAmount;


            $totalPurchasesAmount = 0;
            foreach ($purchases as $purchase) {
                if ($purchase->created_at->toDateString() === $currentDate->toDateString()) {
                    $totalPurchasesAmount += $purchase->getTotalAmountAttribute();
                }
            }
            $chartData['datasets'][1]['data'][] = $totalPurchasesAmount;

            $currentDate->addDay();
        }

        $BarchartDataJson = json_encode($chartData);

        //donut chart

        $currentMonth = Carbon::now()->month;

        $sales = SaleTransaction::whereMonth('created_at', $currentMonth)->get();

        $purchases = PurchaseTransaction::whereMonth('created_at', $currentMonth)->get();

        $expenses = Expense::whereMonth('created_at', $currentMonth)->get();

        $salesTotal = 0;
        $purchasesTotal = 0;

        foreach ($sales as $sale) {
            $salesTotal += $sale->total_amount;
        }

        foreach ($purchases as $purchase) {
            $purchasesTotal += $purchase->total_amount;
        }

        $expensesTotal = $expenses->sum('amount');


        //Line Chart
        $Linelabels = [];
        $salesData = [];
        $purchasesData = [];

        $currentMonth = now()->startOfMonth()->subMonth(11);
        for ($i = 0; $i < 12; $i++) {
            $Linelabels[] = $currentMonth->format('m-Y');

            $salesTotalAmount = SaleTransaction::whereBetween('created_at', [$currentMonth, $currentMonth->endOfMonth()])
                ->get()
                ->map(function ($sale) {
                    return (float) $sale->total_amount;
                })
                ->sum();

            $purchasesTotalAmount = PurchaseTransaction::whereBetween('created_at', [$currentMonth, $currentMonth->endOfMonth()])
                ->get()
                ->map(function ($purchase) {
                    return (float) $purchase->total_amount;
                })
                ->sum();

            $salesData[] = $salesTotalAmount;
            $purchasesData[] = $purchasesTotalAmount;

            $currentMonth = $currentMonth->startOfMonth()->addMonth();
        }

        // Reverse the arrays to match the order in the chart
        $Linelabels = array_reverse($Linelabels);
        $salesData = array_reverse($salesData);
        $purchasesData = array_reverse($purchasesData);


        return view('dashboard.reports.system-statistics', compact(
            'revenue',
            'saleReturn',
            'purchaseReturn',
            'profit',
            'BarchartDataJson',
            'salesTotal',
            'purchasesTotal',
            'expensesTotal',
            'Linelabels',
            'salesData',
            'purchasesData',
        ));
    }

    public function itemSoldReport(): View
    {
        return view('dashboard.reports.item-sold');
    }

    public function itemMultiReport(): View
    {
        return view('dashboard.reports.items-multi-report');
    }

    public function profitLossReport(): View
    {
        return view('dashboard.reports.profit-loss-report');
    }
}
