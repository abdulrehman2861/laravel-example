<?php

namespace App\Models;

use App\Models\ProductFitting;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Year extends Model
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
     * startForProductsFitting
     *
     * @return HasMany
     */
    public function startForProductsFitting(): HasMany
    {
        return $this
            ->hasMany(
                ProductFitting::class,
                'year_from_id',
                'id'
            );
    }

    /**
     * endForProductFitting
     *
     * @return HasMany
     */
    public function endForProductFitting(): HasMany
    {
        return $this
            ->hasMany(
                ProductFitting::class,
                'year_to_id',
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
        return $this->startForProductsFitting()->count() > 0
            ||$this->endForProductFitting()->count() > 0;
    }
}
