@extends('admin.layout')

@section('title', 'Detail Member')

@section('content')
<div class="page-header">
    <h1 class="page-title">Detail Member</h1>
    <p class="page-subtitle">Informasi lengkap anggota laboratorium</p>
</div>

<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Informasi Member</h5>
                <div>
                    <a href="{{ route('members.edit', $member) }}" class="btn btn-sm btn-warning">
                        <i class="fas fa-edit"></i> Edit
                    </a>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-borderless">
                    <tbody>
                        <tr>
                            <td width="200"><strong>Nama Lengkap</strong></td>
                            <td>{{ $member->member_name }}</td>
                        </tr>
                        <tr>
                            <td><strong>Role/Posisi</strong></td>
                            <td><span class="badge bg-primary">{{ $member->member_role }}</span></td>
                        </tr>
                        <tr>
                            <td><strong>Email</strong></td>
                            <td>{{ $member->member_email ?? '-' }}</td>
                        </tr>
                        <tr>
                            <td><strong>Nomor Telepon</strong></td>
                            <td>{{ $member->member_phone ?? '-' }}</td>
                        </tr>
                        <tr>
                            <td><strong>Alamat</strong></td>
                            <td>{{ $member->member_address ?? '-' }}</td>
                        </tr>
                        <tr>
                            <td><strong>Ditambahkan</strong></td>
                            <td>{{ $member->created_at->format('d M Y H:i') }}</td>
                        </tr>
                        <tr>
                            <td><strong>Terakhir Diupdate</strong></td>
                            <td>{{ $member->updated_at->format('d M Y H:i') }}</td>
                        </tr>
                    </tbody>
                </table>

                <div class="mt-4">
                    <a href="{{ route('members.index') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left"></i> Kembali
                    </a>
                    <form action="{{ route('members.destroy', $member) }}" method="POST" class="d-inline" onsubmit="return confirmDelete(event)">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">
                            <i class="fas fa-trash"></i> Hapus
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
