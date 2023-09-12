<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Adjustment extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'adjustment_date',
        'note',
    ];

    /*
    |--------------------------------------------------------------------------
    | RELATIONS
    |--------------------------------------------------------------------------
    */


    /**
     * adjustmentProduct
     *
     * @return HasMany
     */
    public function adjustmentProducts(): HasMany
    {
        return $this->hasMany(
            AdjustmentProduct::class,
            'adjustment_id',
            'id',
        );
    }
}
