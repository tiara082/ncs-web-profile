<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    protected $fillable = [
        'title', 'description', 'file_path', 'gallery_type', 'uploaded_by'
    ];

    public function admin()
    {
        return $this->belongsTo(Admin::class, 'uploaded_by');
    }
}

