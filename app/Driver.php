<?php

namespace App;

use Laravel\Passport\HasApiTokens;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Driver extends Model
{
    use HasApiTokens, Notifiable;

    protected $fillable = [
      'driver_id', 'email', 'password', 'status', 'created_at', 'updated_at'
    ];
}
