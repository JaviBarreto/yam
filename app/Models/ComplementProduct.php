<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ComplementProduct extends Model
{
     use SoftDeletes;

    public $table = 'complemented_products';
    protected $dates = ['created_at', 'updated_at','deleted_at'];
    protected $fillable = ['created_at', 'updated_at','deleted_at', 'complement_id', 'product_id'];

  public function complements()
    {
        return $this->belongsTo(Complement::class, 'complement_id');
    }

    public function products()
    {
        return $this->hasManyThrough(ProductComplement::class, Product::class, 'id', 'complement_id','complement_id');
    }
}

