<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    use HasFactory;

    protected $fillable = [
        'filename',
        'original_name',
        'file_path',
        'file_url',
        'mime_type',
        'file_type',
        'category',
        'file_size',
        'description',
        'alt_text'
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime'
    ];

    public function getFormattedSizeAttribute()
    {
        $bytes = $this->file_size;
        if ($bytes >= 1073741824) {
            return number_format($bytes / 1073741824, 2) . ' GB';
        } elseif ($bytes >= 1048576) {
            return number_format($bytes / 1048576, 2) . ' MB';
        } elseif ($bytes >= 1024) {
            return number_format($bytes / 1024, 2) . ' KB';
        } else {
            return $bytes . ' bytes';
        }
    }

    public function isImage()
    {
        return $this->file_type === 'image';
    }

    public function isPdf()
    {
        return $this->file_type === 'pdf';
    }

    public function isDocument()
    {
        return in_array($this->file_type, ['document', 'pdf']);
    }
}
