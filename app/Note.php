<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    //
     protected $fillable=['body'];

//Polimorfica
     public function notable()
    {
    	return $this->morphTo();
    }
}
