<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Consultation extends Model
{
    protected $fillable = [
        'name', 'email', 'phone', 'company', 'subject', 
        'message', 'status', 'admin_notes', 'assigned_to'
    ];

    public function assignedAdmin()
    {
        return $this->belongsTo(Admin::class, 'assigned_to');
    }
}
