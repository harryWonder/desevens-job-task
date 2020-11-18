<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
      'name', 'slug', 'description', 'banner', 'file_path', 'category_id', 'quantity', 'delivery_time', 'amount'
    ];

    public function category()
    {
      return $this->belongsTo('App\Category');
    }
}
