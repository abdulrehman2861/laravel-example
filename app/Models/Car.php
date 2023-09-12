<?php

namespace App\Models;

use App\Models\BodyStyle;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Car extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        // 'model',
        // 'year',
        'car_company_id'
    ];

    /*
    |--------------------------------------------------------------------------
    | RELATIONS
    |--------------------------------------------------------------------------
    */

    /**
     * carCompany
     *
     * @return BelongsTo
     */
    public function carCompany(): BelongsTo
    {
        return $this->belongsTo(
            CarCompany::class,
            'car_company_id',
            'id',
        );
    }


    /**
     * productsFittings
     *
     * @return HasMany
     */
    public function productFitting(): HasMany
    {
        return $this
            ->hasMany(
                ProductFitting::class,
                'car_id',
                'id'
            );
    }

    /**
     * bodyStyles
     *
     * @return BelongsToMany
     */
    public function bodyStyles(): BelongsToMany
    {
        return $this->belongsToMany(
            BodyStyle::class,
            'cars_body_styles',
            'car_id',
            'body_style_id');
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
