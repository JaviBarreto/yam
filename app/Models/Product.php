<?php

namespace App\Models;

use App\Models\ProductComplement;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;

    public $table = 'products';
    protected $dates = ['created_at', 'updated_at', 'deleted_at'];
    protected $fillable = ['name', 'imagename', 'price', 'calories', 'remarks', 'weight',
        'isonlycompliment', 'status', 'created_at', 'updated_at', 'deleted_at', 'category_id', 'store_id'];

    
    public function scopeActive($query)
    {
        return $query->where('status', true);
    }

    public function scopeNotComplement($query)
    {
        return $query->where('isonlycompliment', false);
    }

    public function categories()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function stores()
    {
        return $this->belongsTo(Store::class, 'store_id');
    }

    public function orderproducts()
    {
        return $this->hasMany(OrderProduct::class);
    }

    public function offers()
    {
        return $this->hasMany(Offer::class);
    }

    public function discounts()
    {
        return $this->hasMany(Discount::class);
    }

    public function productcomplements()
    {
        return $this->hasMany(ProductComplement::class);

    }

    public function complementproduct()
    {
        return $this->hasMany(ComplementProduct::class);

    }
}
