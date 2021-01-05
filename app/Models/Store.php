<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Store extends Model
{
    use SoftDeletes;

    public $table = 'stores';
    protected $dates = ['created_at', 'updated_at','deleted_at'];
    protected $fillable = ['name', 'address','streetaddress','latitude','longitude','zipcode','city','state','phonenumber',
    'email','admincontact', 'created_at', 'updated_at','deleted_at', 'restaurant_id'];

    public function restaurant()
    {
        return $this->belongsTo(Restaurant::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function storetimings()
    {
        return $this->hasMany(StoreTiming::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }


}
