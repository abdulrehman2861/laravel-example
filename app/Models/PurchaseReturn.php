<?php

namespace App\Models;

use App\Models\PurchaseTransaction;
use Illuminate\Database\Eloquent\Model;
use App\Models\PurchaseTransactionDetail;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PurchaseReturn extends Model
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
        'purchase_transaction_id',
    ];

    public function getRefNoAttribute()
    {
        return 'PRRN-' . str_pad($this->id, 3, '0', STR_PAD_LEFT);
    }

    /*
    |--------------------------------------------------------------------------
    | RELATIONS
    |--------------------------------------------------------------------------
    */


    /**
     * purchase
     *
     * @return BelongsTo
     */
    public function purchase(): BelongsTo
    {
        return $this->belongsTo(
            PurchaseTransaction::class,
            'purchase_transaction_id',
            'id',
        );
    }


    /**
     * transactionDetails
     *
     * @return HasMany
     */
    public function transactionDetails(): HasMany
    {
        return $this->hasMany(
            PurchaseTransactionDetail::class,
            'return_id',
            'id',
        );
    }

}
