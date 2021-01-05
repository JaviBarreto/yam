<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OrderProductComplement extends Model
{
    use SoftDeletes;
    
    public $table = 'order_product_complements';
    protected $dates = ['created_at', 'updated_at','deleted_at'];
    protected $fillable = ['price', 'status','created_at', 'updated_at','deleted_at', 'orderproduct_id', 'product_id' ];

}
