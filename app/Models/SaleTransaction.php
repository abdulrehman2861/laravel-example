<?php

namespace App\Models;

use App\Models\Comment;
use App\Models\Customer;
use App\Models\SaleReturn;
use App\Models\SaleTransactionDetail;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SaleTransaction extends Model
{
    use HasFactory;

    /** TRANSACTION TYPES */
    public const TRANSACTION_TYPE_WORK_ORDER = 'wo';
    public const TRANSACTION_TYPE_SALE_ORDER = 'so';
    public const TRANSACTION_TYPE_QUOTATION = 'quot';


    /** ALL TRANSACTION TYPES */
    public const ALL_TRANSACTION_TYPES = [
        self::TRANSACTION_TYPE_WORK_ORDER,
        self::TRANSACTION_TYPE_SALE_ORDER,
        self::TRANSACTION_TYPE_QUOTATION,
    ];

    /** SERVICE TYPES */
    public const SERVICE_TYPE_MOBILE = 'Mobile';
    public const SERVICE_TYPE_INSHOP = 'In Shop';


    /** ALL SERVICE TYPES */
    public const ALL_SERVICE_TYPES = [
        self::SERVICE_TYPE_MOBILE,
        self::SERVICE_TYPE_INSHOP,
    ];

    /** APPOINTMENT TIMES */
    public const APPOINTMENT_TYPE_FIRST = '8AM - 12AM';
    public const APPOINTMENT_TYPE_SECOND = '1PM - 5PM';
    // public const APPOINTMENT_TYPE_THIRD = '1PM - 3PM';
    // public const APPOINTMENT_TYPE_FOURTH = '3PM - 5PM';


    /** ALL APPOINTMENT TIMES */
    public const ALL_APPOINTMENT_TIMES = [
        self::APPOINTMENT_TYPE_FIRST,
        self::APPOINTMENT_TYPE_SECOND,
        // self::APPOINTMENT_TYPE_THIRD,
        // self::APPOINTMENT_TYPE_FOURTH,
    ];

    /** TRANSACTION STATUS */
    public const TRANSACTION_STATUS_PENDING = 'Pending';
    public const TRANSACTION_STATUS_COMPLETE = 'Completed';


    /** ALL TRANSACTION STATUS */
    public const ALL_TRANSACTION_STATUS = [
        self::TRANSACTION_STATUS_PENDING,
        self::TRANSACTION_STATUS_COMPLETE,
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
        'transaction_type',
        'service_type',
        'appointment_time',
        'appointment_date',
        'quotation_no',
        'sale_order_no',
        'status',
        'payment_status',
        'payment_method',
        'payment_log',
        'note',
        'address',
        'discount',
        'shipping',
        'tax_type',
        'order_tax',
        'installer_id',
        'customer_id',
        'glass_issue',
        'glass_issue_cause',
        'glass_issue_image',
        'windsheild_install_type',
    ];

    protected $appends = ['so_no', 'sale_order_no','qt_no'];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'appointment_date',
    ];

    // Access sales order no as QT-000{ID}
    public function getSaleOrderNoAttribute()
    {
        return 'QT-' . str_pad($this->id, 3, '0', STR_PAD_LEFT);
    }

    /**
     * getSoNoAttribute
     *
     * @return void
     */
    public function getSoNoAttribute()
    {
        return 'SL-' . str_pad($this->id, 3, '0', STR_PAD_LEFT);
    }

    /**
     * getQtNoAttribute
     *
     * @return void
     */
    public function getQtNoAttribute()
    {
        return 'QT-' . str_pad($this->id, 4, '0', STR_PAD_LEFT);
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
            $temp_total += (float)$detail->quantity * (float)$detail->rate;
        }

        $tax_value = ($this->order_tax / 100) * $temp_total;
        $discount_value = ($this->discount / 100) * $temp_total;

        return ($temp_total + $tax_value + $this->shipping) - $discount_value;
    }

    public function getSubTotalAmountAttribute()
    {
        $temp_total = 0;

        foreach ($this->transactionDetails as $key => $detail) {
            $temp_total += (float)$detail->quantity * (float)$detail->rate;
        }

        return $temp_total;
    }

    public function getShiftStartAttribute()
    {
        return $this->combineDateTime($this->appointment_date, $this->appointment_time, 'start');
    }


    public function getShiftEndAttribute()
    {
        return $this->combineDateTime($this->appointment_date, $this->appointment_time, 'end');
    }

    // Helper method to combine date and time into a single DateTime string
    private function combineDateTime($date, $time, $type)
    {
        $dateTimeStr = $date;

        if ($time === '1PM - 5PM') {
            $timeStr = '13:00';
        } elseif ($time === '8AM - 12AM') {
            $timeStr = '08:00';
        } else {
            // Handle other time values if needed
            return null;
        }

        if ($type === 'end') {
            // Add 4 hours for the 'end' time
            $dateTimeStr .= 'T' . date('H:i', strtotime($timeStr) + 4 * 3600);
        } else {
            $dateTimeStr .= 'T' . $timeStr;
        }

        return $dateTimeStr;
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
            SaleTransactionDetail::class,
            'sale_transaction_id',
            'id',
        );
    }

    public function comments(): HasMany
    {
        return $this->hasMany(
            Comment::class,
            'sale_transaction_id',
            'id',
        )->latest();
    }

    /**
     * return
     *
     * @return HasOne
     */
    public function return(): HasOne
    {
        return $this->hasOne(
            SaleReturn::class,
            'sale_transaction_id',
            'id',
        );
    }

    /**
     * installer
     *
     * @return BelongsTo
     */
    public function installer(): BelongsTo
    {
        return $this->belongsTo(
            Installer::class,
            'installer_id',
            'id',
        );
    }

    /**
     * customer
     *
     * @return BelongsTo
     */
    public function customer(): BelongsTo
    {
        return $this->belongsTo(
            Customer::class,
            'customer_id',
            'id',
        );
    }
    
}
