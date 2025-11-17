<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    protected $fillable = ['username', 'password_hash', 'email'];

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
