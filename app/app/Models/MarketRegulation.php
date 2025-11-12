<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MarketRegulation extends Model
{
    use HasFactory;

    protected $table = 'market_regulations';

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
