@extends('admin.layout')

@section('title', 'Detail Log')

@section('content')
<div class="page-header">
    <h1 class="page-title">Detail Activity Log</h1>
</div>

<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">Log #{{ $admin_log->id }}</h5>
            </div>
            <div class="card-body">
                <table class="table table-borderless">
                    <tr>
                        <td width="200"><strong>Admin</strong></td>
                        <td>{{ $admin_log->admin->username ?? '-' }}</td>
                    </tr>
                    <tr>
                        <td><strong>Action</strong></td>
                        <td>
                            @if($admin_log->action == 'create')
                                <span class="badge bg-success">{{ $admin_log->action }}</span>
                            @elseif($admin_log->action == 'update')
                                <span class="badge bg-warning">{{ $admin_log->action }}</span>
                            @elseif($admin_log->action == 'delete')
                                <span class="badge bg-danger">{{ $admin_log->action }}</span>
                            @else
                                <span class="badge bg-secondary">{{ $admin_log->action }}</span>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td><strong>Table Name</strong></td>
                        <td>{{ $admin_log->table_name }}</td>
                    </tr>
                    <tr>
                        <td><strong>Record ID</strong></td>
                        <td>{{ $admin_log->record_id }}</td>
                    </tr>
                    <tr>
                        <td><strong>Waktu</strong></td>
                        <td>{{ $admin_log->created_at->format('d M Y H:i:s') }}</td>
                    </tr>
                </table>

                <div class="mt-4">
                    <a href="{{ route('admin_logs.index') }}" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Kembali</a>
                    <form action="{{ route('admin_logs.destroy', $admin_log) }}" method="POST" class="d-inline" onsubmit="return confirmDelete(event)">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i> Hapus</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
