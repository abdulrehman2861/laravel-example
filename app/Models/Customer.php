<?php

namespace App\Models;

use App\Models\CustomerType;
use App\Models\SaleTransaction;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Customer extends Model
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
        'customer_Type_id',
        'phone',
        'phone_alternative',
        'fax',
        'discount_Type',
        'discount',
        'state',
        'city',
        'country',
        'billing_address',
        'service_address',
        'vin',
        'note',
        'user_id'
    ];


    /*
    |--------------------------------------------------------------------------
    | RELATIONS
    |--------------------------------------------------------------------------
    */

    /**
     * customerType
     *
     * @return BelongsTo
     */
    public function customerType(): BelongsTo
    {
        return $this->belongsTo(
            CustomerType::class,
            'customer_Type_id',
            'id',
        );
    }


    /**
     * saleTransactions
     *
     * @return HasMany
     */
    public function saleTransactions(): HasMany
    {
        return $this
            ->hasMany(
                SaleTransaction::class,
                'customer_id',
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
        return $this->saleTransactions()->count() > 0;
    }

    // relation with user
    public function user(): BelongsTo
    {
        return $this->belongsTo(
            User::class,
            'user_id',
            'id'
        );
    }

}
