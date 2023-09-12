<?php

namespace App\Models;

use App\Models\Glass;
use App\Models\Feature;
use App\Models\Product;
use App\Models\Category;
use App\Models\BodyStyle;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProductFitting extends Model
{
    use HasFactory;

    protected $appends = ['parent_category_id','make_id'];

    /** YEAR TYPES */
    public const YEAR_SINGLE = 'Single';
    public const YEAR_RANGE = 'Range';


    /** ALL YEAR TYPES */
    public const ALL_YEAR_TYPES = [
        self::YEAR_SINGLE,
        self::YEAR_RANGE,
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'category_id',
        'product_id',
        'year_type',
        'year_from_id',
        'year_to_id',
        'car_id',
        'body_style_id',
        'glass_id',
        'feature_id',
        'calibration',
        'calibration_price'
    ];

    /**
     * casts
     *
     * @var array
     */
    protected $casts = [
        'calibration' => 'boolean',
    ];

    /*
    |--------------------------------------------------------------------------
    | RELATIONS
    |--------------------------------------------------------------------------
    */

    /**
     * product
     *
     * @return BelongsTo
     */
    public function product(): BelongsTo
    {
        return $this->belongsTo(
            Product::class,
            'product_id',
            'id',
        );
    }

    /**
     * category
     *
     * @return BelongsTo
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(
            Category::class,
            'category_id',
            'id',
        );
    }

    /**
     * yearFrom
     *
     * @return BelongsTo
     */
    public function yearFrom(): BelongsTo
    {
        return $this->belongsTo(
            Year::class,
            'year_from_id',
            'id',
        );
    }

    /**
     * yearTo
     *
     * @return BelongsTo
     */
    public function yearTo(): BelongsTo
    {
        return $this->belongsTo(
            Year::class,
            'year_to_id',
            'id',
        );
    }

    /**
     * car
     *
     * @return BelongsTo
     */
    public function car(): BelongsTo
    {
        return $this->belongsTo(
            Car::class,
            'car_id',
            'id',
        );
    }

    /**
     * bodyStyle
     *
     * @return BelongsTo
     */
    public function bodyStyle(): BelongsTo
    {
        return $this->belongsTo(
            BodyStyle::class,
            'body_style_id',
            'id',
        );
    }

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
     * feature
     *
     * @return BelongsTo
     */
    public function feature(): BelongsTo
    {
        return $this->belongsTo(
            Feature::class,
            'feature_id',
            'id',
        );
    }

    /*
    |--------------------------------------------------------------------------
    | FUNCTIONS
    |--------------------------------------------------------------------------
    */

    /**
     * getParentCategoryIdAttribute
     *
     * @return void
     */
    public function getParentCategoryIdAttribute()
    {
        return $this->category->parent_id ?? '';
    }

    /**
     * getMakeIdAttribute
     *
     * @return void
     */
    public function getMakeIdAttribute()
    {
        return $this->car->car_company_id ?? '';
    }
}
