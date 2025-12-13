@extends('admin.layout')

@section('title', 'View Community Service')

@section('content')
<div class="page-header">
    <h1 class="page-title">Community Service Details</h1>
    <p class="page-subtitle">View community service event information</p>
</div>

<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0"><i class="fas fa-hands-helping"></i> {{ $communityService->title }}</h5>
        <div>
            <a href="{{ route('community-services.edit', $communityService->id) }}" class="btn btn-warning btn-sm">
                <i class="fas fa-edit"></i> Edit
            </a>
            <a href="{{ route('community-services.index') }}" class="btn btn-secondary btn-sm">
                <i class="fas fa-arrow-left"></i> Back to List
            </a>
        </div>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-8">
                <!-- Event Details -->
                <div class="mb-4">
                    <h6 class="text-primary mb-3"><i class="fas fa-info-circle"></i> Event Information</h6>
                    <div class="row">
                        <div class="col-sm-3"><strong>Title:</strong></div>
                        <div class="col-sm-9">{{ $communityService->title }}</div>
                    </div>
                    <hr class="my-2">
                    <div class="row">
                        <div class="col-sm-3"><strong>Description:</strong></div>
                        <div class="col-sm-9">{{ $communityService->description }}</div>
                    </div>
                    <hr class="my-2">
                    <div class="row">
                        <div class="col-sm-3"><strong>Date:</strong></div>
                        <div class="col-sm-9">
                            <span class="fw-bold">{{ $communityService->date->format('l, d F Y') }}</span>
                            <small class="text-muted">({{ $communityService->date->diffForHumans() }})</small>
                        </div>
                    </div>
                    <hr class="my-2">
                    <div class="row">
                        <div class="col-sm-3"><strong>Location:</strong></div>
                        <div class="col-sm-9">{{ $communityService->location }}</div>
                    </div>
                    <hr class="my-2">
                    <div class="row">
                        <div class="col-sm-3"><strong>Participants:</strong></div>
                        <div class="col-sm-9">
                            <span class="fw-bold text-primary">{{ $communityService->participants }}</span> people
                        </div>
                    </div>
                </div>

                <!-- Category & Status -->
                <div class="mb-4">
                    <h6 class="text-primary mb-3"><i class="fas fa-tags"></i> Category & Status</h6>
                    <div class="row">
                        <div class="col-sm-3"><strong>Category:</strong></div>
                        <div class="col-sm-9">
                            <span class="badge bg-primary">
                                {{ ucfirst($communityService->category) }}
                            </span>
                        </div>
                    </div>
                    <hr class="my-2">
                    <div class="row">
                        <div class="col-sm-3"><strong>Status:</strong></div>
                        <div class="col-sm-9">
                            @if($communityService->status === 'completed')
                                <span class="badge bg-success">Completed</span>
                            @elseif($communityService->status === 'ongoing')
                                <span class="badge bg-warning">Ongoing</span>
                            @else
                                <span class="badge bg-info">Upcoming</span>
                            @endif
                        </div>
                    </div>
                </div>

                <!-- Admin Information -->
                <div class="mb-4">
                    <h6 class="text-primary mb-3"><i class="fas fa-user-shield"></i> Created By</h6>
                    <div class="d-flex align-items-center">
                        <div class="bg-primary rounded-circle me-3 d-flex align-items-center justify-content-center" style="width: 50px; height: 50px;">
                            <i class="fas fa-user text-white"></i>
                        </div>
                        <div>
                            <div class="fw-bold">{{ $communityService->admin->name ?? $communityService->admin->username ?? 'Admin' }}</div>
                            <small class="text-muted">
                                Created on {{ $communityService->created_at->format('d F Y \a\t H:i') }}
                                @if($communityService->updated_at != $communityService->created_at)
                                    <br>Last updated {{ $communityService->updated_at->diffForHumans() }}
                                @endif
                            </small>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <!-- Event Image -->
                @if($communityService->image)
                <div class="mb-4">
                    <h6 class="text-primary mb-3"><i class="fas fa-image"></i> Event Image</h6>
                    <div class="border rounded p-2">
                        <img src="{{ asset('storage/' . $communityService->image) }}" 
                             alt="{{ $communityService->title }}" 
                             class="img-fluid rounded w-100">
                    </div>
                </div>
                @endif

                <!-- Quick Stats -->
                <div class="mb-4">
                    <h6 class="text-primary mb-3"><i class="fas fa-chart-bar"></i> Quick Stats</h6>
                    <div class="row g-2">
                        <div class="col-6">
                            <div class="card bg-primary text-white text-center">
                                <div class="card-body py-3">
                                    <h4 class="mb-1">{{ $communityService->participants }}</h4>
                                    <small>Participants</small>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="card bg-info text-white text-center">
                                <div class="card-body py-3">
                                    <h4 class="mb-1">{{ $communityService->date->diffInDays(now()) >= 0 ? $communityService->date->diffInDays(now()) : 0 }}</h4>
                                    <small>Days {{ $communityService->date->isPast() ? 'Ago' : 'Left' }}</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Actions -->
                <div class="mb-4">
                    <h6 class="text-primary mb-3"><i class="fas fa-cogs"></i> Actions</h6>
                    <div class="d-grid gap-2">
                        <a href="{{ route('community-services.edit', $communityService->id) }}" class="btn btn-warning">
                            <i class="fas fa-edit"></i> Edit Service
                        </a>
                        <button type="button" class="btn btn-danger" onclick="confirmDelete({{ $communityService->id }}, '{{ $communityService->title }}')">
                            <i class="fas fa-trash"></i> Delete Service
                        </button>
                    </div>
                    <form id="delete-form-{{ $communityService->id }}" action="{{ route('community-services.destroy', $communityService->id) }}" method="POST" class="d-none">
                        @csrf
                        @method('DELETE')
                    </form>
                </div>
            </div>
        </div>
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
</script>
@endsection