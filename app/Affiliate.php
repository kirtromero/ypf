<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Affiliate extends Model
{
    public function scenes()
    {
        return $this->belongsTo('App\Scene');
    }

    public function stats()
    {
        return $this->hasMany('App\Stat');
    }
}
