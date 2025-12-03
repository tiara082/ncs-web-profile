<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    protected $fillable = ['username', 'password_hash', 'email'];

    protected $hidden = ['password_hash'];

    public function getAuthPassword()
    {
        return $this->password_hash;
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
