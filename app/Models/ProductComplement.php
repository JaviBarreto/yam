<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductComplement extends Model
{
    use SoftDeletes;

    public $table = 'product_complements';
    protected $dates = ['created_at', 'updated_at','deleted_at'];
    protected $fillable = ['ismendatory', 'multiselect', 'created_at', 'updated_at', 'deleted_at', 
    'product_id', 'complement_id'];

    
    public function complements()
    {
        return $this->belongsTo(Complement::class, 'complement_id');
    }

    public function products()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

    

}

