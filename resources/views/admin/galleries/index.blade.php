@extends('admin.layout')

@section('title', 'Gallery')

@section('content')
<div class="page-header d-flex justify-content-between align-items-center">
    <div>
        <h1 class="page-title">Gallery</h1>
        <p class="page-subtitle">Kelola media dan gambar</p>
    </div>
    <div>
        <a href="{{ route('galleries.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> Upload Media
        </a>
    </div>
</div>

<div class="row">
    @forelse($galleries as $gallery)
        <div class="col-md-3 mb-4">
            <div class="card h-100">
                @if(in_array(pathinfo($gallery->file_path, PATHINFO_EXTENSION), ['jpg', 'jpeg', 'png', 'gif']))
                    <img src="{{ asset('storage/' . $gallery->file_path) }}" class="card-img-top" alt="{{ $gallery->title }}" style="height: 200px; object-fit: cover;">
                @else
                    <div class="card-img-top bg-secondary d-flex align-items-center justify-content-center" style="height: 200px;">
                        <i class="fas fa-file fa-4x text-white"></i>
                    </div>
                @endif
                <div class="card-body">
                    <h6 class="card-title">{{ Str::limit($gallery->title, 30) }}</h6>
                    <p class="card-text text-muted small">{{ Str::limit($gallery->description, 50) }}</p>
                    <span class="badge bg-info">{{ $gallery->gallery_type }}</span>
                </div>
                <div class="card-footer bg-white">
                    <div class="btn-group btn-group-sm w-100" role="group">
                        <a href="{{ route('galleries.show', $gallery) }}" class="btn btn-info">
                            <i class="fas fa-eye"></i>
                        </a>
                        <a href="{{ route('galleries.edit', $gallery) }}" class="btn btn-warning">
                            <i class="fas fa-edit"></i>
                        </a>
                        <form action="{{ route('galleries.destroy', $gallery) }}" method="POST" class="d-inline" onsubmit="return confirmDelete(event)">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">
                                <i class="fas fa-trash"></i>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @empty
        <div class="col-12">
            <div class="alert alert-info text-center">
                <i class="fas fa-inbox fa-3x mb-3 d-block"></i>
                Belum ada media di gallery
            </div>
        </div>
    @endforelse
</div>

@if($galleries->hasPages())
    <div class="d-flex justify-content-center">
        {{ $galleries->links() }}
    </div>
@endif
@endsection
