<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Department extends Model
{
    use SoftDeletes;

    public $table = 'departments';
    protected $dates = ['created_at', 'updated_at','deleted_at'];
    protected $fillable = ['name', 'status','created_at', 'updated_at','deleted_at'];

    
    public function province()
    {
        return $this->hasMany(Province::class);
    }

}
