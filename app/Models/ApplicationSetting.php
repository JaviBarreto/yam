<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ApplicationSetting extends Model
{
    public $table = 'application_settings';
    protected $dates = ['created_at', 'updated_at'];
    protected $fillable = ['androidversion', 'losversion', 'isforcestopandroid','isforcestopios', 'maintenanceios',
    'maintenanceandroid', 'created_at', 'updated_at'];

}

