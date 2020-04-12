<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Tag extends Model
{
    public function setSlugAttribute($value)
    {
        $str = ($value) ? $value : $this->name;
        $this->attributes['slug'] = Str::slug($str);
    }

    public function articles()
    {
        return $this->belongsToMany('App\Article', 'article_tag');
    }
}
