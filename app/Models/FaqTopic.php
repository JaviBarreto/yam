<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FaqTopic extends Model
{
    use SoftDeletes;
    
    public $table = 'faq_topics';
    protected $dates = ['created_at', 'updated_at','deleted_at'];
    protected $fillable = ['name', 'created_at', 'updated_at','deleted_at'];
    protected $hidden = [ 'created_at', 'updated_at','deleted_at'];

    public function faqs()
    {
        return $this->hasMany(Faq::class, 'topic_id', 'id');
    }

}
