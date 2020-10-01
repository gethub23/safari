<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Tymon\JWTAuth\Contracts\JWTSubject;


/**
 * @method where(string $string, int $int)
 * @method static create(array $array)
 */
class User extends Authenticatable implements JWTSubject
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','phone','code', 'lang', 'avatar', 'role','device_id','isNotify','type','active','token','category_id','sub_category_id','whatsapp'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }
    public function getJWTCustomClaims()
    {
        return [];
    }

    public function Role()
    {
        return $this->hasOne('App\Models\Role','id','role');
    }

    public function avatar()
    {
        return appPath() . '/images/users/' . $this->avatar;
    }
    public function devices()
    {
        return $this->hasMany('App\Models\UserToken', 'user_id', 'id');
    }

    public function setPasswordAttribute($value){
        $this->attributes['password'] = bcrypt($value);
    }

    public function setPhoneAttribute($value){
        $this->attributes['phone'] = convert2english($value);
    }

    public function scopeUser($query)
    {
        return $query->where('type', 'user');
    }

    public function scopProvider($query)
    {
        return $query->where('type', 'provider');
    }

    public function covers()
    {
        return $this->hasMany('App\Models\CoverImage', 'user_id', 'id');
    }
    public function services()
    {
        return $this->hasMany('App\Models\Service', 'user_id', 'id');
    }

      public function favorites()
    {
        return $this->hasMany('App\Models\Favorite', 'user_id', 'id');
    }

      public function notifications()
    {
        return $this->hasMany('App\Models\Notification', 'r_id', 'id');
    }
}
