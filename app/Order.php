<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
      'customer_id', 'driver_id', 'products', 'shipping', 'amount', 'reference', 'status'
    ];
}
