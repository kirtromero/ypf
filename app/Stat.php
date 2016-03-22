<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stat extends Model
{

    public function scene()
    {
        return $this->belongsTo('App\Scene');
    }

    public function affiliate()
    {
        return $this->belongsTo('App\Affiliate');
    }
}
