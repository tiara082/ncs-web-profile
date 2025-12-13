<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CommunityService extends Model
{
    protected $fillable = [
        'title',
        'description', 
        'date',
        'location',
        'participants',
        'category',
        'status',
        'image',
        'uploaded_by'
    ];

    protected $casts = [
        'date' => 'date',
    ];

    public function admin()
    {
        return $this->belongsTo(Admin::class, 'uploaded_by');
    }
}
