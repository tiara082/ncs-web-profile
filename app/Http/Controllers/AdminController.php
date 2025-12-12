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
        $admin = auth()->guard('web')->user();
        
        if ($admin->role === 'super_admin') {
            // Super Admin sees all stats
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
        } else {
            // Content Admin sees only their own stats
            $stats = [
                'contents' => \App\Models\Content::where('created_by', $admin->id)->count(),
                'categories' => \App\Models\Categories::count(),
                'galleries' => \App\Models\Gallery::where('uploaded_by', $admin->id)->count(),
                'archives' => \App\Models\Archives::where('uploaded_by', $admin->id)->count(),
                'links' => \App\Models\Links::count(), // Links are shared resources
            ];
            
            $recentContents = \App\Models\Content::with('creator')
                ->where('created_by', $admin->id)
                ->latest()
                ->take(5)
                ->get();
            $recentLogs = []; // Content admins don't see logs
        }
        
        // Content by type for chart (filtered for content admin)
        $contentsByTypeQuery = \App\Models\Content::selectRaw('content_type, COUNT(*) as count')
            ->groupBy('content_type');
            
        if ($admin->role !== 'super_admin') {
            $contentsByTypeQuery->where('created_by', $admin->id);
        }
        
        $contentsByType = $contentsByTypeQuery->pluck('count', 'content_type')->toArray();
        
        // Monthly content creation (PostgreSQL compatible, filtered for content admin)
        $monthlyContentsQuery = \App\Models\Content::selectRaw('EXTRACT(MONTH FROM created_at) as month, COUNT(*) as count')
            ->whereRaw('EXTRACT(YEAR FROM created_at) = ?', [date('Y')])
            ->groupBy('month')
            ->orderBy('month');
            
        if ($admin->role !== 'super_admin') {
            $monthlyContentsQuery->where('created_by', $admin->id);
        }
        
        $monthlyContents = $monthlyContentsQuery->pluck('count', 'month')->toArray();
        
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
            'role' => 'required|string|in:super_admin,content_admin',
            'member_id' => 'nullable|exists:members,id',
        ]);

        $validated['password_hash'] = Hash::make($validated['password']);
        unset($validated['password']);

        $admin = Admin::create($validated);
        
        $this->logActivity('create', 'admins', $admin->id, "Created admin: {$admin->username}");

        return redirect()->route('administrators.index')
            ->with('success', 'Admin successfully added.');
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
            'role' => 'required|string|in:super_admin,content_admin',
            'member_id' => 'nullable|exists:members,id',
        ]);

        if (!empty($validated['password'])) {
            $validated['password_hash'] = Hash::make($validated['password']);
        }
        unset($validated['password']);

        $administrator->update($validated);
        
        $this->logActivity('update', 'admins', $administrator->id, "Updated admin: {$administrator->username}");

        return redirect()->route('administrators.index')
            ->with('success', 'Admin successfully updated.');
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
            ->with('success', 'Admin successfully deleted.');
    }
}
