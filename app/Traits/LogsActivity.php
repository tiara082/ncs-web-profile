<?php

namespace App\Traits;

use App\Models\Admin_Logs;
use Illuminate\Support\Facades\Auth;

trait LogsActivity
{
    /**
     * Log an activity
     */
    protected function logActivity(string $action, string $tableName, $recordId = null, string $description = null)
    {
        Admin_Logs::create([
            'admin_id' => Auth::id(),
            'action' => $action,
            'table_name' => $tableName,
            'record_id' => $recordId,
            'description' => $description,
        ]);
    }
}
