<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ShippingArea extends Model
{
    use SoftDeletes;

    public $table = 'shipping_areas';
    protected $dates = ['created_at', 'updated_at','deleted_at'];
    protected $fillable = [ 'name', 'price', 'created_at', 'updated_at','deleted_at'];

    public function district()
    {
        return $this->belongsToMany(District::class);
    }

}
