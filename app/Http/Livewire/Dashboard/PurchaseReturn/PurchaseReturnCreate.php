<?php

namespace App\Http\Livewire\Dashboard\PurchaseReturn;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\ProductFitting;
use App\Models\PurchaseReturn;
use Illuminate\Support\Facades\DB;
use App\Models\PurchaseTransaction;
use App\Repositories\Interfaces\SupplierRepositoryInterface;

class PurchaseReturnCreate extends Component
{

    use WithPagination;

    public $generalKey = '',
        $searchPhone = '',
        $searchDate = '',
        $searchSupplier = '',
        $suppliers = [],
        $transactions,
        $products = [],
        $selectedTransactionId = 0,
        $tax = 0,
        $tax_value = 0,
        $discount = 0,
        $discount_value = 0,
        $shipping = 0,
        $grandtotal = 0,
        $return_amount=0;

    protected $transactionList ;

    private $supplierRepository;

    /**
     * boot
     *
     * @param  mixed $supplierRepository
     * @return void
     */
    public function boot(SupplierRepositoryInterface $supplierRepository,)
    {
        $this->supplierRepository = $supplierRepository;
        $this->suppliers = $this->supplierRepository->allSuppliersNonPaginated();
    }

    public function updatedGeneralKey($field)
    {
        $this->resetPage();
        $this->reset(['searchPhone', 'searchDate', 'searchSupplier']);
        $this->getProducts();
    }

    public function updatedSearchPhone($field)
    {
        $this->resetPage();
        $this->reset(['generalKey', 'searchDate', 'searchSupplier']);
        $this->getProducts();
    }

    public function updatedSearchDate($field)
    {
        $this->resetPage();
        $this->reset(['searchPhone', 'generalKey', 'searchSupplier']);
        $this->getProducts();
    }

    public function updatedSearchSupplier($field)
    {
        $this->resetPage();
        $this->reset(['searchPhone', 'searchDate', 'generalKey']);
        $this->getProducts();
    }

    public function render()
    {
        return view('livewire.dashboard.purchase-return.purchase-return-create');
    }

    public function selectTransaction($id)
    {
        $this->reset(['transactions']);

        $tmpTransaction = PurchaseTransaction::find($id);
        if ($tmpTransaction) {

            foreach ($tmpTransaction->transactionDetails as $key => $detail) {
                $productFitting = ProductFitting::find($detail->product_fitting_id);
                $product = Product::find($detail->product_id);
                $newProduct = [
                    'product_id' => $detail->id,
                    'product_fitting_id' => $productFitting->id,
                    'product' => $productFitting->yearFrom?->name . ',' . $productFitting->car?->CarCompany?->name . ',' . $productFitting->car?->name . ',' . $productFitting->glass?->name,
                    'part_number' => $productFitting->product->part_number,
                    'cost' => (int)$productFitting->product->cost,
                    'original_cost' => $productFitting->product->cost,
                    'stock' => $productFitting->product->quantity,
                    'quantity' => $detail->quantity,
                ];

                $this->products[] = $newProduct;
            }

            $this->tax = (float) $tmpTransaction->order_tax ;
            $this->selectedTransactionId = $tmpTransaction->id;
            $this->discount = (float) $tmpTransaction->discount ;
            $this->shipping = (float) $tmpTransaction->shipping ;
        }

        $this->calculateValues();
    }

    public function getProducts()
    {
        $query = PurchaseTransaction::query();

        $query->when(isset($this->generalKey) && !empty($this->generalKey), function ($q) {

            $q->where(function ($q) {

                    $q->whereHas('supplier', function ($q2) {
                        $q2->where('name', 'LIKE', "%{$this->generalKey}%")->orWhere('email', 'LIKE', "%{$this->generalKey}%");
                    })
                    ->orWhere(DB::raw("CONCAT('RT-', LPAD(id, 3, '0'))"), 'LIKE', "%{$this->generalKey}%");
            });
        });

        $query->when(isset($this->searchPhone) && !empty($this->searchPhone), function ($q) {

            $q->where(function ($q) {

                    $q->whereHas('supplier', function ($q2) {
                        $q2->where('phone', 'LIKE', "%{$this->searchPhone}%")->orWhere('phone_alternative', 'LIKE', "%{$this->searchPhone}%");
                    });
            });
        });

        $query->when(isset($this->searchDate) && !empty($this->searchDate), function ($q) {

            $q->whereDate('issue_date', $this->searchDate);
        });

        $query->when(isset($this->searchSupplier) && !empty($this->searchSupplier), function ($q) {

            $q->where('supplier_id', $this->searchSupplier);
        });

        $this->transactionList = $query->paginate(10, ['*'], 'page', $this->transactionList?->currentPage() ?? 0 + 1);

        $this->transactions = PurchaseTransaction::whereIn('id', $this->transactionList->pluck('id')->toArray())->get();
    }

    public function removeProduct($index)
    {
        unset($this->products[$index]);
        $this->products = array_values($this->products);
        $this->calculateValues();
    }

    public function calculateValues()
    {
        $temp_total = 0;

        foreach ($this->products as $key => $tempProduct) {
            $temp_total += (float)$tempProduct['cost'] * (float)$tempProduct['quantity'];
        }

        $this->tax_value = ($this->tax / 100) * $temp_total;
        $this->discount_value = ($this->discount / 100) * $temp_total;

        $this->grandtotal = ($temp_total + $this->tax_value + $this->shipping) - $this->discount_value;
        $this->return_amount = $this->grandtotal;
    }
}
