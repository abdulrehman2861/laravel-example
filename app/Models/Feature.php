<?php

namespace App\Models;

use App\Models\Glass;
use App\Models\ProductFitting;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Feature extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'glass_id',
    ];

    /*
    |--------------------------------------------------------------------------
    | RELATIONS
    |--------------------------------------------------------------------------
    */


    /**
     * glass
     *
     * @return BelongsTo
     */
    public function glass(): BelongsTo
    {
        return $this->belongsTo(
            Glass::class,
            'glass_id',
            'id',
        );
    }

    /**
     * productFitting
     *
     * @return HasMany
     */
    public function productFitting(): HasMany
    {
        return $this
            ->hasMany(
                ProductFitting::class,
                'feature_id',
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
        return $this->productFitting()->count() > 0;
    }
}
