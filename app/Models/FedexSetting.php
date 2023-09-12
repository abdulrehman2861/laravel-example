<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FedexSetting extends Model
{
    use HasFactory;

    public const PRODUCTION_URL = 'https://ws.fedex.com:443/web-services';
    public const DEVELOPMENT_URL = 'https://apis-sandbox.fedex.com/';

    protected $fillable = ['account_number', 'meter_number', 'key', 'password', 'ship_from_addressLine', 'ship_from_city', 'ship_from_state', 'ship_from_postalCode', 'ship_from_countryCode', 'is_live', 'is_active'];
}
