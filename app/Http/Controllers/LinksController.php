<?php

namespace App\Http\Controllers;

use App\Models\Links;
use App\Traits\LogsActivity;
use Illuminate\Http\Request;

class LinksController extends Controller
{
    use LogsActivity;
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

        $link = Links::create($validated);
        
        $this->logActivity('create', 'links', $link->id, "Created link: {$link->name}");

        return redirect()->route('links.index')
            ->with('success', 'Link successfully added.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $link = Links::findOrFail($id);
        return view('admin.links.show', compact('link'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $link = Links::findOrFail($id);
        return view('admin.links.edit', compact('link'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $link = Links::findOrFail($id);
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'url' => 'required|url|max:255',
            'description' => 'nullable|string',
        ]);

        $link->update($validated);
        
        $this->logActivity('update', 'links', $link->id, "Updated link: {$link->name}");

        return redirect()->route('links.index')
            ->with('success', 'Link successfully updated.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $link = Links::findOrFail($id);
        $name = $link->name;
        $link->delete();
        
        $this->logActivity('delete', 'links', null, "Deleted link: {$name}");

        return redirect()->route('links.index')
            ->with('success', 'Link successfully deleted.');
    }
}
