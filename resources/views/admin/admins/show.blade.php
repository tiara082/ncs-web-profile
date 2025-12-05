@extends('admin.layout')

@section('title', 'Detail Administrator')

@section('content')
<div class="page-header">
    <h1 class="page-title">Detail Administrator</h1>
</div>

<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">{{ $admin->username }}</h5>
                <a href="{{ route('administrators.edit', $admin) }}" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i> Edit</a>
            </div>
            <div class="card-body">
                <table class="table table-borderless">
                    <tr>
                        <td width="200"><strong>Username</strong></td>
                        <td>{{ $admin->username }}</td>
                    </tr>
                    <tr>
                        <td><strong>Email</strong></td>
                        <td>{{ $admin->email }}</td>
                    </tr>
                    <tr>
                        <td><strong>Role</strong></td>
                        <td><span class="badge bg-primary">{{ ucfirst(str_replace('_', ' ', $admin->role)) }}</span></td>
                    </tr>
                    <tr>
                        <td><strong>Ditambahkan</strong></td>
                        <td>{{ $admin->created_at->format('d M Y H:i') }}</td>
                    </tr>
                    <tr>
                        <td><strong>Terakhir Diupdate</strong></td>
                        <td>{{ $admin->updated_at->format('d M Y H:i') }}</td>
                    </tr>
                </table>

                <div class="mt-4">
                    <a href="{{ route('administrators.index') }}" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Kembali</a>
                    <form action="{{ route('administrators.destroy', $admin) }}" method="POST" class="d-inline" onsubmit="return confirmDelete(event)">
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
