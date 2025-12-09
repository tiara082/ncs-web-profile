@extends('admin.layout')

@section('title', 'Edit Archive')

@section('content')
<div class="page-header">
    <h1 class="page-title">Edit Archive</h1>
</div>

<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('archives.update', $archive) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    
                    <div class="mb-3">
                        <label for="title" class="form-label">Judul <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $archive->title) }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="type" class="form-label">Type <span class="text-danger">*</span></label>
                        <select class="form-select" id="type" name="type" required>
                            <option value="document" {{ old('type', $archive->type) == 'document' ? 'selected' : '' }}>Document</option>
                            <option value="research" {{ old('type', $archive->type) == 'research' ? 'selected' : '' }}>Research</option>
                            <option value="publication" {{ old('type', $archive->type) == 'publication' ? 'selected' : '' }}>Publication</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="categories" class="form-label">Categories <span class="text-danger">*</span></label>
                        <select class="form-select @error('categories') is-invalid @enderror" id="categories" name="categories[]" multiple size="5" required>
                            @foreach($categories as $cat)
                                <option value="{{ $cat->id }}" 
                                    {{ in_array($cat->id, old('categories', $archive->categories->pluck('id')->toArray())) ? 'selected' : '' }}>
                                    {{ $cat->name }}
                                </option>
                            @endforeach
                        </select>
                        <small class="text-muted">Hold Ctrl/Cmd to select multiple categories. <a href="{{ route('categories.index') }}" target="_blank">Manage categories</a></small>
                        @error('categories')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label">Deskripsi</label>
                        <textarea class="form-control" id="description" name="description" rows="3">{{ old('description', $archive->description) }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label for="publication" class="form-label">Publication/Journal</label>
                        <input type="text" class="form-control" id="publication" name="publication" value="{{ old('publication', $archive->publication) }}" placeholder="e.g., IEEE Transactions">
                    </div>

                    <div class="mb-3">
                        <label for="year" class="form-label">Year</label>
                        <input type="text" class="form-control" id="year" name="year" value="{{ old('year', $archive->year) }}" placeholder="e.g., 2024" maxlength="4">
                    </div>

                    <div class="mb-3">
                        <label for="author_id" class="form-label">Author (Member)</label>
                        <select class="form-select" id="author_id" name="author_id">
                            <option value="">Select Author</option>
                            @foreach(\App\Models\Members::all() as $member)
                                <option value="{{ $member->id }}" {{ old('author_id', $archive->author_id) == $member->id ? 'selected' : '' }}>
                                    {{ $member->member_name }} - {{ $member->member_role }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Cover Image Saat Ini</label>
                        @if($archive->cover_image)
                            <div class="mb-2">
                                <img src="{{ asset('storage/' . $archive->cover_image) }}" alt="Cover" style="max-width: 200px; border-radius: 8px;">
                            </div>
                        @endif
                        <label for="cover_image" class="form-label">Upload Cover Image Baru (Opsional)</label>
                        <input type="file" class="form-control" id="cover_image" name="cover_image" accept="image/*">
                        <small class="text-muted">Max: 2MB (JPG, PNG)</small>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">File Saat Ini</label>
                        <p>{{ basename($archive->file_path) }} <a href="{{ asset('storage/' . $archive->file_path) }}" target="_blank"><i class="fas fa-download"></i></a></p>
                        <label for="file" class="form-label">Upload File Baru (Opsional)</label>
                        <input type="file" class="form-control" id="file" name="file" accept=".pdf,.doc,.docx,.xls,.xlsx,.zip,.rar">
                        <small class="text-muted">Max: 50MB</small>
                    </div>

                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Update</button>
                        <a href="{{ route('archives.index') }}" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Kembali</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
