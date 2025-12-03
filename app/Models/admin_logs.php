<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Admin_Logs extends Model
{
    protected $table = 'admin_logs';
    
    protected $fillable = [
        'admin_id', 'action', 'table_name', 'record_id'
    ];

    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }
}

