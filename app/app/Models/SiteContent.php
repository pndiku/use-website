<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SiteContent extends Model
{
    use HasFactory;

    protected $fillable = [
        'key',
        'value',
        'type',
        'group',
        'description'
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime'
    ];

    public static function getValue($key, $default = null)
    {
        $content = static::where('key', $key)->first();
        return $content ? $content->value : $default;
    }

    public static function setValue($key, $value, $type = 'text', $group = null, $description = null)
    {
        return static::updateOrCreate(
            ['key' => $key],
            [
                'value' => $value,
                'type' => $type,
                'group' => $group,
                'description' => $description
            ]
        );
    }

    public static function getGroupedContent($group)
    {
        return static::where('group', $group)->get()->pluck('value', 'key');
    }
}
