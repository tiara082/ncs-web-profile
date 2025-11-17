<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    protected $fillable = [
        'title', 'body', 'content_type', 'created_by'
    ];

    public function admin()
    {
        return $this->belongsTo(Admin::class, 'created_by');
    }

    public function categories()
    {
        return $this->belongsToMany(Categories::class, 'content_categories');
    }
}
