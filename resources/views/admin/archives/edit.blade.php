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
                        <label for="title" class="form-label">Title <span class="text-danger">*</span></label>
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
                        <label for="category" class="form-label">Category <span class="text-danger">*</span></label>
                        <select class="form-select" id="category" name="category" required>
                            <option value="">Select Category</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->name }}" {{ old('category', $archive->category) == $category->name ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                        <small class="text-muted">
                            Categories are managed by superadmin. 
                            @if(Auth::user()->role === 'superadmin')
                                <a href="{{ route('categories.index') }}" target="_blank">Manage Categories</a>
                            @endif
                        </small>
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control" id="description" name="description" rows="3">{{ old('description', $archive->description) }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label for="keywords" class="form-label">Keywords</label>
                        <textarea class="form-control" id="keywords" name="keywords" rows="2" placeholder="e.g., machine learning, artificial intelligence, neural networks">{{ old('keywords', $archive->keywords) }}</textarea>
                        <small class="text-muted">Separate keywords with commas. Max 1000 characters.</small>
                    </div>

                    <div class="mb-3">
                        <label for="doi" class="form-label">DOI (Digital Object Identifier)</label>
                        <input type="text" class="form-control" id="doi" name="doi" value="{{ old('doi', $archive->doi) }}" placeholder="e.g., 10.1000/182">
                        <small class="text-muted">Format: 10.xxxx/xxxxx. Example: 10.1000/182</small>
                    </div>

                    <div class="mb-3">
                        <label for="issn_journal" class="form-label">ISSN Journal</label>
                        <input type="text" class="form-control" id="issn_journal" name="issn_journal" value="{{ old('issn_journal', $archive->issn_journal) }}" placeholder="e.g., 1234-5678">
                        <small class="text-muted">Format: 4 digits-4 digits (e.g., 1234-5678)</small>
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
                        <label class="form-label">
                            <i class="fas fa-image me-2 text-primary"></i>Cover Image for Research Documents Page
                        </label>
                        @if($archive->cover_image)
                            <div class="mb-3 p-3 bg-light rounded">
                                <p class="text-muted mb-2"><strong>Current Cover Image:</strong></p>
                                <img src="{{ $archive->cover_image_url }}" alt="Current Cover" 
                                     style="max-width: 200px; border-radius: 8px; box-shadow: 0 2px 8px rgba(0,0,0,0.1);"
                                     data-has-valid-image="{{ $archive->hasValidCoverImage() ? 'true' : 'false' }}">
                                <p class="text-success mt-2 mb-0">
                                    <i class="fas fa-check-circle me-1"></i>
                                    This image is displayed on the research-documents page
                                </p>
                            </div>
                        @else
                            <div class="mb-3 p-3 bg-warning bg-opacity-10 border border-warning rounded">
                                <p class="text-warning mb-0">
                                    <i class="fas fa-exclamation-triangle me-1"></i>
                                    No cover image set. A default image will be used on the research-documents page.
                                </p>
                            </div>
                        @endif
                        <label for="cover_image" class="form-label">Upload New Cover Image (Optional)</label>
                        <input type="file" class="form-control" id="cover_image" name="cover_image" accept="image/*">
                        <small class="text-muted">
                            <i class="fas fa-info-circle me-1"></i>
                            Max: 2MB (JPG, PNG). Recommended size: 400x600px. This will replace the current image.
                        </small>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Current File</label>
                        <p>{{ basename($archive->file_path) }} <a href="{{ asset('storage/' . $archive->file_path) }}" target="_blank"><i class="fas fa-download"></i></a></p>
                        <label for="file" class="form-label">Upload New File (Optional)</label>
                        <input type="file" class="form-control" id="file" name="file" accept=".pdf,.doc,.docx,.xls,.xlsx,.zip,.rar">
                        <small class="text-muted">Max: 50MB</small>
                    </div>

                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Update</button>
                        <a href="{{ route('archives.index') }}" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Back</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
