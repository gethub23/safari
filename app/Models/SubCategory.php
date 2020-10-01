<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    protected $fillable = ['name_ar','name_en','category_id'];
    protected $appends = ['name'];

    public function getNameAttribute()
    {
        return $this['name_'.lang()];
    }

    public function category()
    {
        return $this->belongsTo('App\Models\Category', 'category_id', 'id');
    }

     public function services()
    {
        return $this->hasMany('App\Models\Service', 'sub_category_id', 'id');
    }
}
