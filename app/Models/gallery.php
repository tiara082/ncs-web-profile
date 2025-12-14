<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    protected $fillable = [
        'title', 'description', 'file_path', 'gallery_type', 'uploaded_by',
        'event_date', 'event_time', 'location', 'max_slots', 'registered_count',
        'event_status', 'event_mode', 'event_category'
    ];

    protected $casts = [
        'event_date' => 'date',
    ];



    public function admin()
    {
        return $this->belongsTo(Admin::class, 'uploaded_by');
    }

    public function uploader()
    {
        return $this->belongsTo(Admin::class, 'uploaded_by');
    }

    /**
     * Get the full URL for the file path, with fallback to default image
     */
    public function getImageUrlAttribute()
    {
        if ($this->file_path && $this->file_path !== 'poltek.png') {
            // Check if the file actually exists
            if (\Storage::disk('public')->exists($this->file_path)) {
                return asset('storage/' . $this->file_path);
            }
        }
        
        // Fallback to default image
        return asset('img/poltek.png');
    }

    /**
     * Check if the gallery has a valid uploaded image
     */
    public function hasValidImage()
    {
        return $this->file_path && 
               $this->file_path !== 'poltek.png' && 
               \Storage::disk('public')->exists($this->file_path);
    }
}

