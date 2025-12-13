@extends('admin.layout')

@section('title', 'Community Services')

@section('content')
<div class="page-header">
    <h1 class="page-title">Community Services</h1>
    <p class="page-subtitle">Manage community service events and activities</p>
</div>

@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong><i class="fas fa-check-circle"></i> Success!</strong> {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0"><i class="fas fa-hands-helping"></i> Community Services</h5>
        <a href="{{ route('community-services.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> Add New Service
        </a>
    </div>
    <div class="card-body">
        @if($communityServices->count() > 0)
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Title</th>
                            <th>Date</th>
                            <th>Location</th>
                            <th>Category</th>
                            <th>Participants</th>
                            <th>Status</th>
                            <th>Created By</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($communityServices as $service)
                        <tr>
                            <td>{{ $loop->iteration + ($communityServices->currentPage() - 1) * $communityServices->perPage() }}</td>
                            <td>
                                <div class="d-flex align-items-center">
                                    @if($service->image)
                                        <img src="{{ asset('storage/' . $service->image) }}" alt="{{ $service->title }}" class="rounded me-2" style="width: 40px; height: 40px; object-fit: cover;">
                                    @else
                                        <div class="bg-primary rounded me-2 d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">
                                            <i class="fas fa-hands-helping text-white"></i>
                                        </div>
                                    @endif
                                    <div>
                                        <strong>{{ $service->title }}</strong>
                                        <br>
                                        <small class="text-muted">{{ Str::limit($service->description, 50) }}</small>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <span class="fw-bold">{{ $service->date->format('d M Y') }}</span>
                                <br>
                                <small class="text-muted">{{ $service->date->format('l') }}</small>
                            </td>
                            <td>{{ $service->location }}</td>
                            <td>
                                <span class="badge bg-primary">
                                    {{ ucfirst($service->category) }}
                                </span>
                            </td>
                            <td>
                                <span class="fw-bold">{{ $service->participants }}</span>
                                <small class="text-muted">people</small>
                            </td>
                            <td>
                                @if($service->status === 'completed')
                                    <span class="badge bg-success">Completed</span>
                                @elseif($service->status === 'ongoing')
                                    <span class="badge bg-warning">Ongoing</span>
                                @else
                                    <span class="badge bg-info">Upcoming</span>
                                @endif
                            </td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="bg-primary rounded-circle me-2 d-flex align-items-center justify-content-center" style="width: 30px; height: 30px;">
                                        <i class="fas fa-user text-white" style="font-size: 0.8rem;"></i>
                                    </div>
                                    <div>
                                        <small class="fw-bold">{{ $service->admin->name ?? $service->admin->username ?? 'Admin' }}</small>
                                        <br>
                                        <small class="text-muted">{{ $service->created_at->format('d M Y') }}</small>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="btn-group btn-group-sm" role="group">
                                    <a href="{{ route('community-services.show', $service->id) }}" class="btn btn-info" title="View">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="{{ route('community-services.edit', $service->id) }}" class="btn btn-warning" title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <button type="button" class="btn btn-danger" title="Delete" onclick="confirmDelete({{ $service->id }}, '{{ $service->title }}')">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div>
                                <form id="delete-form-{{ $service->id }}" action="{{ route('community-services.destroy', $service->id) }}" method="POST" class="d-none">
                                    @csrf
                                    @method('DELETE')
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            
            <!-- Pagination Links -->
            <div class="d-flex justify-content-center mt-4">
                {{ $communityServices->links('custom.pagination') }}
            </div>

        @else
            <div class="text-center py-5">
                <i class="fas fa-hands-helping fa-3x text-muted mb-3"></i>
                <h5 class="text-muted">No Community Services Found</h5>
                <p class="text-muted">Start by adding your first community service event.</p>
                <a href="{{ route('community-services.create') }}" class="btn btn-primary">
                    <i class="fas fa-plus"></i> Add New Service
                </a>
            </div>
        @endif
    </div>
</div>
@endsection

@section('scripts')
<script>
    function confirmDelete(id, title) {
        Swal.fire({
            title: 'Are you sure?',
            text: `You are about to delete "${title}". This action cannot be undone.`,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#ef4444',
            cancelButtonColor: '#6b7280',
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: 'Cancel',
            ...getSwalTheme()
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById(`delete-form-${id}`).submit();
            }
        });
    }

    // DataTable removed to use Laravel pagination instead
</script>
@endsection