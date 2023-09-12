<?php

namespace App\Models;

use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Warehouse extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'location_code',
        'address'
    ];

    /*
    |--------------------------------------------------------------------------
    | RELATIONS
    |--------------------------------------------------------------------------
    */

    /**
     * products
     *
     * @return HasMany
     */
    public function products(): HasMany
    {
        return $this->hasMany(
            Product::class,
            'warehouse_id',
            'id',
        );
    }

    /**
     * purchaseTransactions
     *
     * @return HasMany
     */
    public function purchaseTransactions(): HasMany
    {
        return $this
            ->hasMany(
                PurchaseTransaction::class,
                'ship_to_warehouse_id',
                'id'
            );
    }

    /*
    |--------------------------------------------------------------------------
    | FUNCTION
    |--------------------------------------------------------------------------
    */


    /**
     * isBeingUsed
     *
     * @return bool
     */
    public function isBeingUsed(): bool
    {
        return $this->products()->count() > 0 ||
                $this->purchaseTransactions()->count() > 0;
    }
}
