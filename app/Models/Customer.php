<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use PHPOpenSourceSaver\JWTAuth\Contracts\JWTSubject;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Traits\HasPermissions;





class Customer extends Authenticatable implements JWTSubject
{
    use HasApiTokens, HasFactory, Notifiable;
    use HasFactory;
    protected $fillable =
    ['name',
    'phone',
    'address',
    'image',
    'password',
    'email',
    'created_at',
    'updated_at',
];
protected $table = 'customers';
/**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    // protected $fillable = [
    //     'name',
    //     'email',
    //     'password',
    // ];

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
     *
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }
    protected $dates = [
        'created_at',
        'updated_at'
    ];
    public $timestamps = true;
    public function product()
    {
        return $this->belongsToMany(Product::class, 'orders', 'customer_id', 'product_id')
            ->withPivot('quantity')
            ->withTimestamps();
    }
    public function orders(){
        return $this->hasMany(Order::class,'customer_id','id');
    }
}




