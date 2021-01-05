<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use SoftDeletes;
    
    public $table = 'orders';
    protected $dates = ['created_at', 'updated_at','deleted_at','orderdate',];
    protected $fillable = ['starttime', 'endtime','orderstatus','ordertype','paymentmethod',
    'orderdate','created_at', 'updated_at','deleted_at','user_id', 'address_id', 'store_id'];
    protected $casts = ['orderdate' => 'datetime'];


    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function addresses()
    {
        return $this->belongsTo(Address::class, 'address_id');
    }

    public function stores()
    {
        return $this->belongsTo(Store::class, 'store_id');
    }

    public function orderproducts()
    {
        return $this->hasMany(OrderProduct::class);
    }

    public function productos()
    {
     return $this->belongsTo(Product::class, 'order_products', 'order_id', 'product_id');
    }

}


