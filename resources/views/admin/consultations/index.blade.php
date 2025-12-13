@extends('admin.layout')

@section('title', 'Consultation Requests')

@section('content')
<div class="page-header d-flex justify-content-between align-items-center">
    <div>
        <h1 class="page-title">Consultation Requests</h1>
        <p class="page-subtitle">Manage consultation and service inquiries</p>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover data-table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Company</th>
                        <th>Subject</th>
                        <th>Status</th>
                        <th>Assigned To</th>
                        <th>Date</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($consultations as $consultation)
                        <tr>
                            <td>{{ $loop->iteration + ($consultations->currentPage() - 1) * $consultations->perPage() }}</td>
                            <td>
                                <strong>{{ $consultation->name }}</strong><br>
                                <small class="text-muted">{{ $consultation->email }}</small>
                            </td>
                            <td>{{ $consultation->company ?? '-' }}</td>
                            <td>{{ $consultation->subject }}</td>
                            <td>
                                <span class="badge bg-{{ 
                                    $consultation->status == 'pending' ? 'warning' : 
                                    ($consultation->status == 'in_progress' ? 'info' : 
                                    ($consultation->status == 'resolved' ? 'success' : 'secondary')) 
                                }}">
                                    {{ ucfirst(str_replace('_', ' ', $consultation->status)) }}
                                </span>
                            </td>
                            <td>
                                @if($consultation->assignedAdmin)
                                    {{ $consultation->assignedAdmin->username }}
                                @else
                                    <span class="text-muted">Unassigned</span>
                                @endif
                            </td>
                            <td>{{ $consultation->created_at->format('d M Y') }}</td>
                            <td>
                                <div class="btn-group btn-group-sm">
                                    <a href="{{ route('consultations.show', $consultation->id) }}" class="btn btn-info"><i class="fas fa-eye"></i></a>
                                    <form action="{{ route('consultations.destroy', $consultation->id) }}" method="POST" class="d-inline" onsubmit="return confirmDelete(event)">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="text-center py-4 text-muted">
                                <i class="fas fa-inbox fa-3x mb-3 d-block"></i>
                                No consultation requests yet
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

    </div>
</div>
@endsection
