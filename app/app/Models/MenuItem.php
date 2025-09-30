<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MenuItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'url',
        'parent_id',
        'sort_order',
        'is_active',
        'opens_new_tab',
        'icon',
        'description'
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'opens_new_tab' => 'boolean',
        'created_at' => 'datetime',
        'updated_at' => 'datetime'
    ];

    /**
     * Get the parent menu item
     */
    public function parent()
    {
        return $this->belongsTo(MenuItem::class, 'parent_id');
    }

    /**
     * Get the child menu items
     */
    public function children()
    {
        return $this->hasMany(MenuItem::class, 'parent_id')->orderBy('sort_order');
    }

    /**
     * Get only active child menu items
     */
    public function activeChildren()
    {
        return $this->hasMany(MenuItem::class, 'parent_id')
                    ->where('is_active', true)
                    ->orderBy('sort_order');
    }

    /**
     * Scope for active menu items
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    /**
     * Scope for main menu items (no parent)
     */
    public function scopeMainMenu($query)
    {
        return $query->whereNull('parent_id')->orderBy('sort_order');
    }

    /**
     * Check if this menu item has children
     */
    public function hasChildren()
    {
        return $this->children()->exists();
    }

    /**
     * Check if this menu item has active children
     */
    public function hasActiveChildren()
    {
        return $this->activeChildren()->exists();
    }

    /**
     * Get the depth level of this menu item (0 = root, 1 = first level, etc.)
     */
    public function getDepth()
    {
        $depth = 0;
        $parent = $this->parent;

        while ($parent) {
            $depth++;
            $parent = $parent->parent;
        }

        return $depth;
    }

    /**
     * Check if this menu item can have children (not more than 2 levels deep)
     */
    public function canHaveChildren()
    {
        return $this->getDepth() < 2; // Allow up to 3 levels (0, 1, 2)
    }

    /**
     * Get all descendants (children, grandchildren, etc.)
     */
    public function descendants()
    {
        return $this->children()->with('descendants');
    }

    /**
     * Get the root parent of this menu item
     */
    public function getRootParent()
    {
        $item = $this;
        while ($item->parent) {
            $item = $item->parent;
        }
        return $item;
    }
}
