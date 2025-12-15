@extends('admin.layout')

@section('title', 'Activity Logs')

@section('content')
<div class="page-header d-flex justify-content-between align-items-center">
    <div>
        <h1 class="page-title">Activity Logs</h1>
        <p class="page-subtitle">Riwayat aktivitas administrator</p>
    </div>
    <div>
        <form action="{{ route('admin_logs.destroyAll') }}" method="POST" class="d-inline" onsubmit="return confirm('Delete semua log?')">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">
                <i class="fas fa-trash"></i> Delete Semua Log
            </button>
        </form>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover table-sm data-table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Admin</th>
                        <th>Action</th>
                        <th>Table</th>
                        <th>Record ID</th>
                        <th>Waktu</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($logs as $log)
                        <tr>
                            <td>{{ $loop->iteration + ($logs->currentPage() - 1) * $logs->perPage() }}</td>
                            <td>{{ $log->admin->username ?? '-' }}</td>
                            <td>
                                @if($log->action == 'create')
                                    <span class="badge bg-success">{{ $log->action }}</span>
                                @elseif($log->action == 'update')
                                    <span class="badge bg-warning">{{ $log->action }}</span>
                                @elseif($log->action == 'delete')
                                    <span class="badge bg-danger">{{ $log->action }}</span>
                                @else
                                    <span class="badge bg-secondary">{{ $log->action }}</span>
                                @endif
                            </td>
                            <td>{{ $log->table_name }}</td>
                            <td>{{ $log->record_id }}</td>
                            <td>{{ $log->created_at->format('d M Y H:i:s') }}</td>
                            <td>
                                <div class="btn-group btn-group-sm" role="group">
                                    <a href="{{ route('admin_logs.show', $log) }}" class="btn btn-info"><i class="fas fa-eye"></i></a>
                                    <form action="{{ route('admin_logs.destroy', $log) }}" method="POST" class="d-inline" onsubmit="return confirmDelete(event)">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center py-4 text-muted">
                                <i class="fas fa-inbox fa-3x mb-3 d-block"></i>
                                Belum ada log aktivitas
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        

    </div>
</div>
@endsection
