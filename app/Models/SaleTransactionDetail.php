<?php

namespace App\Models;

use App\Models\Product;
use App\Models\SaleReturn;
use App\Models\ProductFitting;
use App\Models\SaleTransaction;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SaleTransactionDetail extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'rate',
        'quantity',
        'discount',
        'tax',
        'product_id',
        'product_fitting_id',
        'feature_id',
        'glass_id',
        'style_id',
        'sale_transaction_id',
        'pickup_location_id',
        'shipping_provider',
        'tracking_number',
        'shipping_cost',
        'shipping_status',
        'shipping_type',
        'shipping_log',
        'return_id',
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
            SaleTransaction::class,
            'sale_transaction_id',
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
     * productFitting
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
            SaleReturn::class,
            'return_id',
            'id',
        );
    }

    public function pickupLocation()
    {
        return $this->belongsTo(PickupLocation::class, 'pickup_location_id', 'id');
    }
}
