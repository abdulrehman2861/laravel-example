<?php

namespace App\Models;

use App\Models\Product;
use App\Models\ProductFitting;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'code',
        'parent_id',
    ];

    /*
    |--------------------------------------------------------------------------
    | RELATIONS
    |--------------------------------------------------------------------------
    */

    /**
     * products
     *
     * @return HasMany
     */
    public function productFitting(): HasMany
    {
        return $this->hasMany(
            ProductFitting::class,
            'category_id',
            'id',
        );
    }


    /**
     * subCategories
     *
     * @return HasMany
     */
    public function subCategories(): HasMany
    {
        return $this
            ->hasMany(
                Category::class,
                'parent_id',
                'id'
            );
    }

    /**
     * subCategories
     *
     * @return HasMany
     */
    public function parentCategory(): BelongsTo
    {
        return $this
            ->belongsTo(
                Category::class,
                'parent_id',
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
        return $this->productFitting()->count() > 0
            ||$this->subCategories()->count() > 0;
    }
}
