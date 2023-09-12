<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UpsSetting extends Model
{
    use HasFactory;

    public const PRODUCTION_URL = 'https://onlinetools.ups.com/';
    public const DEVELOPMENT_URL = 'https://wwwcie.ups.com/';

    protected $fillable = ['account_number', 'user_id', 'password', 'client_id', 'client_secret', 'ship_from_addressLine', 'ship_from_city', 'ship_from_state', 'ship_from_postalCode', 'ship_from_countryCode', 'is_live', 'is_active'];
}
