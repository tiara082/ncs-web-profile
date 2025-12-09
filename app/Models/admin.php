<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    protected $fillable = ['username', 'password', 'name', 'email', 'member_id'];

    protected $hidden = ['password', 'remember_token'];

    public function member()
    {
        return $this->belongsTo(Members::class, 'member_id');
    }

    public function galleries()
    {
        return $this->hasMany(Gallery::class, 'uploaded_by');
    }

    public function archives()
    {
        return $this->hasMany(Archives::class, 'uploaded_by');
    }

    public function logs()
    {
        return $this->hasMany(Admin_Logs::class);
    }
}
