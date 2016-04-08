<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Scene_has_tag extends Model
{

	protected $table = 'scene_has_tags';

    public function scenes()
    {
        return $this->belongsTo('App\Scene');
    }

    public function tags()
    {
        return $this->belongsTo('App\Tag');
    }
}
