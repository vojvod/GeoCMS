<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Map extends Model
{
    public function category()
    {
      return $this->belongsTo('App\Category');
    }
}
