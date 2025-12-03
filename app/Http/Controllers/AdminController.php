<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
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
        ]);

        $validated['password_hash'] = Hash::make($validated['password']);
        unset($validated['password']);

        Admin::create($validated);

        return redirect()->route('admins.index')
            ->with('success', 'Admin berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Admin $admin)
    {
        return view('admin.admins.show', compact('admin'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Admin $admin)
    {
        return view('admin.admins.edit', compact('admin'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Admin $admin)
    {
        $validated = $request->validate([
            'username' => 'required|string|max:255|unique:admins,username,' . $admin->id,
            'email' => 'required|email|max:255|unique:admins,email,' . $admin->id,
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        if (!empty($validated['password'])) {
            $validated['password_hash'] = Hash::make($validated['password']);
        }
        unset($validated['password']);

        $admin->update($validated);

        return redirect()->route('admins.index')
            ->with('success', 'Admin berhasil diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Admin $admin)
    {
        $admin->delete();

        return redirect()->route('admins.index')
            ->with('success', 'Admin berhasil dihapus.');
    }
}
