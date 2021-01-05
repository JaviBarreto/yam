<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OrderProduct extends Model
{
    use SoftDeletes;
    
    public $table = 'order_products';
    protected $dates = ['created_at', 'updated_at','deleted_at'];
    protected $fillable = ['quantity', 'price', 'total', 'comment', 'created_at', 'updated_at','deleted_at',
    'product_id', 'order_id'];

    
    public function products()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

    public function orders()
    {
        return $this->belongsTo(Order::class, 'order_id');
    }

}
