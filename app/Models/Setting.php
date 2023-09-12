<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    protected $fillable = [
        'company_name',
        'company_email',
        'company_phone',
        'site_logo',
        'inshop',
        'mobile',
        'default_currency_position',
        'notification_email',
        'footer_text',
        'company_address',
        'default_currency_id',
        'shipping_rate',
    ];

    public function currency()
    {
        return $this->belongsTo(Currency::class, 'default_currency_id');
    }
}
