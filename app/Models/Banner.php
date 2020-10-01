<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    protected $fillable = ['title_ar','title_en','image','description_en','description_ar','expire_date','url','active'];

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
