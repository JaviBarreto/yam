<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Notification extends Model
{
    use SoftDeletes;

    public $table = 'notifications';
    protected $dates = ['created_at', 'updated_at','deleted_at'];
    protected $fillable = ['notificationtype', 'text', 'createdtime','created_at', 'updated_at','deleted_at'];


    public function Users()
    {
        return $this->belongsTo(User::class);
    }

}

