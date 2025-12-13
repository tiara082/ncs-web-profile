@extends('admin.layout')

@section('title', 'Events & Activities Management')

@section('content')
<div class="page-header d-flex justify-content-between align-items-center">
    <div>
        <h1 class="page-title">Events & Activities</h1>
        <p class="page-subtitle">Kelola agenda dan past activities</p>
    </div>
</div>

<!-- Agenda Section -->
<div class="card mb-4">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0"><i class="fas fa-calendar-alt"></i> Agenda (Upcoming Events)</h5>
        <a href="{{ route('galleries.create') }}?type=agenda" class="btn btn-primary btn-sm">
            <i class="fas fa-plus"></i> Tambah Agenda
        </a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Image</th>
                        <th>Title</th>
                        <th>Date & Time</th>
                        <th>Location</th>
                        <th>Slots</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($agendas as $agenda)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>
                                <img src="{{ asset('storage/' . $agenda->file_path) }}" alt="{{ $agenda->title }}" style="width: 60px; height: 60px; object-fit: cover; border-radius: 8px;">
                            </td>
                            <td>
                                <strong>{{ $agenda->title }}</strong><br>
                                <small class="text-muted">{{ Str::limit($agenda->description, 50) }}</small>
                            </td>
                            <td>
                                @if($agenda->event_date)
                                    <i class="fas fa-calendar"></i> {{ $agenda->event_date->format('d M Y') }}<br>
                                    @if($agenda->event_time)
                                        <i class="fas fa-clock"></i> {{ $agenda->event_time }}
                                    @endif
                                @else
                                    -
                                @endif
                            </td>
                            <td>
                                @if($agenda->event_mode)
                                    <span class="badge bg-{{ $agenda->event_mode == 'online' ? 'success' : ($agenda->event_mode == 'offline' ? 'danger' : 'warning') }}">
                                        {{ strtoupper($agenda->event_mode) }}
                                    </span><br>
                                @endif
                                <small>{{ $agenda->location ?? '-' }}</small>
                            </td>
                            <td>
                                @if($agenda->max_slots)
                                    {{ $agenda->registered_count }}/{{ $agenda->max_slots }}
                                @else
                                    -
                                @endif
                            </td>
                            <td>
                                <span class="badge bg-{{ $agenda->event_status == 'upcoming' ? 'primary' : ($agenda->event_status == 'ongoing' ? 'warning' : 'secondary') }}">
                                    {{ ucfirst($agenda->event_status) }}
                                </span>
                            </td>
                            <td>
                                <div class="btn-group btn-group-sm">
                                    <a href="{{ route('galleries.show', $agenda->id) }}" class="btn btn-info"><i class="fas fa-eye"></i></a>
                                    <a href="{{ route('galleries.edit', $agenda->id) }}" class="btn btn-warning"><i class="fas fa-edit"></i></a>
                                    <form action="{{ route('galleries.destroy', $agenda->id) }}" method="POST" class="d-inline" onsubmit="return confirmDelete(event)">
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
                                <i class="fas fa-calendar-times fa-3x mb-3 d-block"></i>
                                Belum ada agenda
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        {{ $agendas->links('custom.pagination') }}
    </div>
</div>

<!-- Past Activities Section -->
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0"><i class="fas fa-history"></i> Past Activities</h5>
        <a href="{{ route('galleries.create') }}?type=past_activity" class="btn btn-success btn-sm">
            <i class="fas fa-plus"></i> Tambah Past Activity
        </a>
    </div>
    <div class="card-body">
        <div class="row">
            @forelse($pastActivities as $activity)
                <div class="col-md-4 mb-4">
                    <div class="card h-100">
                        <img src="{{ asset('storage/' . $activity->file_path) }}" class="card-img-top" alt="{{ $activity->title }}" style="height: 200px; object-fit: cover;">
                        <div class="card-body">
                            <h6 class="card-title">{{ $activity->title }}</h6>
                            <p class="card-text text-muted small">{{ Str::limit($activity->description, 100) }}</p>
                            @if($activity->event_date)
                                <p class="small"><i class="fas fa-calendar"></i> {{ $activity->event_date->format('d M Y') }}</p>
                            @endif
                        </div>
                        <div class="card-footer bg-transparent">
                            <div class="btn-group btn-group-sm w-100">
                                <a href="{{ route('galleries.show', $activity->id) }}" class="btn btn-info"><i class="fas fa-eye"></i></a>
                                <a href="{{ route('galleries.edit', $activity->id) }}" class="btn btn-warning"><i class="fas fa-edit"></i></a>
                                <form action="{{ route('galleries.destroy', $activity->id) }}" method="POST" class="d-inline" onsubmit="return confirmDelete(event)">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center py-4 text-muted">
                    <i class="fas fa-images fa-3x mb-3 d-block"></i>
                    Belum ada past activities
                </div>
            @endforelse
        </div>
        {{ $pastActivities->links('custom.pagination') }}
    </div>
</div>
@endsection
