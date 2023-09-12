<?php

namespace App\Models;

use App\Models\Feature;
use App\Models\BodyStyle;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Glass extends Model
{
    use HasFactory;

    /** GLASS TYPES */
    public const TYPE_WINDSHIELD = 'Windshield';
    public const TYPE_DOOR = 'Door glass';
    public const TYPE_QUARTER = 'Quarter';
    public const TYPE_VENT = 'Vent glass';
    public const TYPE_OTHER = 'Other';

    /** ALL GLASS TYPES */
    public const ALL_GLASS_TYPES = [
        self::TYPE_WINDSHIELD ,
        self::TYPE_DOOR ,
        self::TYPE_QUARTER ,
        self::TYPE_VENT ,
        self::TYPE_OTHER,
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'type'
    ];

    /*
    |--------------------------------------------------------------------------
    | RELATIONS
    |--------------------------------------------------------------------------
    */


    /**
     * cars
     *
     * @return HasMany
     */
    public function features(): HasMany
    {
        return $this->hasMany(
            Feature::class,
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
                'glass_id',
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
            'body_styles_glasses',
            'glass_id',
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
        return $this->features()->count() > 0
                || $this->productFitting()->count() > 0;
    }

    public function getHasFeatureAttribute(): int
    {
        return $this->features()->count() ? true : false;
    }
}
