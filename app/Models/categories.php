<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    protected $fillable = ['name'];

    public function contents()
    {
        return $this->belongsToMany(Content::class, 'content_categories');
    }

    public function archives()
    {
        return $this->belongsToMany(Archives::class, 'archive_categories', 'category_id', 'archive_id');
    }
}
