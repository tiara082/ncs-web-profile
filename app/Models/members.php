<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Members extends Model
{
    protected $fillable = [
        'member_name', 'member_role', 'member_phone',
        'member_email', 'member_address'
    ];
}

