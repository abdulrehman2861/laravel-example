<?php

namespace App\Repositories;

use App\Models\SaleReturn;
use Illuminate\Support\Facades\DB;
// use Illuminate\Support\Facades\Storage;
use App\Models\SaleTransactionDetail;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Repositories\Interfaces\SaleReturnRepositoryInterface;

class SaleReturnRepository implements SaleReturnRepositoryInterface
{


    /**
     * allReturns
     *
     * @return LengthAwarePaginator
     */
    public function allReturns($search = null, $perpage = 10): LengthAwarePaginator
    {
        return SaleReturn::Where(DB::raw("CONCAT('SLRN-', LPAD(id, 3, '0'))"), 'LIKE', "%{$search}%")
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
        $saleReturn = SaleReturn::create($data);
        $saleReturn->refresh();

        if (request()->has('details'))
        {
            foreach (request()->details as $key => $detail)
            {
                $saleDetail = SaleTransactionDetail::find($detail['detail_id']);
                if ($saleDetail) {
                    $saleDetail->return_id = $saleReturn->id;
                    $saleDetail->save();
                }
            }
        }

        return  $saleReturn;
    }


    /**
     * findReturn
     *
     * @param  mixed $id
     * @return Model
     */
    public function findReturn($id): Model
    {
        return SaleReturn::findorFail($id);
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
        $saleReturn = SaleReturn::findorFail($id);
        $saleReturn->update($data);

        return  $saleReturn;
    }

    /**
     * destroy
     *
     * @param  mixed $id
     * @return void
     */
    public function destroy($id)
    {
        $saleReturn = SaleReturn::findorFail($id);
        $saleReturn->delete();
    }
}
