<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;

class Transaction extends Model
{
    protected $fillable = [
      'email', 'reference', 'amount', 'status', 'created_at', 'updated_at'
    ];
}
