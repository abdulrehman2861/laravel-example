<?php

namespace App\Http\Livewire\Dashboard\Report;

use App\Models\Expense;
use Livewire\Component;
use App\Models\SaleReturn;
use Livewire\WithPagination;
use App\Models\PurchaseReturn;
use App\Models\SaleTransaction;
use App\Models\PurchaseTransaction;

class ProfitLoss extends Component
{

    use WithPagination;

    /**
     * paginationTheme
     *
     * @var string
     */
    protected $paginationTheme = 'bootstrap';

    /**
     * searchKey
     * perPage
     *
     * @var string
     * @var int
     */
    public $searchKey = '',
            $perPage = 10,
            $from,$to,
            $saleAmount = 0,
            $saleCount = 0,
            $saleReturnAmount = 0,
            $saleReturnCount = 0,
            $profit = 0,
            $purchaseCount=0,
            $purchaseAmount = 0,
            $purchaseReturnAmount = 0,
            $purchaseReturnCount = 0,
            $expense = 0;

    private $productRepository;

    /**
     * boot
     *
     * @param  mixed $productRepository
     * @return void
     */
    public function mount()
    {

        $this->calculateSales();
        $this->calculateSalesReturn();
        $this->calculateProfit();
        $this->calculatePurchases();
        $this->calculatePurchasesReturn();
        $this->calculateExpense();
    }

    /**
     * updatingSearchKey
     *
     * @return void
     */
    public function updatingSearchKey()
    {

        $this->resetPage();

    }
    public function updatingFrom()
    {

        $this->resetPage();
        $this->calculateSales();
        $this->calculateSalesReturn();
        $this->calculateProfit();
        $this->calculatePurchases();
        $this->calculatePurchasesReturn();
        $this->calculateExpense();

    }
    public function updatingTo()
    {

        $this->resetPage();
        $this->calculateSales();
        $this->calculateSalesReturn();
        $this->calculateProfit();
        $this->calculatePurchases();
        $this->calculatePurchasesReturn();
        $this->calculateExpense();

    }

    public function resetAll()
    {

        $this->resetPage();
        $this->reset();

    }

    public function render()
    {
        return view('livewire.dashboard.report.profit-loss');
    }

    public function calculateSales()
    {
        $query = SaleTransaction::query();
        $from = $this->from;
        $to = $this->to;
        $saleTransactions = $query->when(isset($from) && !empty($from), function ($q2) use ($from) {

                        $q2->whereDate('created_at', '>', $from);
                    })
                    ->when(isset($to) && !empty($to), function ($q3) use ($to) {

                        $q3->whereDate('created_at', '<', $to);
                    })->get();
        $this->saleCount = count($saleTransactions);
        $this->saleAmount = 0;
        foreach ($saleTransactions as $key => $saleTransaction)
        {
            $this->saleAmount += $saleTransaction->total_amount;
        }
    }

    public function calculateSalesReturn()
    {
        $query = SaleReturn::query();
        $from = $this->from;
        $to = $this->to;
        $saleTransactions = $query->when(isset($from) && !empty($from), function ($q2) use ($from) {

                        $q2->whereDate('created_at', '>', $from);
                    })
                    ->when(isset($to) && !empty($to), function ($q3) use ($to) {

                        $q3->whereDate('created_at', '<', $to);
                    })->get();
        $this->saleReturnCount = count($saleTransactions);
        $this->saleReturnAmount = 0;
        foreach ($saleTransactions as $key => $saleTransaction)
        {
            $this->saleReturnAmount += $saleTransaction->return_amount;
        }
    }

    public function calculateProfit()
    {
        $query = SaleTransaction::query();
        $from = $this->from;
        $to = $this->to;
        $saleTransactions = $query->when(isset($from) && !empty($from), function ($q2) use ($from) {

                        $q2->whereDate('created_at', '>', $from);
                    })
                    ->when(isset($to) && !empty($to), function ($q3) use ($to) {

                        $q3->whereDate('created_at', '<', $to);
                    })->where('status', 'Completed')->get();


        $revenue = $saleTransactions->sum(function ($record) {
            return $record->total_amount;
        });

        $query = Expense::query();
        $expense = $query->when(isset($from) && !empty($from), function ($q2) use ($from) {

                        $q2->whereDate('created_at', '>', $from);
                    })
                    ->when(isset($to) && !empty($to), function ($q3) use ($to) {

                        $q3->whereDate('created_at', '<', $to);
                    })->sum('amount');



        $this->profit = (float)$revenue - (float)$expense;
    }

    public function calculatePurchases()
    {
        $query = PurchaseTransaction::query();
        $from = $this->from;
        $to = $this->to;
        $saleTransactions = $query->when(isset($from) && !empty($from), function ($q2) use ($from) {

                        $q2->whereDate('created_at', '>', $from);
                    })
                    ->when(isset($to) && !empty($to), function ($q3) use ($to) {

                        $q3->whereDate('created_at', '<', $to);
                    })->get();
        $this->purchaseCount = count($saleTransactions);
        $this->purchaseAmount = 0;
        foreach ($saleTransactions as $key => $saleTransaction)
        {
            $this->purchaseAmount += $saleTransaction->total_amount;
        }
    }

    public function calculatePurchasesReturn()
    {
        $query = PurchaseReturn::query();
        $from = $this->from;
        $to = $this->to;
        $saleTransactions = $query->when(isset($from) && !empty($from), function ($q2) use ($from) {

                        $q2->whereDate('created_at', '>', $from);
                    })
                    ->when(isset($to) && !empty($to), function ($q3) use ($to) {

                        $q3->whereDate('created_at', '<', $to);
                    })->get();
        $this->purchaseReturnCount = count($saleTransactions);
        $this->purchaseReturnAmount = 0;
        foreach ($saleTransactions as $key => $saleTransaction)
        {
            $this->purchaseReturnAmount += $saleTransaction->return_amount;
        }
    }

    public function calculateExpense()
    {
        $query = SaleTransaction::query();
        $from = $this->from;
        $to = $this->to;

        $query = Expense::query();
        $expense = $query->when(isset($from) && !empty($from), function ($q2) use ($from) {

                        $q2->whereDate('created_at', '>', $from);
                    })
                    ->when(isset($to) && !empty($to), function ($q3) use ($to) {

                        $q3->whereDate('created_at', '<', $to);
                    })->sum('amount');



        $this->expense = (float)$expense;
    }
}
