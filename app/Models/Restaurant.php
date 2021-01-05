<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Restaurant extends Model
{
    use SoftDeletes;
    
    public $table = 'restaurants';
    protected $dates = ['created_at', 'updated_at','deleted_at'];
    protected $fillable = ['name','website','logo','contactnumber','email','phonenumber',
    'created_at', 'updated_at','deleted_at'];
    
    public function stores()
    {
        return $this->hasMany(Store::class);
    }

}
