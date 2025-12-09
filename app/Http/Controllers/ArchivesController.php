<?php

namespace App\Http\Controllers;

use App\Models\Archives;
use App\Traits\LogsActivity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ArchivesController extends Controller
{
    use LogsActivity;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $archives = Archives::with('admin', 'categories')->latest()->paginate(10);
        return view('admin.archives.index', compact('archives'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = \App\Models\Categories::all();
        return view('admin.archives.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'type' => 'required|string|in:document,research,publication',
            'publication' => 'nullable|string|max:255',
            'year' => 'nullable|string|max:4',
            'author_id' => 'nullable|exists:members,id',
            'file' => 'required|file|mimes:pdf,doc,docx,xls,xlsx,zip,rar|max:51200',
            'cover_image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'categories' => 'required|array|min:1',
            'categories.*' => 'exists:categories,id',
        ]);

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $path = $file->store('archives', 'public');
            $validated['file_path'] = $path;
        }

        if ($request->hasFile('cover_image')) {
            $cover = $request->file('cover_image');
            $coverPath = $cover->store('covers', 'public');
            $validated['cover_image'] = $coverPath;
        }

        $validated['uploaded_by'] = Auth::id();
        
        // Auto-set author if admin is linked to a member and no author is selected
        if (empty($validated['author_id']) && Auth::user()->member_id) {
            $validated['author_id'] = Auth::user()->member_id;
        }
        
        $archive = Archives::create($validated);
        
        // Sync categories
        if (isset($validated['categories'])) {
            $archive->categories()->sync($validated['categories']);
        }
        
        $this->logActivity('create', 'archives', $archive->id, "Created archive: {$archive->title}");

        return redirect()->route('archives.index')
            ->with('success', 'Archive berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $archive = Archives::findOrFail($id);
        $archive->load('admin', 'categories');
        return view('admin.archives.show', compact('archive'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $archive = Archives::findOrFail($id);
        $categories = \App\Models\Categories::all();
        $archive->load('categories');
        return view('admin.archives.edit', compact('archive', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $archive = Archives::findOrFail($id);
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'type' => 'required|string|in:document,research,publication',
            'publication' => 'nullable|string|max:255',
            'year' => 'nullable|string|max:4',
            'author_id' => 'nullable|exists:members,id',
            'file' => 'nullable|file|mimes:pdf,doc,docx,xls,xlsx,zip,rar|max:51200',
            'cover_image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'categories' => 'required|array|min:1',
            'categories.*' => 'exists:categories,id',
        ]);

        if ($request->hasFile('file')) {
            // Delete old file
            if ($archive->file_path) {
                Storage::disk('public')->delete($archive->file_path);
            }
            
            $file = $request->file('file');
            $path = $file->store('archives', 'public');
            $validated['file_path'] = $path;
        }

        if ($request->hasFile('cover_image')) {
            // Delete old cover
            if ($archive->cover_image) {
                Storage::disk('public')->delete($archive->cover_image);
            }
            
            $cover = $request->file('cover_image');
            $coverPath = $cover->store('covers', 'public');
            $validated['cover_image'] = $coverPath;
        }

        $archive->update($validated);
        
        // Sync categories
        if (isset($validated['categories'])) {
            $archive->categories()->sync($validated['categories']);
        } else {
            $archive->categories()->detach();
        }
        
        $this->logActivity('update', 'archives', $archive->id, "Updated archive: {$archive->title}");

        return redirect()->route('archives.index')
            ->with('success', 'Archive berhasil diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $archive = Archives::findOrFail($id);
        $title = $archive->title;
        if ($archive->file_path) {
            Storage::disk('public')->delete($archive->file_path);
        }
        
        // Detach categories before deleting
        $archive->categories()->detach();
        $archive->delete();
        
        $this->logActivity('delete', 'archives', null, "Deleted archive: {$title}");

        return redirect()->route('archives.index')
            ->with('success', 'Archive berhasil dihapus.');
    }
}
