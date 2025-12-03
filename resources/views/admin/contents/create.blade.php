@extends('admin.layout')

@section('title', 'Tambah Content')

@section('content')
<div class="page-header">
    <h1 class="page-title">Tambah Content</h1>
    <p class="page-subtitle">Buat konten artikel atau publikasi baru</p>
</div>

<div class="row">
    <div class="col-md-10">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">Form Tambah Content</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('contents.store') }}" method="POST">
                    @csrf
                    
                    <div class="mb-3">
                        <label for="created_by" class="form-label">Pembuat</label>
                        <input type="text" class="form-control" value="{{ Auth::user()->name ?? Auth::user()->username }}" disabled>
                        <input type="hidden" name="created_by" value="{{ Auth::id() }}">
                    </div>

                    <div class="mb-3">
                        <label for="title" class="form-label">Judul <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror" 
                               id="title" name="title" value="{{ old('title') }}" required>
                        @error('title')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="content_type" class="form-label">Tipe Content <span class="text-danger">*</span></label>
                        <select class="form-select @error('content_type') is-invalid @enderror" 
                                id="content_type" name="content_type" required>
                            <option value="">Pilih Tipe</option>
                            <option value="article" {{ old('content_type') == 'article' ? 'selected' : '' }}>Article</option>
                            <option value="news" {{ old('content_type') == 'news' ? 'selected' : '' }}>News</option>
                            <option value="research" {{ old('content_type') == 'research' ? 'selected' : '' }}>Research</option>
                            <option value="publication" {{ old('content_type') == 'publication' ? 'selected' : '' }}>Publication</option>
                        </select>
                        @error('content_type')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="categories" class="form-label">Categories</label>
                        <select class="form-select @error('categories') is-invalid @enderror" 
                                id="categories" name="categories[]" multiple>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" 
                                    {{ in_array($category->id, old('categories', [])) ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                        <small class="text-muted">Tekan Ctrl/Cmd untuk memilih multiple categories</small>
                        @error('categories')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="body" class="form-label">Konten <span class="text-danger">*</span></label>
                        <textarea class="form-control @error('body') is-invalid @enderror" 
                                  id="body" name="body" rows="15" required>{{ old('body') }}</textarea>
                        @error('body')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save"></i> Simpan
                        </button>
                        <a href="{{ route('contents.index') }}" class="btn btn-secondary">
                            <i class="fas fa-arrow-left"></i> Kembali
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
