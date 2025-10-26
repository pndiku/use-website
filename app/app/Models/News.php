<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class News extends Model
{
    use HasFactory;

    protected $table = 'news';

    protected $fillable = [
        'title',
        'slug',
        'content',
        'summary',
        'author',
        'image_url',
        'is_published',
        'published_at',
        'article_type',
        'file_url'
    ];

    protected $casts = [
        'is_published' => 'boolean',
        'published_at' => 'datetime',
        'created_at' => 'datetime',
        'updated_at' => 'datetime'
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($news) {
            if (empty($news->slug)) {
                $news->slug = static::generateUniqueSlug($news->title);
            }
        });

        static::updating(function ($news) {
            if ($news->isDirty('title') && empty($news->slug)) {
                $news->slug = static::generateUniqueSlug($news->title);
            }
        });
    }

    public static function generateUniqueSlug($title, $id = null)
    {
        $slug = Str::slug($title);
        $originalSlug = $slug;
        $counter = 1;

        while (static::where('slug', $slug)->where('id', '!=', $id)->exists()) {
            $slug = $originalSlug . '-' . $counter;
            $counter++;
        }

        return $slug;
    }

    public function scopePublished($query)
    {
        return $query->where('is_published', true);
    }

    public function scopeLatest($query)
    {
        return $query->orderByRaw('COALESCE(published_at, created_at) DESC');
    }

    public function getDisplayDate()
    {
        return $this->published_at ?? $this->created_at;
    }

    public function securities()
    {
        return $this->belongsToMany(Security::class, 'news_security');
    }

    public function scopeArticles($query)
    {
        return $query->where('article_type', 'article');
    }

    public function scopeReports($query)
    {
        return $query->where('article_type', 'report');
    }

    public function isReport()
    {
        return $this->article_type === 'report';
    }

    public function isArticle()
    {
        return $this->article_type === 'article';
    }
}
