<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    public function GalleryCategory(){

    	return $this->belongsTo('App\GalleryCategory','cat_id');
    }
}
