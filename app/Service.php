<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;

class Service extends Model
{
    use SoftDeletes;

    protected $fillable = [
      'serviceUrl', 'serviceType', 'username', 'password', 'slug'
    ];

    protected $dates = ['deleted_at'];

    public function layers()
    {
      return $this->hasMany('App\Layer');
    }
}
