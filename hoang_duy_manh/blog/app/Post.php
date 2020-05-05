<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public function category(){
      return $this->belongsto('App\Catergory');
    }

    public function comments(){
      return $this->hasMany('App\Comment');
    }
}
