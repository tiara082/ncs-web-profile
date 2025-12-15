<?php

namespace App\Http\Controllers;

use App\Models\Members;
use App\Traits\LogsActivity;
use Illuminate\Http\Request;

class MembersController extends Controller
{
    use LogsActivity;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $members = Members::latest()->paginate(10);
        return view('admin.members.index', compact('members'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.members.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'member_name' => 'required|string|max:255',
            'member_role' => 'required|string|max:255',
            'member_phone' => 'nullable|string|max:20',
            'member_email' => 'nullable|email|max:255',
            'member_address' => 'nullable|string',
        ]);

        $member = Members::create($validated);
        
        $this->logActivity('create', 'members', $member->id, "Created member: {$member->member_name}");

        return redirect()->route('members.index')
            ->with('success', 'Member successfully added.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $member = Members::findOrFail($id);
        return view('admin.members.show', compact('member'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $member = Members::findOrFail($id);
        return view('admin.members.edit', compact('member'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $member = Members::findOrFail($id);
        $validated = $request->validate([
            'member_name' => 'required|string|max:255',
            'member_role' => 'required|string|max:255',
            'member_phone' => 'nullable|string|max:20',
            'member_email' => 'nullable|email|max:255',
            'member_address' => 'nullable|string',
        ]);

        $member->update($validated);
        
        $this->logActivity('update', 'members', $member->id, "Updated member: {$member->member_name}");

        return redirect()->route('members.index')
            ->with('success', 'Member successfully updated.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $member = Members::findOrFail($id);
        $name = $member->member_name;
        $member->delete();
        
        $this->logActivity('delete', 'members', null, "Deleted member: {$name}");

        return redirect()->route('members.index')
            ->with('success', 'Member successfully deleted.');
    }
}
