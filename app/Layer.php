<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Layer extends Model
{
  public function service()
  {
    return $this->belongsTo('App\Sevice');
  }
}
