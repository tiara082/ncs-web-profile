<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Archives extends Model
{
    protected $fillable = [
        'title', 'description', 'file_path', 'category', 'uploaded_by',
        'publication', 'year', 'cover_image', 'author_id', 'type'
    ];

    public function admin()
    {
        return $this->belongsTo(Admin::class, 'uploaded_by');
    }

    public function uploader()
    {
        return $this->belongsTo(Admin::class, 'uploaded_by');
    }

    public function author()
    {
        return $this->belongsTo(Members::class, 'author_id');
    }

    /**
     * Get the full URL for the cover image, with fallback to default image
     */
    public function getCoverImageUrlAttribute()
    {
        if ($this->cover_image && $this->cover_image !== 'poltek.png') {
            // Check if the file actually exists
            if (\Storage::disk('public')->exists($this->cover_image)) {
                return asset('storage/' . $this->cover_image);
            }
        }
        
        // Fallback to default image
        return asset('img/poltek.png');
    }

    /**
     * Check if the archive has a valid cover image
     */
    public function hasValidCoverImage()
    {
        return $this->cover_image && 
               $this->cover_image !== 'poltek.png' && 
               \Storage::disk('public')->exists($this->cover_image);
    }

    /**
     * Get the full URL for the file path
     */
    public function getFileUrlAttribute()
    {
        if ($this->file_path && \Storage::disk('public')->exists($this->file_path)) {
            return asset('storage/' . $this->file_path);
        }
        
        return null;
    }
}
