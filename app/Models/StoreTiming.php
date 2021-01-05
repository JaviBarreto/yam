<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StoreTiming extends Model
{
    use SoftDeletes;
    
    public $table = 'store_timings';
    protected $dates = ['created_at', 'updated_at', 'deleted_at', 'starttime', 'endtime'];
    protected $fillable = ['dayofweek', 'starttime', 'endtime', 'created_at', 'updated_at',
    'deleted_at', 'store_id'];
    protected $casts = ['starttime' => 'time', 'endtime' => 'time',];

      
    public function stores()
    {
        return $this->belongsTo(Store::class);
    }
}
