<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $table = "user"; 

    public $timestamps = false;

    protected $fillable = [
        'id', 'name', 'phone', 'email', 'password', 'status', 'role'
    ];

    protected $hidden = [
        'password'
    ];

   
}