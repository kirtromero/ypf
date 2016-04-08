<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Scene extends Model
{
    use SoftDeletes;

    public function sites()
    {
        return $this->hasOne('App\Site');
    }

    public function affiliates()
    {
        return $this->hasOne('App\Affiliate');
    }

    public function tags()
    {
        return $this->belongsToMany('App\Tag','scene_has_tags');
    }

    public function stats()
    {
        return $this->belongsTo('App\Stat');
    }

    public function thumbnails()
    {
        return $this->hasMany('App\Thumbnail');
    }

    public function scopeTitle($query, $title)
    {
        return $query->with('title', 'LIKE', "%".$title."%");
    }
}
