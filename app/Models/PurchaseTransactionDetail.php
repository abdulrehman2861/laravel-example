<?php

namespace App\Models;

use App\Models\Product;
use App\Models\ProductFitting;
use App\Models\PurchaseTransaction;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PurchaseTransactionDetail extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'cost',
        'quantity',
        'discount',
        'tax',
        'product_id',
        'product_fitting_id',
        'purchase_transaction_id',
        'return_id',
        'received_quantity'
    ];

    /*
    |--------------------------------------------------------------------------
    | RELATIONS
    |--------------------------------------------------------------------------
    */

    /**
     * mainTransaction
     *
     * @return BelongsTo
     */
    public function mainTransaction(): BelongsTo
    {
        return $this->belongsTo(
            PurchaseTransaction::class,
            'purchase_transaction_id',
            'id',
        );
    }


    /**
     * product
     *
     * @return BelongsTo
     */
    public function product(): BelongsTo
    {
        return $this->belongsTo(
            Product::class,
            'product_id',
            'id',
        );
    }

    /**
     * product
     *
     * @return BelongsTo
     */
    public function productFitting(): BelongsTo
    {
        return $this->belongsTo(
            ProductFitting::class,
            'product_fitting_id',
            'id',
        );
    }

    /**
     * returnTransaction
     *
     * @return BelongsTo
     */
    public function returnTransaction(): BelongsTo
    {
        return $this->belongsTo(
            PurchaseReturn::class,
            'return_id',
            'id',
        );
    }
}
