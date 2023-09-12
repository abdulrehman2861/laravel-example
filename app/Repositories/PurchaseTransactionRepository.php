<?php

namespace App\Repositories;


use Illuminate\Support\Facades\DB;
use App\Models\PurchaseTransaction;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use App\Models\PurchaseTransactionDetail;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Repositories\Interfaces\CustomerRepositoryInterface;
use App\Repositories\Interfaces\PurchaseTransactionRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class PurchaseTransactionRepository implements PurchaseTransactionRepositoryInterface
{

    /**
     * alltransactions
     *
     * @return LengthAwarePaginator
     */
    public function alltransactions($search = null, $perpage = 10): LengthAwarePaginator
    {
        return PurchaseTransaction::whereHas('supplier', function ($query) use ($search) {
            $query->where('name', 'LIKE', "%{$search}%");
        })
            ->orWhere(DB::raw("CONCAT('PR-', LPAD(id, 3, '0'))"), 'LIKE', "%{$search}%")
            ->orWhere('status', 'LIKE', "%{$search}%")
            ->orWhere('payment_status', 'LIKE', "%{$search}%")
            ->orWhereHas('shippedWarehouse', function ($query) use ($search) {
                $query->where('name', 'LIKE', "%{$search}%");
            })
            ->latest()
            ->paginate($perpage);
    }


    /**
     * getTransactionsForPartReceiveing
     *
     * @return Collection
     */
    public function getTransactionsForPartReceiving(): Collection
    {
        $query = PurchaseTransaction::query();
        $query->when(request()->has('supplier_id'), function ($q) {
            $q->whereHas('supplier', function ($query) {
                $query->where('id', request()->supplier_id);
            });
        })
            ->when(request()->has('reference'), function ($q) {
                $q->where(DB::raw("CONCAT('PR-', LPAD(id, 3, '0'))"), 'LIKE', "%{request()->reference}%");
            });

        return $query->latest()->get();
    }

    /**
     * store
     *
     * @param  mixed $data
     * @return Model
     */
    public function store($data): Model
    {
        if (request()->has('same_billing_address')) {

            $data['shipping_address'] = $data['billing_address'];
        }
        $purchaseTransaction = PurchaseTransaction::create($data);

        foreach (request()->details as $detail) {
            $purchaseTransaction->transactionDetails()->create($detail);
        }

        return  $purchaseTransaction;
    }



    /**
     * findTransaction
     *
     * @param  mixed $id
     * @return Model
     */
    public function findTransaction($id): Model
    {
        return PurchaseTransaction::findorFail($id);
    }

    /**
     * update
     *
     * @param  mixed $data
     * @param  mixed $id
     * @return model
     */
    public function update($data, $id): model
    {
        if (request()->has('same_billing_address')) {
            $data['shipping_address'] = $data['billing_address'];
        }

        $purchaseTransaction = PurchaseTransaction::findorFail($id);
        $purchaseTransaction->update($data);

        foreach (request()->details as $detail) {
            $transactionDetail = PurchaseTransactionDetail::find($detail['id'] ?? 0);
            if ($transactionDetail == null) {
                $purchaseTransaction->transactionDetails()->create($detail);
            } else {
                $transactionDetail->update($detail);
            }
        }



        return  $purchaseTransaction;
    }

    /**
     * destroy
     *
     * @param  mixed $id
     * @return void
     */
    public function destroy($id)
    {
        $purchaseTransaction = PurchaseTransaction::findorFail($id);
        $purchaseTransaction->delete();
    }

    /**
     * recieveStock
     *
     * @param  mixed $id
     * @return void
     */
    public function recieveStock($id)
    {
        $purchaseTransaction = PurchaseTransaction::findorFail($id);

        foreach ($purchaseTransaction->transactionDetails as $key => $detail) {
            $product = $detail->productFitting?->product;
            if ($product) {
                $product->quantity = (int)$product->quantity + ($detail->quantity - $detail->received_quantity);
                $product->save();
            }

            $detail->received_quantity = (int)$detail->quantity;
            $detail->save();
        }

        $purchaseTransaction->is_complete = true;
        $purchaseTransaction->save();
    }

    public function recieveSpecificStock($id)
    {
        $detail = PurchaseTransactionDetail::findorFail($id);
        $purchaseTransaction = $detail->mainTransaction;

        $product = $detail->productFitting?->product;
        if ($product) {
            $product->quantity = (int)$product->quantity + ($detail->quantity - $detail->received_quantity);
            $product->save();
        }

        $detail->received_quantity = (int)$detail->quantity;
        $detail->save();

        $completed = true;

        $purchaseTransaction->refresh();

        foreach ($purchaseTransaction->transactionDetails as $key => $detail) {

            if ($detail->received_quantity < $detail->quantity)
            {
                $completed = false;
            }
        }

        if ($completed) {
            $purchaseTransaction->is_complete = true;
            $purchaseTransaction->save();
        }
    }
}
