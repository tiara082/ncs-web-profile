<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;

trait HasContentAccess
{
    /**
     * Scope to limit content based on user role
     */
    public function scopeAccessibleBy(Builder $query, $admin = null): Builder
    {
        $admin = $admin ?: Auth::guard('web')->user();
        
        if (!$admin) {
            return $query->whereRaw('1 = 0'); // No access if not authenticated
        }

        // Super admin can see all content
        if ($admin->isSuperAdmin()) {
            return $query;
        }

        // Content admin can only see their own content
        return $query->where('created_by', $admin->id);
    }

    /**
     * Check if user can access specific content
     */
    public function canBeAccessedBy($admin = null): bool
    {
        $admin = $admin ?: Auth::guard('web')->user();
        
        if (!$admin) {
            return false;
        }

        // Super admin can access all content
        if ($admin->isSuperAdmin()) {
            return true;
        }

        // Content admin can only access their own content
        return $this->created_by === $admin->id;
    }

    /**
     * Get content that the current user can access
     */
    public static function getAccessibleContent()
    {
        $query = static::query();
        return (new static)->scopeAccessibleBy($query);
    }
}
