@extends('admin.layout')

@section('title', 'Detail Archive')

@section('content')
<div class="page-header">
    <h1 class="page-title">Detail Archive</h1>
</div>

<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">{{ $archive->title }}</h5>
                <a href="{{ route('archives.edit', $archive) }}" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i> Edit</a>
            </div>
            <div class="card-body">
                <table class="table table-borderless">
                    <tr>
                        <td width="200"><strong>Category</strong></td>
                        <td><span class="badge bg-secondary">{{ $archive->category }}</span></td>
                    </tr>
                    <tr>
                        <td><strong>Deskripsi</strong></td>
                        <td>{{ $archive->description ?? '-' }}</td>
                    </tr>
                    <tr>
                        <td><strong>File</strong></td>
                        <td><a href="{{ asset('storage/' . $archive->file_path) }}" target="_blank" class="btn btn-sm btn-primary"><i class="fas fa-download"></i> Download</a></td>
                    </tr>
                    <tr>
                        <td><strong>Uploaded By</strong></td>
                        <td>{{ $archive->admin->username ?? '-' }}</td>
                    </tr>
                    <tr>
                        <td><strong>Ditambahkan</strong></td>
                        <td>{{ $archive->created_at->format('d M Y H:i') }}</td>
                    </tr>
                </table>

                <div class="mt-4">
                    <a href="{{ route('archives.index') }}" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Kembali</a>
                    <form action="{{ route('archives.destroy', $archive) }}" method="POST" class="d-inline" onsubmit="return confirmDelete(event)">
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
