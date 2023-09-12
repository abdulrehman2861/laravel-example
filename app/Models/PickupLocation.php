<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PickupLocation extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'address',
        'city',
        'country',
        'state',
        'zip_code',
        'phone_number',
        'email',
    ];

}
