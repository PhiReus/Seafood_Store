<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory;
    // use SoftDeletes;
    protected $dates = [
        'created_at',
        'updated_at'
    ];
    public $timestamps = true;
    public function product(){
        return $this->hasMany(Product::class);
    }
}
