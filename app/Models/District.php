<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class District extends Model
{
    use SoftDeletes;

    public $table = 'districts';
    protected $dates = ['created_at', 'updated_at','deleted_at'];
    protected $fillable = ['name', 'status','created_at', 'updated_at','deleted_at','province_id', 'shippingarea_id'];

    
    public function provinces()
    {
        return $this->belongsTo(Province::class);
    }

    public function shippingarea()
    {
        return $this->belongsTo(ShippingArea::class);
    }

}
