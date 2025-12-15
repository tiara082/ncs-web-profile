@extends('admin.layout')

@section('title', 'Add Archive')

@section('content')
<div class="page-header">
    <h1 class="page-title">Add Archive</h1>
</div>

<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('archives.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    
                    <div class="mb-3">
                        <label for="title" class="form-label">Title <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="type" class="form-label">Type <span class="text-danger">*</span></label>
                        <select class="form-select" id="type" name="type" required>
                            <option value="document" {{ old('type') == 'document' ? 'selected' : '' }}>Document</option>
                            <option value="research" {{ old('type') == 'research' ? 'selected' : '' }}>Research</option>
                            <option value="publication" {{ old('type') == 'publication' ? 'selected' : '' }}>Publication</option>
                        </select>
                        <small class="text-muted">Research/Publication will appear on the frontend research documents page</small>
                    </div>

                    <div class="mb-3">
                        <label for="category" class="form-label">Category <span class="text-danger">*</span></label>
                        <select class="form-select" id="category" name="category" required>
                            <option value="">Select Category</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->name }}" {{ old('category') == $category->name ? 'selected' : '' }}>
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
                        <textarea class="form-control" id="description" name="description" rows="3">{{ old('description') }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label for="keywords" class="form-label">Keywords</label>
                        <textarea class="form-control" id="keywords" name="keywords" rows="2" placeholder="e.g., machine learning, artificial intelligence, neural networks">{{ old('keywords') }}</textarea>
                        <small class="text-muted">Separate keywords with commas. Max 1000 characters.</small>
                    </div>

                    <div class="mb-3">
                        <label for="doi" class="form-label">DOI (Digital Object Identifier)</label>
                        <input type="text" class="form-control" id="doi" name="doi" value="{{ old('doi') }}" placeholder="e.g., 10.1000/182">
                        <small class="text-muted">Format: 10.xxxx/xxxxx. Example: 10.1000/182</small>
                    </div>

                    <div class="mb-3">
                        <label for="issn_journal" class="form-label">ISSN Journal</label>
                        <input type="text" class="form-control" id="issn_journal" name="issn_journal" value="{{ old('issn_journal') }}" placeholder="e.g., 1234-5678">
                        <small class="text-muted">Format: 4 digits-4 digits (e.g., 1234-5678)</small>
                    </div>

                    <div class="mb-3">
                        <label for="publication" class="form-label">Publication/Journal</label>
                        <input type="text" class="form-control" id="publication" name="publication" value="{{ old('publication') }}" placeholder="e.g., IEEE Transactions on Network Security">
                        <small class="text-muted">For research/publication types</small>
                    </div>

                    <div class="mb-3">
                        <label for="year" class="form-label">Year</label>
                        <input type="text" class="form-control" id="year" name="year" value="{{ old('year', date('Y')) }}" placeholder="e.g., 2024" maxlength="4">
                    </div>

                    <div class="mb-3">
                        <label for="author_id" class="form-label">Author (Member)</label>
                        <select class="form-select" id="author_id" name="author_id">
                            <option value="">Select Author</option>
                            @foreach(\App\Models\Members::all() as $member)
                                <option value="{{ $member->id }}" 
                                    {{ old('author_id', Auth::user()->member_id) == $member->id ? 'selected' : '' }}>
                                    {{ $member->member_name }} - {{ $member->member_role }}
                                </option>
                            @endforeach
                        </select>
                        <small class="text-muted">
                            @if(Auth::user()->member)
                                Defaults to your profile: {{ Auth::user()->member->member_name }}
                            @else
                                For research/publication types
                            @endif
                        </small>
                    </div>

                    <div class="mb-3">
                        <label for="cover_image" class="form-label">
                            <i class="fas fa-image me-2 text-primary"></i>Cover Image
                        </label>
                        <input type="file" class="form-control" id="cover_image" name="cover_image" accept="image/*">
                        <small class="text-muted">
                            <i class="fas fa-info-circle me-1"></i>
                            <strong>Important:</strong> This image will be displayed on the research-documents page. 
                            Max: 2MB (JPG, PNG). Recommended size: 400x600px for best display.
                        </small>
                    </div>

                    <div class="mb-3">
                        <label for="file" class="form-label">File <span class="text-danger">*</span></label>
                        <input type="file" class="form-control" id="file" name="file" required accept=".pdf,.doc,.docx,.xls,.xlsx,.zip,.rar">
                        <small class="text-muted">Max: 50MB. Format: PDF, DOC, DOCX, XLS, XLSX, ZIP, RAR</small>
                    </div>

                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Save</button>
                        <a href="{{ route('archives.index') }}" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Back</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
