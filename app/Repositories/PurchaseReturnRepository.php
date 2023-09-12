<?php

namespace App\Repositories;

use App\Models\PurchaseReturn;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use App\Models\PurchaseTransactionDetail;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Repositories\Interfaces\PurchaseReturnRepositoryInterface;

class PurchaseReturnRepository implements PurchaseReturnRepositoryInterface
{


    /**
     * allReturns
     *
     * @return LengthAwarePaginator
     */
    public function allReturns($search = null, $perpage = 10): LengthAwarePaginator
    {
        return PurchaseReturn::Where(DB::raw("CONCAT('PRRN-', LPAD(id, 3, '0'))"), 'LIKE', "%{$search}%")
            ->orWhere('return_amount', 'LIKE', "%{$search}%")
            ->latest()
            ->paginate($perpage);
    }

    /**
     * store
     *
     * @param  mixed $data
     * @return Model
     */
    public function store($data): Model
    {
        $purchaseReturn = PurchaseReturn::create($data);
        $purchaseReturn->refresh();

        if (request()->has('details'))
        {
            foreach (request()->details as $key => $detail)
            {
                $purchaseDetail = PurchaseTransactionDetail::find($detail['detail_id']);
                if ($purchaseDetail) {
                    $purchaseDetail->return_id = $purchaseReturn->id;
                    $purchaseDetail->save();
                }
            }
        }

        return  $purchaseReturn;
    }


    /**
     * findReturn
     *
     * @param  mixed $id
     * @return Model
     */
    public function findReturn($id): Model
    {
        return PurchaseReturn::findorFail($id);
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
        $purchaseReturn = PurchaseReturn::findorFail($id);
        $purchaseReturn->update($data);

        return  $purchaseReturn;
    }

    /**
     * destroy
     *
     * @param  mixed $id
     * @return void
     */
    public function destroy($id)
    {
        $purchaseReturn = PurchaseReturn::findorFail($id);
        $purchaseReturn->delete();
    }
}
