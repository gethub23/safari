<?php

namespace App\Models;

use App\Models\Favorite;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = ['name_ar','name_en','description_ar','description_en','price','accepted','user_id','latitude','longitude','whatsapp','category_id','sub_category_id'];
    protected $appends = ['name','description'];

    public function getNameAttribute()
    {
        return $this['name_'.lang()];
    }

    public function getDescriptionAttribute()
    {
        return $this['description_'.lang()];
    }
    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id', 'id');
    }
    public function category()
    {
        return $this->belongsTo('App\Models\Category', 'category_id', 'id');
    }
    public function subCategory()
    {
        return $this->belongsTo('App\Models\SubCategory', 'sub_category_id', 'id');
    }

    public function images()
    {
        return $this->hasMany('App\Models\ServiceImage', 'service_id', 'id');
    }

    public function additions()
    {
        return $this->hasMany('App\Models\Addition', 'service_id', 'id');
    }

    public function rates()
    {
        return $this->hasMany('App\Models\Rate', 'service_id', 'id');
    }

    public function favorites()
    {
        return $this->hasMany('App\Models\Favorite', 'service_id', 'id');
    }


    public function isFav()
    {
        $exists = Favorite::where('user_id' , auth()->id())->where('service_id' , $this->id)->exists();
        $fav    = $exists ? 1 : 0 ;
        return   $fav ;  
    }


}
