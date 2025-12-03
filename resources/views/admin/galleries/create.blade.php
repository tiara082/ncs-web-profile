@extends('admin.layout')

@section('title', 'Upload Media')

@section('content')
<div class="page-header">
    <h1 class="page-title">Upload Media</h1>
    <p class="page-subtitle">Upload gambar atau video ke gallery</p>
</div>

<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">Form Upload Media</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('galleries.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    
                    <div class="mb-3">
                        <label for="title" class="form-label">Judul <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror" 
                               id="title" name="title" value="{{ old('title') }}" required>
                        @error('title')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label">Deskripsi</label>
                        <textarea class="form-control @error('description') is-invalid @enderror" 
                                  id="description" name="description" rows="3">{{ old('description') }}</textarea>
                        @error('description')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="gallery_type" class="form-label">Tipe Gallery <span class="text-danger">*</span></label>
                        <select class="form-select @error('gallery_type') is-invalid @enderror" 
                                id="gallery_type" name="gallery_type" required>
                            <option value="">Pilih Tipe</option>
                            <option value="image" {{ old('gallery_type') == 'image' ? 'selected' : '' }}>Image</option>
                            <option value="video" {{ old('gallery_type') == 'video' ? 'selected' : '' }}>Video</option>
                            <option value="document" {{ old('gallery_type') == 'document' ? 'selected' : '' }}>Document</option>
                        </select>
                        @error('gallery_type')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="file" class="form-label">File <span class="text-danger">*</span></label>
                        <input type="file" class="form-control @error('file') is-invalid @enderror" 
                               id="file" name="file" required accept="image/*,video/*">
                        <small class="text-muted">Max: 20MB. Format: JPG, PNG, GIF, MP4, MOV, AVI</small>
                        @error('file')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-upload"></i> Upload
                        </button>
                        <a href="{{ route('galleries.index') }}" class="btn btn-secondary">
                            <i class="fas fa-arrow-left"></i> Kembali
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
