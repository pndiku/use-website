<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PrivateTransfer extends Model
{
    use HasFactory;

    protected $table = 'private_transfers';

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
