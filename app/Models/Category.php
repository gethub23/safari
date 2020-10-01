<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name_ar','name_en'];
    protected $appends = ['name'];

    public function getNameAttribute()
    {
        return $this['name_'.lang()];
    }

    public function subCategories()
    {
        return $this->hasMany('App\Models\SubCategory', 'category_id', 'id');
    }
    public function services()
    {
        return $this->hasMany('App\Models\Service', 'category_id', 'id');
    }

}
