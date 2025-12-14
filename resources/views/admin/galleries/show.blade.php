@extends('admin.layout')

@section('title', 'Detail Gallery')

@section('content')
<div class="page-header">
    <h1 class="page-title">Detail Gallery</h1>
</div>

<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">{{ $gallery->title }}</h5>
                <a href="{{ route('galleries.edit', $gallery) }}" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i> Edit</a>
            </div>
            <div class="card-body">
                <div class="mb-4 text-center">
                    @if(in_array(pathinfo($gallery->file_path, PATHINFO_EXTENSION), ['jpg', 'jpeg', 'png', 'gif']))
                        <img src="{{ $gallery->image_url }}" alt="{{ $gallery->title }}" class="img-fluid" style="max-height: 500px;" data-has-valid-image="{{ $gallery->hasValidImage() ? 'true' : 'false' }}">
                    @else
                        <i class="fas fa-file fa-5x text-secondary"></i>
                        <p class="mt-3">{{ basename($gallery->file_path) }}</p>
                    @endif
                </div>

                <table class="table table-borderless">
                    <tr>
                        <td width="200"><strong>Tipe</strong></td>
                        <td><span class="badge bg-info">{{ $gallery->gallery_type }}</span></td>
                    </tr>
                    <tr>
                        <td><strong>Deskripsi</strong></td>
                        <td>{{ $gallery->description ?? '-' }}</td>
                    </tr>
                    <tr>
                        <td><strong>Uploaded By</strong></td>
                        <td>{{ $gallery->admin->username ?? '-' }}</td>
                    </tr>
                    <tr>
                        <td><strong>Ditambahkan</strong></td>
                        <td>{{ $gallery->created_at->format('d M Y H:i') }}</td>
                    </tr>
                </table>

                <div class="mt-4">
                    <a href="{{ route('galleries.index') }}" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Kembali</a>
                    <form action="{{ route('galleries.destroy', $gallery) }}" method="POST" class="d-inline" onsubmit="return confirmDelete(event)">
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
