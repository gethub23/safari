<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Intro extends Model
{
    protected $fillable = ['image','title_ar','title_en','description_ar','description_en'];
    protected $appends = ['title','description'];

    public function getTitleAttribute()
    {
        return $this['title_'.lang()];
    }

    public function getDescriptionAttribute()
    {
        return $this['description_'.lang()];
    }
}
