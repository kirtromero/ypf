<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stat extends Model
{

    public function scenes()
    {
        return $this->belongsTo('App\Scene');
    }

    public function affiliates()
    {
        return $this->belongsTo('App\Affiliate');
    }
}
