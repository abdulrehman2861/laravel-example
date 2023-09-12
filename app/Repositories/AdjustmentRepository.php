<?php

namespace App\Repositories;


use App\Models\Car;
use App\Models\Year;
use App\Models\Product;
use App\Models\Adjustment;
use App\Models\AdjustmentProduct;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Repositories\Interfaces\AdjustmentRepositoryInterface;

class AdjustmentRepository implements AdjustmentRepositoryInterface
{


    /**
     * allAdjustments
     *
     * @return LengthAwarePaginator
     */
    public function allAdjustments($search = null, $perpage = 10): LengthAwarePaginator
    {
        return Adjustment::whereHas('adjustmentProducts.product', function ($query) use ($search) {
            $query->where('part_name', 'LIKE', "%{$search}%");
        })
            ->orWhere('adjustment_date', 'LIKE', "%{$search}%")
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
        $adjustment = Adjustment::create($data);

        if (!empty(request()->adjustmentProducts)) {
            foreach (request()->adjustmentProducts as $adjustmentProduct) {
                $adjustment->adjustmentProducts()->create($adjustmentProduct);
                $product = Product::find($adjustmentProduct['product_id']);

                $product->quantity = $adjustmentProduct['type'] == AdjustmentProduct::TYPE_ADD
                    ? $product->quantity + $adjustmentProduct['quantity']
                    : $product->quantity - $adjustmentProduct['quantity'];
                $product->save();
            }
        }

        return $adjustment;
    }
    public function update($data, $id): Model
    {
        $adjustment = Adjustment::update($data);
        if (!empty(request()->adjustmentProducts)) {
            foreach (request()->adjustmentProducts as $adjustmentProduct) {
                $adjustment = Adjustment::findorFail($id);

                $adjustment->adjustmentProducts()->update($adjustmentProduct);
                $product = Product::find($adjustmentProduct['product_id']);

                $product->quantity = $adjustmentProduct['type'] == AdjustmentProduct::TYPE_ADD
                    ? $product->quantity + $adjustmentProduct['quantity']
                    : $product->quantity - $adjustmentProduct['quantity'];
                $product->save();
            }
        }

        return $adjustment;
    }


    /**
     * findAdjustment
     *
     * @param  mixed $id
     * @return Model
     */
    public function findAdjustment($id): Model
    {
        return Adjustment::findorFail($id);
    }

    public function destroy($id)
    {
        $adjustment = Adjustment::findorFail($id);
        $adjustment->delete();
    }

}