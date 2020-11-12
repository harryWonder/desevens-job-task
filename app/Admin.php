<?php

namespace App;

use Laravel\Passport\HasApiTokens;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Admin extends Model
{
    use HasApiTokens, Notifiable;

    protected $fillable = [
      'email', 'password', 'status', 'roles', 'created_at', 'updated_at'
    ];
}
