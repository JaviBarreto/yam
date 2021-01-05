<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
//use Illuminate\Support\Facades\Hash;
//use Illuminate\Support\Facades\Session;

class ApplicationUser extends Authenticatable
{
  //  protected $remember_token = false;
    protected $table = 'application_user';
    protected $dates = ['created_at', 'updated_at','createddate'];
    protected $fillable = ['firstname', 'lastname', 'profileimage', 'username', 'phonenumber',
                           'dninumber','isactive','role_id'];

    public function roles()
    {
        return $this->belongsToMany(UserRol::class);
    }

}