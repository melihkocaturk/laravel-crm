<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;
use Nicolaslopezj\Searchable\SearchableTrait;

class Article extends Model
{
    use SoftDeletes;
    use SearchableTrait;

    protected $dates = ['deleted_at', 'created_at'];

    protected $searchable = [
        /**
         * Columns and their priority in search results.
         * Columns with higher values are more important.
         * Columns with equal values have equal importance.
         *
         * @var array
         */
        'columns' => [
            'articles.title' => 10,
            'articles.content' => 5,
        ]
    ];

    public function setSlugAttribute($value)
    {
        $str = ($value) ? $value : $this->title.'-'.$this->id;
        $this->attributes['slug'] = Str::slug($str);
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function categories()
    {
        return $this->belongsToMany('App\Category', 'article_category');
    }

    public function tags()
    {
        return $this->belongsToMany('App\Tag', 'article_tag');
    }

    public function scopeActive($query)
    {
        return $query->where('deleted_at', null);
    }
}
