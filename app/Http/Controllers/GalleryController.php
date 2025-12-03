<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $galleries = Gallery::with('admin')->latest()->paginate(12);
        return view('admin.galleries.index', compact('galleries'));
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
            'gallery_type' => 'required|string|max:50',
            'file' => 'required|file|mimes:jpg,jpeg,png,gif,mp4,mov,avi|max:20480',
        ]);

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $path = $file->store('gallery', 'public');
            $validated['file_path'] = $path;
        }

        $validated['uploaded_by'] = Auth::id();
        
        Gallery::create($validated);

        return redirect()->route('galleries.index')
            ->with('success', 'Gallery berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Gallery $gallery)
    {
        $gallery->load('admin');
        return view('admin.galleries.show', compact('gallery'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Gallery $gallery)
    {
        return view('admin.galleries.edit', compact('gallery'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Gallery $gallery)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'gallery_type' => 'required|string|max:50',
            'file' => 'nullable|file|mimes:jpg,jpeg,png,gif,mp4,mov,avi|max:20480',
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

        return redirect()->route('galleries.index')
            ->with('success', 'Gallery berhasil diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Gallery $gallery)
    {
        if ($gallery->file_path) {
            Storage::disk('public')->delete($gallery->file_path);
        }
        
        $gallery->delete();

        return redirect()->route('galleries.index')
            ->with('success', 'Gallery berhasil dihapus.');
    }
}
