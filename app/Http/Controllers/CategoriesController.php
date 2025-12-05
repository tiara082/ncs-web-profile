<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Traits\LogsActivity;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    use LogsActivity;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Categories::withCount('contents')->latest()->paginate(10);
        return view('admin.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:categories',
        ]);

        $category = Categories::create($validated);
        
        $this->logActivity('create', 'categories', $category->id, "Created category: {$category->name}");

        return redirect()->route('categories.index')
            ->with('success', 'Category berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $category = Categories::findOrFail($id);
        $category->loadCount('contents');
        $category->load(['contents' => function ($query) {
            $query->latest()->take(10);
        }]);
        return view('admin.categories.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $category = Categories::findOrFail($id);
        return view('admin.categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $category = Categories::findOrFail($id);
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:categories,name,' . $category->id,
        ]);

        $category->update($validated);
        
        $this->logActivity('update', 'categories', $category->id, "Updated category: {$category->name}");

        return redirect()->route('categories.index')
            ->with('success', 'Category berhasil diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $category = Categories::findOrFail($id);
        $name = $category->name;
        // Detach all contents before deleting
        $category->contents()->detach();
        $category->delete();
        
        $this->logActivity('delete', 'categories', null, "Deleted category: {$name}");

        return redirect()->route('categories.index')
            ->with('success', 'Category berhasil dihapus.');
    }
}
