@extends('admin.layout')

@section('title', 'Consultation Details')

@section('content')
<div class="page-header">
    <h1 class="page-title">Consultation Request Details</h1>
</div>

<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">Request Information</h5>
            </div>
            <div class="card-body">
                <table class="table table-borderless">
                    <tr>
                        <td width="200"><strong>Name</strong></td>
                        <td>{{ $consultation->name }}</td>
                    </tr>
                    <tr>
                        <td><strong>Email</strong></td>
                        <td><a href="mailto:{{ $consultation->email }}">{{ $consultation->email }}</a></td>
                    </tr>
                    <tr>
                        <td><strong>Phone</strong></td>
                        <td>{{ $consultation->phone ?? '-' }}</td>
                    </tr>
                    <tr>
                        <td><strong>Company</strong></td>
                        <td>{{ $consultation->company ?? '-' }}</td>
                    </tr>
                    <tr>
                        <td><strong>Service</strong></td>
                        <td><span class="badge bg-primary">{{ $consultation->subject }}</span></td>
                    </tr>
                    <tr>
                        <td><strong>Submitted</strong></td>
                        <td>{{ $consultation->created_at->format('d M Y H:i') }}</td>
                    </tr>
                </table>

                <hr>

                <div class="mb-3">
                    <strong>Message:</strong>
                    <div class="mt-2 p-3 bg-light rounded">
                        {{ $consultation->message }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">Update Status</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('consultations.update', $consultation->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    
                    <div class="mb-3">
                        <label for="status" class="form-label">Status</label>
                        <select class="form-select" id="status" name="status" required>
                            <option value="pending" {{ $consultation->status == 'pending' ? 'selected' : '' }}>Pending</option>
                            <option value="in_progress" {{ $consultation->status == 'in_progress' ? 'selected' : '' }}>In Progress</option>
                            <option value="resolved" {{ $consultation->status == 'resolved' ? 'selected' : '' }}>Resolved</option>
                            <option value="closed" {{ $consultation->status == 'closed' ? 'selected' : '' }}>Closed</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="assigned_to" class="form-label">Assign To</label>
                        <select class="form-select" id="assigned_to" name="assigned_to">
                            <option value="">Unassigned</option>
                            @foreach(\App\Models\Admin::all() as $admin)
                                <option value="{{ $admin->id }}" {{ $consultation->assigned_to == $admin->id ? 'selected' : '' }}>
                                    {{ $admin->username }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="admin_notes" class="form-label">Admin Notes</label>
                        <textarea class="form-control" id="admin_notes" name="admin_notes" rows="4">{{ $consultation->admin_notes }}</textarea>
                    </div>

                    <button type="submit" class="btn btn-primary w-100"><i class="fas fa-save"></i> Update</button>
                </form>

                <hr>

                <a href="{{ route('consultations.index') }}" class="btn btn-secondary w-100"><i class="fas fa-arrow-left"></i> Back to List</a>
            </div>
        </div>
    </div>
</div>
@endsection
