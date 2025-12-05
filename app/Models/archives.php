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

    public function author()
    {
        return $this->belongsTo(Members::class, 'author_id');
    }
}
