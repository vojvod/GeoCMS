<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;

class Map extends Model
{
    use SoftDeletes;

    protected $fillable = [
      'title', 'slug', 'content', 'category_id', 'featured'
    ];

    public function getFeaturedAttribure($featured)
    {
      return asset($featured);
    }

    protected $dates = ['deleted_at'];

    public function category()
    {
      return $this->belongsTo('App\Category');
    }
}
