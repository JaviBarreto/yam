<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Complement extends Model
{
    use SoftDeletes;
    
    public $table = 'complements';
    protected $dates = ['created_at', 'updated_at','deleted_at'];
    protected $fillable = ['name', 'created_at', 'updated_at','deleted_at'];

    public function products()
    {
        return $this->hasMany(Product::class);
    }

}
