<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ApplicationUserLogin extends Model
{
    public $table = 'application_user_logins';
    protected $dates = ['created_at', 'updated_at'];
    protected $fillable = ['devicetoken', 'platform', 'ipaddress','appversion', 'devicemanufacturer',
    'devicemodel', 'logindatetime', 'logoutdatetime', 'created_at', 'updated_at', 'user_id'];


    public function users()
    {
        return $this->belongsTo(User::class);
    }

}

