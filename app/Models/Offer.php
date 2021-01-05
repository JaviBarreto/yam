<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Offer extends Model
{
    use SoftDeletes;
    
    public $table = 'offers';
    protected $dates = ['created_at', 'updated_at','deleted_at'];
    protected $fillable = ['title', 'status', 'created_at', 'updated_at','deleted_at',
    'startdatetime', 'enddatetime', 'product_id'];


    public function products()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

}
