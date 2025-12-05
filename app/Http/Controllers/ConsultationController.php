<?php

namespace App\Http\Controllers;

use App\Models\Consultation;
use App\Traits\LogsActivity;
use Illuminate\Http\Request;

class ConsultationController extends Controller
{
    use LogsActivity;

    public function index()
    {
        $consultations = Consultation::with('assignedAdmin')
            ->latest()
            ->paginate(20);
        return view('admin.consultations.index', compact('consultations'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:20',
            'company' => 'nullable|string|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        $consultation = Consultation::create($validated);

        return redirect()->back()->with('success', 'Your consultation request has been submitted successfully! We will contact you soon.');
    }

    public function show($id)
    {
        $consultation = Consultation::with('assignedAdmin')->findOrFail($id);
        return view('admin.consultations.show', compact('consultation'));
    }

    public function update(Request $request, $id)
    {
        $consultation = Consultation::findOrFail($id);
        
        $validated = $request->validate([
            'status' => 'required|string|in:pending,in_progress,resolved,closed',
            'admin_notes' => 'nullable|string',
            'assigned_to' => 'nullable|exists:admins,id',
        ]);

        $consultation->update($validated);
        
        $this->logActivity('update', 'consultations', $consultation->id, "Updated consultation from: {$consultation->name}");

        return redirect()->route('consultations.index')
            ->with('success', 'Consultation updated successfully.');
    }

    public function destroy($id)
    {
        $consultation = Consultation::findOrFail($id);
        $name = $consultation->name;
        $consultation->delete();
        
        $this->logActivity('delete', 'consultations', null, "Deleted consultation from: {$name}");

        return redirect()->route('consultations.index')
            ->with('success', 'Consultation deleted successfully.');
    }
}
