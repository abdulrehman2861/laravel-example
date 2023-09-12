<?php

namespace App\Models;

use App\Models\Customer;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CustomerType extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
    ];


    /*
    |--------------------------------------------------------------------------
    | RELATIONS
    |--------------------------------------------------------------------------
    */

    /**
     * customers
     *
     * @return HasMany
     */
    public function customers(): HasMany
    {
        return $this
            ->hasMany(
                Customer::class,
                'customer_Type_id',
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
        return $this->customers()->count() > 0;
    }
}
