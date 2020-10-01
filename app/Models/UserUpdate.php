<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserUpdate extends Model
{
    protected $fillable = ['type','phone','user_id','code'];
}
