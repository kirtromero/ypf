<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Thumbnail extends Model
{
    public function scenes()
    {
        return $this->belongsTo('App\Scene');
    }
}
