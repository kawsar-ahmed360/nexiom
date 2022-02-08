<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class compare extends Model
{

    public function Product(){

        return $this->belongsTo(Products::class,'pro_id');
    }
}
