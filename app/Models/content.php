<?php

namespace App\Models;

use App\Traits\HasContentAccess;
use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    use HasContentAccess;
    
    protected $fillable = [
        'title', 'body', 'content_type', 'created_by'
    ];

    public function creator()
    {
        return $this->belongsTo(Admin::class, 'created_by');
    }

    public function categories()
    {
        return $this->belongsToMany(Categories::class, 'content_categories');
    }
}
