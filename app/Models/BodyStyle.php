<?php

namespace App\Models;

use App\Models\Car;
use App\Models\Glass;
use App\Models\ProductFitting;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class BodyStyle extends Model
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



    public function productFitting(): HasMany
    {
        return $this
            ->hasMany(
                ProductFitting::class,
                'body_style_id',
                'id'
            );
    }

    /**
     * cars
     *
     * @return BelongsToMany
     */
    public function cars(): BelongsToMany
    {
        return $this->belongsToMany(
            Car::class,
            'cars_body_styles',
            'body_style_id',
            'car_id');
    }

    /**
     * glasses
     *
     * @return BelongsToMany
     */
    public function glasses(): BelongsToMany
    {
        return $this->belongsToMany(
            Glass::class,
            'body_styles_glasses',
            'body_style_id',
            'glass_id');
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
        return $this->cars()->count() > 0
                || $this->productFitting()->count() > 0;
    }
}
