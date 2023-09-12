<?php

namespace App\Models;

use App\Models\Category;
use App\Models\Supplier;
use App\Models\Warehouse;
use App\Models\ProductImage;
use App\Models\ProductFitting;
use App\Models\AdjustmentProduct;
use App\Models\SaleTransactionDetail;
use Illuminate\Database\Eloquent\Model;
use App\Models\PurchaseTransactionDetail;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    /** TAX TYPES */
    public const TAX_EXCLUSIVE = 'Exclusive';
    public const TAX_INCLUSIVE = 'Inclusive';


    /** ALL TAX TYPES */
    public const ALL_TAX_TYPES = [
        self::TAX_EXCLUSIVE,
        self::TAX_INCLUSIVE,
    ];

    /** BARCODE SYMBOL TYPES */
    public const BARCODE_SYMBOL_C128 = 'C128';
    public const BARCODE_SYMBOL_C39 = 'C39';
    public const BARCODE_SYMBOL_UPCA = 'UPCA';
    public const BARCODE_SYMBOL_UPCE = 'UPCE';
    public const BARCODE_SYMBOL_EAN13 = 'EAN13';
    public const BARCODE_SYMBOL_EAN8 = 'EAN8';

    /** ALL BARCODE SYMBOL TYPES */
    public const ALL_BARCODE_SYMBOL_TYPES = [
        self::BARCODE_SYMBOL_C128 ,
        self::BARCODE_SYMBOL_C39 ,
        self::BARCODE_SYMBOL_UPCA ,
        self::BARCODE_SYMBOL_UPCE ,
        self::BARCODE_SYMBOL_EAN13,
        self::BARCODE_SYMBOL_EAN8 ,
    ];


    /** ALL BARCODE SYMBOL TYPES NAMES*/
    public const ALL_BARCODE_SYMBOL_TYPES_NAMES = [
        self::BARCODE_SYMBOL_C128 =>'Code 128',
        self::BARCODE_SYMBOL_C39 =>'Code 39',
        self::BARCODE_SYMBOL_UPCA =>'UPC-A',
        self::BARCODE_SYMBOL_UPCE =>'UPC-E',
        self::BARCODE_SYMBOL_EAN13 =>'EAN-13',
        self::BARCODE_SYMBOL_EAN8 =>'EAN-8',
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'part_name',
        'part_number',
        'inter_number',
        'shelf',
        'price',
        'cost',
        'quantity',
        'alert_quantity',
        'warehouse_id',
        'supplier_id',
        'apply_tax',
        'barcode_symbology',
        'tax',
        'tax_type',
        'unit',
        'note'
    ];

    /**
     * casts
     *
     * @var array
     */
    protected $casts = [
        'apply_tax' => 'boolean',
    ];


    /*
    |--------------------------------------------------------------------------
    | RELATIONS
    |--------------------------------------------------------------------------
    */

    /**
     * warehouse
     *
     * @return BelongsTo
     */
    public function warehouse(): BelongsTo
    {
        return $this->belongsTo(
            Warehouse::class,
            'warehouse_id',
            'id',
        );
    }



    /**
     * supplier
     *
     * @return BelongsTo
     */
    public function supplier(): BelongsTo
    {
        return $this->belongsTo(
            Supplier::class,
            'category_id',
            'id',
        );
    }

    /**
     * images
     *
     * @return HasMany
     */
    public function images(): HasMany
    {
        return $this->hasMany(
            ProductImage::class,
            'product_id',
            'id'
        );
    }

    /**
     * productFittings
     *
     * @return HasMany
     */
    public function productFittings(): HasMany
    {
        return $this->hasMany(
            ProductFitting::class,
            'product_id',
            'id'
        );
    }

    /**
     * adjustments
     *
     * @return HasMany
     */
    public function adjustments(): HasMany
    {
        return $this->hasMany(
            AdjustmentProduct::class,
            'product_id',
            'id'
        );
    }

    /**
     * saleTransactionDetails
     *
     * @return HasMany
     */
    public function saleTransactionDetails(): HasMany
    {
        return $this->hasMany(
            SaleTransactionDetail::class,
            'product_id',
            'id'
        );
    }

    /**
     * purchaseTransactionDetails
     *
     * @return HasMany
     */
    public function purchaseTransactionDetails(): HasMany
    {
        return $this->hasMany(
            PurchaseTransactionDetail::class,
            'product_id',
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
        return $this->adjustments()->count() > 0 ||
               $this->saleTransactionDetails()->count() > 0;
    }


}
