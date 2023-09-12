<?php

namespace App\Models;

use App\Models\Product;
use App\Models\Adjustment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AdjustmentProduct extends Model
{
    use HasFactory;

    /** TYPES */
    public const TYPE_ADD = 'Addition';
    public const TYPE_SUBTRACT = 'Subtraction';


    /** ALL TYPES */
    public const ALL_TYPES = [
        self::TYPE_ADD,
        self::TYPE_SUBTRACT,
    ];


    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'quantity',
        'type',
        'product_id',
        'product_fitting_id',
        'adjustment_id'
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
     * adjustment
     *
     * @return BelongsTo
     */
    public function adjustment(): BelongsTo
    {
        return $this->belongsTo(
            Adjustment::class,
            'adjustment_id',
            'id',
        );
    }

}
