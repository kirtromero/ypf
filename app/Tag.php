<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{

    public function scene()
    {
        return $this->belongsToMany('App\Scene','scene_has_tags');
    }

    public function scopePrimaryThumbnails($query)
	{
		$thumbnail_id = $query->thumbnail_id;
	    return $query->where('...')->get();
	}

	/* DVD count per tag */
    public function getPrimaryThumbnailAttribute() {
	    return Thumbnail::find($this->thumbnail_id)->url;
    }

}
