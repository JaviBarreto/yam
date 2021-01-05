<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Province extends Model
{
    use SoftDeletes;

    public $table = 'provinces';
    protected $dates = ['created_at', 'updated_at','deleted_at'];
    protected $fillable = ['name', 'status','created_at', 'updated_at', 'deleted_at', 'department_id'];

    
    public function districts()
    {
        return $this->hasMany(District::class);
    }
       
    public function departments()
    {
        return $this->belongsTo(Department::class);
    }

}
