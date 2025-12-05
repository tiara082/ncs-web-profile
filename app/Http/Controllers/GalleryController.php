<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use App\Traits\LogsActivity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    use LogsActivity;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $agendas = Gallery::with('admin')
            ->where('gallery_type', 'agenda')
            ->orderBy('event_date', 'desc')
            ->paginate(10, ['*'], 'agendas');
            
        $pastActivities = Gallery::with('admin')
            ->where('gallery_type', 'past_activity')
            ->latest()
            ->paginate(10, ['*'], 'activities');
            
        return view('admin.galleries.index', compact('agendas', 'pastActivities'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.galleries.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'gallery_type' => 'required|string|in:agenda,past_activity',
            'file' => 'required|file|mimes:jpg,jpeg,png,gif,mp4,mov,avi|max:20480',
            'event_date' => 'nullable|date',
            'event_time' => 'nullable',
            'location' => 'nullable|string|max:255',
            'max_slots' => 'nullable|integer|min:0',
            'event_mode' => 'nullable|string|in:online,offline,hybrid',
            'event_category' => 'nullable|string|max:100',
            'event_status' => 'nullable|string|in:upcoming,ongoing,completed',
        ]);

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $path = $file->store('gallery', 'public');
            $validated['file_path'] = $path;
        }

        $validated['uploaded_by'] = Auth::id();
        $validated['registered_count'] = 0;
        
        $gallery = Gallery::create($validated);
        
        $this->logActivity('create', 'galleries', $gallery->id, "Created {$gallery->gallery_type}: {$gallery->title}");

        return redirect()->route('galleries.index')
            ->with('success', ucfirst($gallery->gallery_type) . ' berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $gallery = Gallery::findOrFail($id);
        $gallery->load('admin');
        return view('admin.galleries.show', compact('gallery'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $gallery = Gallery::findOrFail($id);
        return view('admin.galleries.edit', compact('gallery'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $gallery = Gallery::findOrFail($id);
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'gallery_type' => 'required|string|in:agenda,past_activity',
            'file' => 'nullable|file|mimes:jpg,jpeg,png,gif,mp4,mov,avi|max:20480',
            'event_date' => 'nullable|date',
            'event_time' => 'nullable',
            'location' => 'nullable|string|max:255',
            'max_slots' => 'nullable|integer|min:0',
            'event_mode' => 'nullable|string|in:online,offline,hybrid',
            'event_category' => 'nullable|string|max:100',
            'event_status' => 'nullable|string|in:upcoming,ongoing,completed',
        ]);

        if ($request->hasFile('file')) {
            // Delete old file
            if ($gallery->file_path) {
                Storage::disk('public')->delete($gallery->file_path);
            }
            
            $file = $request->file('file');
            $path = $file->store('gallery', 'public');
            $validated['file_path'] = $path;
        }

        $gallery->update($validated);
        
        $this->logActivity('update', 'galleries', $gallery->id, "Updated {$gallery->gallery_type}: {$gallery->title}");

        return redirect()->route('galleries.index')
            ->with('success', ucfirst($gallery->gallery_type) . ' berhasil diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $gallery = Gallery::findOrFail($id);
        $title = $gallery->title;
        if ($gallery->file_path) {
            Storage::disk('public')->delete($gallery->file_path);
        }
        
        $gallery->delete();
        
        $this->logActivity('delete', 'galleries', null, "Deleted gallery: {$title}");

        return redirect()->route('galleries.index')
            ->with('success', 'Gallery berhasil dihapus.');
    }
}
