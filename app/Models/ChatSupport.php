<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ChatSupport extends Model
{
    protected $fillable = ['room','message','admin_seen','user_seen','s_id','r_id'];

    public function sender(){
        return $this->belongsTo(User::class,'s_id');
    }

    public function receiver(){
        return $this->belongsTo(User::class,'r_id');
    }
}
