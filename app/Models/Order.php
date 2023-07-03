<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $dates = [
        'created_at',
        'updated_at'
    ];
    public $timestamps = true;

    public function products(){
        return $this->belongsToMany(Product::class,'orderdetail','order_id','product_id');
    }
    public function customer(){
        return $this->belongsTo(Customer::class,'customer_id','id');
    }
}
