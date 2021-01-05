<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Faq extends Model
{
    use SoftDeletes;
    
    public $table = 'faqs';
    protected $dates = ['created_at', 'updated_at','deleted_at'];
    protected $fillable = ['question', 'answer','created_at', 'updated_at','deleted_at','topic_id'];
    protected $hidden = [ 'created_at', 'updated_at','deleted_at'];

    public function topics()
    {
        return $this->belongsTo(Faq::class, 'topic_id');
    }

}
