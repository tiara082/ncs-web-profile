@extends('admin.layout')

@section('title', 'Edit Community Service')

@section('content')
<div class="page-header">
    <h1 class="page-title">Edit Community Service</h1>
    <p class="page-subtitle">Update community service event details</p>
</div>

<div class="card">
    <div class="card-header">
        <h5 class="mb-0"><i class="fas fa-edit"></i> Edit: {{ $communityService->title }}</h5>
    </div>
    <div class="card-body">
        <form action="{{ route('community-services.update', $communityService->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            
            <div class="row">
                <div class="col-md-8">
                    <div class="mb-3">
                        <label for="title" class="form-label">Title <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror" 
                               id="title" name="title" value="{{ old('title', $communityService->title) }}" required>
                        @error('title')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label">Description <span class="text-danger">*</span></label>
                        <textarea class="form-control @error('description') is-invalid @enderror" 
                                  id="description" name="description" rows="4" required>{{ old('description', $communityService->description) }}</textarea>
                        @error('description')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="date" class="form-label">Date <span class="text-danger">*</span></label>
                                <input type="date" class="form-control @error('date') is-invalid @enderror" 
                                       id="date" name="date" value="{{ old('date', $communityService->date->format('Y-m-d')) }}" required>
                                @error('date')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="participants" class="form-label">Participants <span class="text-danger">*</span></label>
                                <input type="number" class="form-control @error('participants') is-invalid @enderror" 
                                       id="participants" name="participants" value="{{ old('participants', $communityService->participants) }}" min="0" required>
                                @error('participants')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="location" class="form-label">Location <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('location') is-invalid @enderror" 
                               id="location" name="location" value="{{ old('location', $communityService->location) }}" required>
                        @error('location')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="mb-3">
                        <label for="category" class="form-label">Category <span class="text-danger">*</span></label>
                        <select class="form-select @error('category') is-invalid @enderror" id="category" name="category" required>
                            <option value="">Select Category</option>
                            <option value="workshop" {{ old('category', $communityService->category) === 'workshop' ? 'selected' : '' }}>Workshop</option>
                            <option value="seminar" {{ old('category', $communityService->category) === 'seminar' ? 'selected' : '' }}>Seminar</option>
                            <option value="training" {{ old('category', $communityService->category) === 'training' ? 'selected' : '' }}>Training</option>
                            <option value="webinar" {{ old('category', $communityService->category) === 'webinar' ? 'selected' : '' }}>Webinar</option>
                            <option value="consultation" {{ old('category', $communityService->category) === 'consultation' ? 'selected' : '' }}>Consultation</option>
                        </select>
                        @error('category')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>



                    <div class="mb-3">
                        <label for="status" class="form-label">Status <span class="text-danger">*</span></label>
                        <select class="form-select @error('status') is-invalid @enderror" id="status" name="status" required>
                            <option value="">Select Status</option>
                            <option value="upcoming" {{ old('status', $communityService->status) === 'upcoming' ? 'selected' : '' }}>Upcoming</option>
                            <option value="ongoing" {{ old('status', $communityService->status) === 'ongoing' ? 'selected' : '' }}>Ongoing</option>
                            <option value="completed" {{ old('status', $communityService->status) === 'completed' ? 'selected' : '' }}>Completed</option>
                        </select>
                        @error('status')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Current Image -->
                    @if($communityService->image)
                    <div class="mb-3">
                        <label class="form-label">Current Image</label>
                        <div class="border rounded p-2">
                            <img src="{{ asset('storage/' . $communityService->image) }}" alt="{{ $communityService->title }}" 
                                 class="img-fluid rounded" style="max-height: 200px;">
                        </div>
                    </div>
                    @endif

                    <div class="mb-3">
                        <label for="image" class="form-label">{{ $communityService->image ? 'Change Image' : 'Add Image' }}</label>
                        <input type="file" class="form-control @error('image') is-invalid @enderror" 
                               id="image" name="image" accept="image/*">
                        <small class="form-text text-muted">Max file size: 2MB. Supported formats: JPG, JPEG, PNG, GIF</small>
                        @error('image')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Image Preview -->
                    <div id="imagePreview" class="mb-3" style="display: none;">
                        <label class="form-label">New Preview</label>
                        <div class="border rounded p-2">
                            <img id="previewImg" src="" alt="Preview" class="img-fluid rounded" style="max-height: 200px;">
                        </div>
                    </div>
                </div>
            </div>

            <div class="d-flex justify-content-between">
                <a href="{{ route('community-services.index') }}" class="btn btn-secondary">
                    <i class="fas fa-arrow-left"></i> Back to List
                </a>
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save"></i> Update Community Service
                </button>
            </div>
        </form>
    </div>
</div>
@endsection

@section('scripts')
<script>
    // Image preview functionality
    document.getElementById('image').addEventListener('change', function(e) {
        const file = e.target.files[0];
        const preview = document.getElementById('imagePreview');
        const previewImg = document.getElementById('previewImg');
        
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                previewImg.src = e.target.result;
                preview.style.display = 'block';
            };
            reader.readAsDataURL(file);
        } else {
            preview.style.display = 'none';
        }
    });


</script>
@endsection