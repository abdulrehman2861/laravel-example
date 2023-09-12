<?php

namespace App\Models;

use App\Models\SaleTransaction;

use App\Models\SaleTransactionDetail;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SaleReturn extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'date',
        'return_amount',
        'note',
        'sale_transaction_id',
    ];

    public function getRefNoAttribute()
    {
        return 'SLRN-' . str_pad($this->id, 3, '0', STR_PAD_LEFT);
    }

    /*
    |--------------------------------------------------------------------------
    | RELATIONS
    |--------------------------------------------------------------------------
    */


    /**
     * sale
     *
     * @return BelongsTo
     */
    public function sale(): BelongsTo
    {
        return $this->belongsTo(
            SaleTransaction::class,
            'sale_transaction_id',
            'id',
        );
    }

    public function transactionDetails(): HasMany
    {
        return $this->hasMany(
            SaleTransactionDetail::class,
            'return_id',
            'id',
        );
    }
}
