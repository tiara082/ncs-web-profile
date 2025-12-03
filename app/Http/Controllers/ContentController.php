<?php

namespace App\Http\Controllers;

use App\Models\Content;
use App\Models\Categories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ContentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contents = Content::with('creator', 'categories')->latest()->paginate(10);
        return view('admin.contents.index', compact('contents'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Categories::all();
        return view('admin.contents.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'body' => 'required|string',
            'content_type' => 'required|string|max:50',
            'created_by' => 'required|exists:admins,id',
            'categories' => 'nullable|array',
            'categories.*' => 'exists:categories,id',
        ]);
        
        $content = Content::create($validated);
        
        if (isset($validated['categories'])) {
            $content->categories()->sync($validated['categories']);
        }

        return redirect()->route('contents.index')
            ->with('success', 'Content berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Content $content)
    {
        $content->load('creator', 'categories');
        return view('admin.contents.show', compact('content'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Content $content)
    {
        $categories = Categories::all();
        $content->load('categories');
        return view('admin.contents.edit', compact('content', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Content $content)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'body' => 'required|string',
            'content_type' => 'required|string|max:50',
            'categories' => 'nullable|array',
            'categories.*' => 'exists:categories,id',
        ]);

        $content->update($validated);
        
        if (isset($validated['categories'])) {
            $content->categories()->sync($validated['categories']);
        } else {
            $content->categories()->detach();
        }

        return redirect()->route('contents.index')
            ->with('success', 'Content berhasil diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Content $content)
    {
        $content->categories()->detach();
        $content->delete();

        return redirect()->route('contents.index')
            ->with('success', 'Content berhasil dihapus.');
    }
}
