<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ScdRule extends Model
{
    use HasFactory;

    protected $table = 'scd_rules';

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
