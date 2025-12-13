<?php

namespace App\Http\Controllers;

use App\Models\CommunityService;
use App\Traits\LogsActivity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class CommunityServiceController extends Controller
{
    use LogsActivity;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        
        // If user is not superadmin, only show their own community services
        $query = CommunityService::with('admin');
        
        if ($user->role !== 'superadmin') {
            $query->where('uploaded_by', $user->id);
        }
        
        $communityServices = $query->orderBy('date', 'desc')->paginate(10);
            
        return view('admin.community-services.index', compact('communityServices'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.community-services.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'date' => 'required|date',
            'location' => 'required|string|max:255',
            'participants' => 'required|integer|min:0',
            'category' => 'required|string|in:workshop,seminar,training,webinar,consultation',
            'status' => 'required|string|in:upcoming,ongoing,completed',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $path = $image->store('community-services', 'public');
            $validated['image'] = $path;
        }

        $validated['uploaded_by'] = Auth::id();
        
        $communityService = CommunityService::create($validated);
        
        $this->logActivity('create', 'community_services', $communityService->id, "Created community service: {$communityService->title}");

        return redirect()->route('community-services.index')
            ->with('success', 'Community service successfully added.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $user = Auth::user();
        $communityService = CommunityService::findOrFail($id);
        
        // If user is not superadmin, only allow viewing their own community services
        if ($user->role !== 'superadmin' && $communityService->uploaded_by !== $user->id) {
            return response()->view('admin.access-denied', [
                'message' => 'Access Denied: You can only view your own content.'
            ], 403);
        }
        
        $communityService->load('admin');
        return view('admin.community-services.show', compact('communityService'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $user = Auth::user();
        $communityService = CommunityService::findOrFail($id);
        
        // If user is not superadmin, only allow editing their own community services
        if ($user->role !== 'superadmin' && $communityService->uploaded_by !== $user->id) {
            return response()->view('admin.access-denied', [
                'message' => 'Access Denied: You can only edit your own content.'
            ], 403);
        }
        
        return view('admin.community-services.edit', compact('communityService'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $user = Auth::user();
        $communityService = CommunityService::findOrFail($id);
        
        // If user is not superadmin, only allow updating their own community services
        if ($user->role !== 'superadmin' && $communityService->uploaded_by !== $user->id) {
            return response()->view('admin.access-denied', [
                'message' => 'Access Denied: You can only edit your own content.'
            ], 403);
        }
        
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'date' => 'required|date',
            'location' => 'required|string|max:255',
            'participants' => 'required|integer|min:0',
            'category' => 'required|string|in:workshop,seminar,training,webinar,consultation',
            'status' => 'required|string|in:upcoming,ongoing,completed',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
        ]);

        if ($request->hasFile('image')) {
            // Delete old image
            if ($communityService->image) {
                Storage::disk('public')->delete($communityService->image);
            }
            
            $image = $request->file('image');
            $path = $image->store('community-services', 'public');
            $validated['image'] = $path;
        }

        $communityService->update($validated);
        
        $this->logActivity('update', 'community_services', $communityService->id, "Updated community service: {$communityService->title}");

        return redirect()->route('community-services.index')
            ->with('success', 'Community service successfully updated.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $user = Auth::user();
        $communityService = CommunityService::findOrFail($id);
        
        // If user is not superadmin, only allow deleting their own community services
        if ($user->role !== 'superadmin' && $communityService->uploaded_by !== $user->id) {
            return response()->view('admin.access-denied', [
                'message' => 'Access Denied: You can only delete your own content.'
            ], 403);
        }
        
        $title = $communityService->title;
        if ($communityService->image) {
            Storage::disk('public')->delete($communityService->image);
        }
        
        $communityService->delete();
        
        $this->logActivity('delete', 'community_services', null, "Deleted community service: {$title}");

        return redirect()->route('community-services.index')
            ->with('success', 'Community service successfully deleted.');
    }
}
