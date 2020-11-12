<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
      'name', 'slug', 'description', 'banner', 'category_id', 'quantity', 'delivery_time', 'amount'
    ];
}
