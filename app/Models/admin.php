<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    protected $fillable = ['username', 'password', 'name', 'email', 'member_id', 'role'];

    protected $hidden = ['password', 'remember_token'];

    const ROLE_SUPER_ADMIN = 'super_admin';
    const ROLE_CONTENT_ADMIN = 'content_admin';

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

    public function isSuperAdmin()
    {
        return $this->role === self::ROLE_SUPER_ADMIN;
    }

    public function isContentAdmin()
    {
        return $this->role === self::ROLE_CONTENT_ADMIN;
    }

    public function canAccessAllContent()
    {
        return $this->isSuperAdmin();
    }

    public function canAccessOwnContentOnly()
    {
        return $this->isContentAdmin();
    }
}
