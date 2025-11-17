<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Content_Categories extends Model
{
    protected $table = 'content_categories';
    public $timestamps = false;

    protected $fillable = ['content_id', 'category_id'];
}
