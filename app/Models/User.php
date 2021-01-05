<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Laravel\Passport\HasApiTokens;


class User extends Authenticatable
{
    use HasApiTokens, SoftDeletes, Notifiable;

    protected $table = 'users';
    protected $fillable = [ 'firstname', 'lastname', 'email', 'password', 'remember_token','username', 'phone_number', 'dninumber', 'role_id'];
    protected $hidden = ['password', 'remember_token'];
    protected $casts = [ 'email_verified_at' => 'datetime'];

     
    public function roles()
    {
        return $this->belongsTo(Role::class);
    }

    public function notifications()
    {
        return $this->hasMany(Notification::class);
    }

    public function address()
    {
        return $this->hasMany(Address::class);
    }

    public function isAdmin()
    {
        if( Auth::user()->role_id == 1 )
        {
            return true;            
        }     
        return false;
    }
}
