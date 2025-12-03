<?php

namespace App\Http\Controllers;

use App\Models\Admin_Logs;
use Illuminate\Http\Request;

class Admin_LogsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $logs = Admin_Logs::with('admin')->latest()->paginate(20);
        return view('admin.logs.index', compact('logs'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Admin_Logs $admin_log)
    {
        $admin_log->load('admin');
        return view('admin.logs.show', compact('admin_log'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Admin_Logs $admin_log)
    {
        $admin_log->delete();

        return redirect()->route('admin_logs.index')
            ->with('success', 'Log berhasil dihapus.');
    }

    /**
     * Remove all logs.
     */
    public function destroyAll()
    {
        Admin_Logs::truncate();

        return redirect()->route('admin_logs.index')
            ->with('success', 'Semua log berhasil dihapus.');
    }
}
