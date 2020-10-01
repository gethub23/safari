<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{

    protected $fillable = [
        'name', 'email', 'password','phone','code', 'lat', 'lang','long', 'avatar', 'role', 'checked','address','device_id','isNotify','type','city_id','active'
    ];

    protected $table = 'users';
    
    public function Role()
    {
        return $this->hasOne('App\Models\Role','id','role');
    }

    public function avatar()
    {
        return appPath() . '/images/users/' . $this->avatar;
    }

    
}
