<?php

namespace App\Models;

use App\Models\Car;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CarCompany extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',

    ];

    /*
    |--------------------------------------------------------------------------
    | RELATIONS
    |--------------------------------------------------------------------------
    */


    /**
     * cars
     *
     * @return HasMany
     */
    public function cars(): HasMany
    {
        return $this->hasMany(
            Car::class,
            'car_company_id',
            'id',
        );
    }


    /*
    |--------------------------------------------------------------------------
    | FUNCTION
    |--------------------------------------------------------------------------
    */


    /**
     * isBeingUsed
     *
     * @return bool
     */
    public function isBeingUsed(): bool
    {
        return $this->cars()->count() > 0;
    }
}
