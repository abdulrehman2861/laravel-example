<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quotation extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'year',
        'make',
        'model',
        'body_style',
        'zip_code',
        'status',
        'deductible',
    ];
}
