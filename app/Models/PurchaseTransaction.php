<?php

namespace App\Models;

use App\Models\Supplier;
use App\Models\Warehouse;
use App\Models\PurchaseReturn;
use Illuminate\Database\Eloquent\Model;
use App\Models\PurchaseTransactionDetail;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PurchaseTransaction extends Model
{
    use HasFactory;

    /** TRANSACTION STATUS */
    public const TRANSACTION_STATUS_PENDING = 'Pending';
    public const TRANSACTION_STATUS_COMPLETE = 'Completed';
    public const TRANSACTION_STATUS_ORDERED = 'Ordered';


    /** ALL TRANSACTION STATUS */
    public const ALL_TRANSACTION_STATUS = [
        self::TRANSACTION_STATUS_PENDING,
        self::TRANSACTION_STATUS_COMPLETE,
        self::TRANSACTION_STATUS_ORDERED,
    ];

    /** PAYMENT METHOD TYPE */
    public const PAYMENT_METHOD_TYPE_CASH = 'Cash';
    public const PAYMENT_METHOD_TYPE_CREDIT_CARD = 'Credit Card';
    public const PAYMENT_METHOD_TYPE_BANK_TRANSFER = 'Bank Transfer';
    public const PAYMENT_METHOD_TYPE_CHEQUE = 'Cheque';
    public const PAYMENT_METHOD_TYPE_OTHER = 'Other';


    /** ALL PAYMENT METHOD TYPES */
    public const ALL_PAYMENT_METHOD_TYPES = [
        self::PAYMENT_METHOD_TYPE_CASH,
        self::PAYMENT_METHOD_TYPE_CREDIT_CARD,
        self::PAYMENT_METHOD_TYPE_BANK_TRANSFER,
        self::PAYMENT_METHOD_TYPE_CHEQUE,
        self::PAYMENT_METHOD_TYPE_OTHER,
    ];

    /** PAYMENT STATUS */
    public const PAYMENT_STATUS_PAID = 'Paid';
    public const PAYMENT_STATUS_UNPAID = 'Unpaid';
    public const PAYMENT_STATUS_RETURN = 'Returned';


    /** ALL PAYMENT STATUS */
    public const ALL_PAYMENT_STATUS = [
        self::PAYMENT_STATUS_PAID,
        self::PAYMENT_STATUS_UNPAID,
        self::PAYMENT_STATUS_RETURN,
    ];

    /** TAX STATUS */
    public const TAX_TYPE_DEFAULT = 'Default';
    public const TAX_TYPE_EXEMPT = 'Exempt';


    /** ALL TAX TYPES */
    public const ALL_TAX_TYPES = [
        self::TAX_TYPE_DEFAULT,
        self::TAX_TYPE_EXEMPT,
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'issue_date',
        'expected_receipt_date',
        'status',
        'payment_method',
        'amount_paid',
        'billing_address',
        'shipping_address',
        'discount',
        'shipping',
        'tax_type',
        'order_tax',
        'external_note',
        'internal_note',
        'supplier_id',
        'ship_to_warehouse_id',
        'payment_status',
        'is_complete',
    ];

    // Access sales order no as QT-000{ID}
    public function getPurchaseNoAttribute()
    {
        return 'PR-' . str_pad($this->id, 3, '0', STR_PAD_LEFT);
    }

    /**
     * getTotalAmountAttribute
     *
     * @return void
     */
    public function getTotalAmountAttribute()
    {
        $temp_total = 0;

        foreach ($this->transactionDetails as $key => $detail) {
            $temp_total += (float)$detail->quantity * (float)$detail->cost;
        }

        $tax_value = ($this->order_tax / 100) * $temp_total;
        $discount_value = ($this->discount / 100) * $temp_total;

        return ($temp_total + $tax_value + $this->shipping) - $discount_value;
    }


    /*
    |--------------------------------------------------------------------------
    | RELATIONS
    |--------------------------------------------------------------------------
    */

    /**
     * transactionDetails
     *
     * @return HasMany
     */
    public function transactionDetails(): HasMany
    {
        return $this->hasMany(
            PurchaseTransactionDetail::class,
            'purchase_transaction_id',
            'id',
        );
    }

    /**
     * return
     *
     * @return HasOne
     */
    public function return(): HasOne
    {
        return $this->hasOne(
            PurchaseReturn::class,
            'purchase_transaction_id',
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
            'supplier_id',
            'id',
        );
    }


    /**
     * shippedWarehouse
     *
     * @return BelongsTo
     */
    public function shippedWarehouse(): BelongsTo
    {
        return $this->belongsTo(
            Warehouse::class,
            'ship_to_warehouse_id',
            'id',
        );
    }
}
