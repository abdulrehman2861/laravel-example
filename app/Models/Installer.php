<?php

namespace App\Models;

use App\Models\SaleTransaction;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Installer extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'social_security_number',
        'phone',
        'identity_number',
        'city',
        'country',
        'address',
    ];

    /*
    |--------------------------------------------------------------------------
    | RELATIONS
    |--------------------------------------------------------------------------
    */

    /**
     * saleTransactions
     *
     * @return HasMany
     */
    public function saleTransactions(): HasMany
    {
        return $this->hasMany(
            SaleTransaction::class,
            'installer_id',
            'id',
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
}
