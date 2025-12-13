@extends('admin.layout')

@section('title', 'Administrators')

@section('content')
<div class="page-header d-flex justify-content-between align-items-center">
    <div>
        <h1 class="page-title">Administrators</h1>
        <p class="page-subtitle">Manage administrator accounts</p>
    </div>
    <div>
        <a href="{{ route('administrators.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> Add Admin
        </a>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover data-table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Tanggal Dibuat</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($admins as $admin)
                        <tr>
                            <td>{{ $loop->iteration + ($admins->currentPage() - 1) * $admins->perPage() }}</td>
                            <td><strong>{{ $admin->username }}</strong></td>
                            <td>{{ $admin->email }}</td>
                            <td>
                                <span class="badge {{ $admin->role === 'superadmin' ? 'bg-danger' : 'bg-primary' }}">
                                    {{ $admin->role === 'superadmin' ? 'Super Admin' : 'Admin' }}
                                </span>
                            </td>
                            <td>{{ $admin->created_at->format('d M Y') }}</td>
                            <td>
                                <div class="btn-group btn-group-sm" role="group">
                                    <a href="{{ route('administrators.show', $admin) }}" class="btn btn-info"><i class="fas fa-eye"></i></a>
                                    <a href="{{ route('administrators.edit', $admin) }}" class="btn btn-warning"><i class="fas fa-edit"></i></a>
                                    <form action="{{ route('administrators.destroy', $admin) }}" method="POST" class="d-inline" onsubmit="return confirmDelete(event)">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center py-4 text-muted">
                                <i class="fas fa-inbox fa-3x mb-3 d-block"></i>
                                Belum ada admin
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
