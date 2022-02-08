<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{

    public function Category(){

        return $this->belongsTo(ProductCategory::class,'cat_id');
    }
}
