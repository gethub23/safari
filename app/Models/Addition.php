<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Addition extends Model
{
    protected $fillable = ['addition_ar','addition_en','image','service_id','price'];

    protected $appends = ['addition'];

    public function getAdditionAttribute()
    {
        return $this['addition_'.lang()];
    }

    public function service()
    {
        return $this->belongsTo('App\Models\Service', 'service_id', 'id');
    }
    
}
