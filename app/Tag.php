<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    //
     protected $fillable=['name'];

//Polimorfica pero como es de manytomany se debe hacer uno por uno
     public function messages()
    {
    	return $this->morphedByMany(Message::class,'taggable');
    }
     public function users()
    {
    	return $this->morphedByMany(User::class,'taggable');
    }
}
