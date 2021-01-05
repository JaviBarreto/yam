<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Address extends Model
{
    use SoftDeletes;

    public $table = 'addresses';
    protected $dates = ['created_at', 'updated_at','deleted_at'];
    protected $fillable = ['latitude', 'longitude', 'name', 'fieldstreetaddress', 'floorno','houseno',
    'zipcode', 'city', 'state', 'isdefault', 'buildingtype', 'district', 'user_id'];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
