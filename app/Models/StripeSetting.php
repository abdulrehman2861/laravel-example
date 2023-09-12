<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StripeSetting extends Model
{
    use HasFactory;

    protected $fillable = ['api_key', 'api_secret', 'is_live', 'is_active'];
}
