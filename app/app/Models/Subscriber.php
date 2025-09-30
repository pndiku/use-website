<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subscriber extends Model
{
    

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $table = "subscriptions"; 

    //public $timestamps = "false";

    protected $fillable = [
        'id', 'email', 'created_at', 'updated_at'
    ];

   
}