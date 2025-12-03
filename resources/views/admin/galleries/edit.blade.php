@extends('admin.layout')

@section('title', 'Edit Gallery')

@section('content')
<div class="page-header">
    <h1 class="page-title">Edit Gallery</h1>
</div>

<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('galleries.update', $gallery) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    
                    <div class="mb-3">
                        <label for="title" class="form-label">Judul <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $gallery->title) }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label">Deskripsi</label>
                        <textarea class="form-control" id="description" name="description" rows="3">{{ old('description', $gallery->description) }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label for="gallery_type" class="form-label">Tipe Gallery <span class="text-danger">*</span></label>
                        <select class="form-select" id="gallery_type" name="gallery_type" required>
                            <option value="image" {{ $gallery->gallery_type == 'image' ? 'selected' : '' }}>Image</option>
                            <option value="video" {{ $gallery->gallery_type == 'video' ? 'selected' : '' }}>Video</option>
                            <option value="document" {{ $gallery->gallery_type == 'document' ? 'selected' : '' }}>Document</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">File Saat Ini</label>
                        <div class="mb-2">
                            @if(in_array(pathinfo($gallery->file_path, PATHINFO_EXTENSION), ['jpg', 'jpeg', 'png', 'gif']))
                                <img src="{{ asset('storage/' . $gallery->file_path) }}" alt="{{ $gallery->title }}" style="max-width: 300px;">
                            @else
                                <p>{{ basename($gallery->file_path) }}</p>
                            @endif
                        </div>
                        <label for="file" class="form-label">Upload File Baru (Opsional)</label>
                        <input type="file" class="form-control" id="file" name="file" accept="image/*,video/*">
                        <small class="text-muted">Max: 20MB</small>
                    </div>

                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Update</button>
                        <a href="{{ route('galleries.index') }}" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Kembali</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
