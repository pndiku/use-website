<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Security extends Model
{
    use HasFactory;

    protected $fillable = [
        'ticker',
        'isin',
        'company_name',
        'issuer_name',
        'security_type',
        'type',
        'issued_shares',
        'issue_date',
        'rate',
        'maturity_date',
        'currency',
        'category',
        'is_active'
    ];

    protected $casts = [
        'rate' => 'decimal:4',
        'is_active' => 'boolean',
        'issue_date' => 'date',
        'maturity_date' => 'date'
    ];

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeEquities($query)
    {
        return $query->where('security_type', 'equity');
    }

    public function scopeBonds($query)
    {
        return $query->whereIn('security_type', ['treasury_bond', 'treasury_bill']);
    }

    public function news()
    {
        return $this->belongsToMany(News::class, 'news_security', 'security_id', 'news_id');
    }
}
