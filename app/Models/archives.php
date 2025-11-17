<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Archives extends Model
{
    protected $fillable = [
        'title', 'description', 'file_path', 'category', 'uploaded_by'
    ];

    public function admin()
    {
        return $this->belongsTo(Admin::class, 'uploaded_by');
    }
}
