<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Traits\LogsActivity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    use LogsActivity;
    /**
     * Display dashboard.
     */
    public function dashboard()
    {
        $stats = [
            'admins' => \App\Models\Admin::count(),
            'contents' => \App\Models\Content::count(),
            'categories' => \App\Models\Categories::count(),
            'members' => \App\Models\Members::count(),
            'galleries' => \App\Models\Gallery::count(),
            'archives' => \App\Models\Archives::count(),
            'links' => \App\Models\Links::count(),
        ];
        
        $recentContents = \App\Models\Content::with('creator')->latest()->take(5)->get();
        $recentLogs = \App\Models\Admin_Logs::with('admin')->latest()->take(10)->get();
        
        // Content by type for chart
        $contentsByType = \App\Models\Content::selectRaw('content_type, COUNT(*) as count')
            ->groupBy('content_type')
            ->pluck('count', 'content_type')
            ->toArray();
        
        // Monthly content creation (PostgreSQL compatible)
        $monthlyContents = \App\Models\Content::selectRaw('EXTRACT(MONTH FROM created_at) as month, COUNT(*) as count')
            ->whereRaw('EXTRACT(YEAR FROM created_at) = ?', [date('Y')])
            ->groupBy('month')
            ->orderBy('month')
            ->pluck('count', 'month')
            ->toArray();
        
        // Fill missing months with 0
        $monthlyData = [];
        for ($i = 1; $i <= 12; $i++) {
            $monthlyData[$i] = $monthlyContents[$i] ?? 0;
        }
        
        return view('admin.dashboard', compact('stats', 'recentContents', 'recentLogs', 'contentsByType', 'monthlyData'));
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $admins = Admin::latest()->paginate(10);
        return view('admin.admins.index', compact('admins'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.admins.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'username' => 'required|string|max:255|unique:admins',
            'email' => 'required|email|max:255|unique:admins',
            'password' => 'required|string|min:8|confirmed',
            'role' => 'required|string|in:admin,super_admin,editor,moderator',
            'member_id' => 'nullable|exists:members,id',
        ]);

        $validated['password_hash'] = Hash::make($validated['password']);
        unset($validated['password']);

        $admin = Admin::create($validated);
        
        $this->logActivity('create', 'admins', $admin->id, "Created admin: {$admin->username}");

        return redirect()->route('administrators.index')
            ->with('success', 'Admin berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Admin $administrator)
    {
        return view('admin.admins.show', ['admin' => $administrator]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Admin $administrator)
    {
        return view('admin.admins.edit', ['admin' => $administrator]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Admin $administrator)
    {
        $validated = $request->validate([
            'username' => 'required|string|max:255|unique:admins,username,' . $administrator->id,
            'email' => 'required|email|max:255|unique:admins,email,' . $administrator->id,
            'password' => 'nullable|string|min:8|confirmed',
            'role' => 'required|string|in:admin,super_admin,editor,moderator',
            'member_id' => 'nullable|exists:members,id',
        ]);

        if (!empty($validated['password'])) {
            $validated['password_hash'] = Hash::make($validated['password']);
        }
        unset($validated['password']);

        $administrator->update($validated);
        
        $this->logActivity('update', 'admins', $administrator->id, "Updated admin: {$administrator->username}");

        return redirect()->route('administrators.index')
            ->with('success', 'Admin berhasil diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Admin $administrator)
    {
        $username = $administrator->username;
        $administrator->delete();
        
        $this->logActivity('delete', 'admins', null, "Deleted admin: {$username}");

        return redirect()->route('administrators.index')
            ->with('success', 'Admin berhasil dihapus.');
    }
}
