<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    protected $fillable = ['title_ar','title_en','body_ar','body_en','seen','type','s_id','r_id','service_id'];
    protected $appends = ['body','title'];

    public function getBodyAttribute()
    {
        return $this['body_'.lang()];
    }
    public function getTitleAttribute()
    {
        return $this['title_'.lang()];
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'r_id', 'id');
    }

    public function service()
    {
        return $this->belongsTo('App\Models\Service', 'service_id', 'id');
    }
}
