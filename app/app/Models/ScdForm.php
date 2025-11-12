<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ScdForm extends Model
{
    use HasFactory;

    protected $table = 'scd_forms';

    protected $fillable = [
        'title',
        'file_url',
        'file_size',
        'published_date'
    ];

    protected $casts = [
        'published_date' => 'datetime'
    ];
}
