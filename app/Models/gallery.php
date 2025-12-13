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
}

