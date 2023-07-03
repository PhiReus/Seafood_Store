<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Customer extends Authenticatable
{use Notifiable;
    use HasApiTokens, HasFactory, Notifiable;
    use HasFactory;
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
