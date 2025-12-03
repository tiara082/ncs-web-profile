<?php

namespace App\Http\Controllers;

use App\Models\Links;
use Illuminate\Http\Request;

class LinksController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $links = Links::latest()->paginate(10);
        return view('admin.links.index', compact('links'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.links.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'url' => 'required|url|max:255',
            'description' => 'nullable|string',
        ]);

        Links::create($validated);

        return redirect()->route('links.index')
            ->with('success', 'Link berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Links $link)
    {
        return view('admin.links.show', compact('link'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Links $link)
    {
        return view('admin.links.edit', compact('link'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Links $link)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'url' => 'required|url|max:255',
            'description' => 'nullable|string',
        ]);

        $link->update($validated);

        return redirect()->route('links.index')
            ->with('success', 'Link berhasil diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Links $link)
    {
        $link->delete();

        return redirect()->route('links.index')
            ->with('success', 'Link berhasil dihapus.');
    }
}
