<?php

namespace App\Http\Controllers;

use App\Models\Archives;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ArchivesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $archives = Archives::with('admin')->latest()->paginate(10);
        return view('admin.archives.index', compact('archives'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.archives.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'category' => 'required|string|max:100',
            'file' => 'required|file|mimes:pdf,doc,docx,xls,xlsx,zip,rar|max:51200',
        ]);

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $path = $file->store('archives', 'public');
            $validated['file_path'] = $path;
        }

        $validated['uploaded_by'] = Auth::id();
        
        Archives::create($validated);

        return redirect()->route('archives.index')
            ->with('success', 'Archive berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Archives $archive)
    {
        $archive->load('admin');
        return view('admin.archives.show', compact('archive'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Archives $archive)
    {
        return view('admin.archives.edit', compact('archive'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Archives $archive)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'category' => 'required|string|max:100',
            'file' => 'nullable|file|mimes:pdf,doc,docx,xls,xlsx,zip,rar|max:51200',
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

        $archive->update($validated);

        return redirect()->route('archives.index')
            ->with('success', 'Archive berhasil diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Archives $archive)
    {
        if ($archive->file_path) {
            Storage::disk('public')->delete($archive->file_path);
        }
        
        $archive->delete();

        return redirect()->route('archives.index')
            ->with('success', 'Archive berhasil dihapus.');
    }
}
