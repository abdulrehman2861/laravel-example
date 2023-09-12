<?php

namespace App\Models;

use App\Models\Product;
use App\Models\PurchaseTransaction;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Supplier extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'contact_person',
        'email',
        'address',
        'phone',
        'phone_alternative',
        'city',
        'country',
        'website',
        'fax',
        'note',
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
            'supplier_id',
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
                'supplier_id',
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
