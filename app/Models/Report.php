<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    public function User()
    {
        return $this->belongsTo('App\Models\User','user_id','id');
    }
}