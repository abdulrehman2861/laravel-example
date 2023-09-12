<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    use HasRoles;

    /** USER TYPES */
    public const TYPE_ADMIN = 'ADMIN';
    public const TYPE_CUSTOMER = 'CUSTOMER';


    /** ALL USER TYPES */
    public const ALL_USER_TYPES = [
        self::TYPE_ADMIN,
        self::TYPE_CUSTOMER,
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'type',
        'status',
        'image'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /*
    |--------------------------------------------------------------------------
    | FUNCTION
    |--------------------------------------------------------------------------
    */


    public function getShortNameAttribute()
    {
         return "https://via.placeholder.com/128/d2d6de/343a40?text=".strtoupper(substr($this->name, 0,1));
    }

    // relation with customer
    public function customer()
    {
        return $this->hasOne(Customer::class);
    }
}
