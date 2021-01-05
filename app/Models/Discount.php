<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Discount extends Model
{
    use SoftDeletes;
    
    public $table = 'categories';
    protected $dates = ['created_at', 'updated_at','deleted_at'];
    protected $fillable = ['value', 'discounttype', 'created_at', 'updated_at', 'deleted_at', 'product_id'];

    public function products()
    {
        return $this->belongsTo(Product::class);
    }

}
