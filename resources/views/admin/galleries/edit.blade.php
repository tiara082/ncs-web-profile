@extends('admin.layout')

@section('title', 'Edit ' . ($gallery->gallery_type == 'past_activity' ? 'Past Activity' : 'Agenda'))

@section('content')
<div class="page-header">
    <h1 class="page-title">Edit {{ $gallery->gallery_type == 'past_activity' ? 'Past Activity' : 'Agenda' }}</h1>
</div>

<div class="row">
    <div class="col-md-10">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('galleries.update', $gallery->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    
                    <input type="hidden" name="gallery_type" value="{{ $gallery->gallery_type }}">
                    
                    <div class="mb-3">
                        <label for="title" class="form-label">Title <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $gallery->title) }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control" id="description" name="description" rows="4">{{ old('description', $gallery->description) }}</textarea>
                    </div>

                    @if($gallery->gallery_type == 'agenda')
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="event_date" class="form-label">Event Date <span class="text-danger">*</span></label>
                                <input type="date" class="form-control" id="event_date" name="event_date" value="{{ old('event_date', $gallery->event_date?->format('Y-m-d')) }}" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="event_time" class="form-label">Event Time</label>
                                <input type="time" class="form-control" id="event_time" name="event_time" value="{{ old('event_time', $gallery->event_time) }}">
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="event_mode" class="form-label">Event Mode <span class="text-danger">*</span></label>
                            <select class="form-select" id="event_mode" name="event_mode" required>
                                <option value="">Select Mode</option>
                                <option value="online" {{ old('event_mode', $gallery->event_mode) == 'online' ? 'selected' : '' }}>Online</option>
                                <option value="offline" {{ old('event_mode', $gallery->event_mode) == 'offline' ? 'selected' : '' }}>Offline</option>
                                <option value="hybrid" {{ old('event_mode', $gallery->event_mode) == 'hybrid' ? 'selected' : '' }}>Hybrid</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="location" class="form-label">Location</label>
                            <input type="text" class="form-control" id="location" name="location" value="{{ old('location', $gallery->location) }}">
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="event_category" class="form-label">Category</label>
                                <select class="form-select" id="event_category" name="event_category">
                                    <option value="">Select Category</option>
                                    <option value="workshop" {{ old('event_category', $gallery->event_category) == 'workshop' ? 'selected' : '' }}>Workshop</option>
                                    <option value="competition" {{ old('event_category', $gallery->event_category) == 'competition' ? 'selected' : '' }}>Competition</option>
                                    <option value="seminar" {{ old('event_category', $gallery->event_category) == 'seminar' ? 'selected' : '' }}>Seminar</option>
                                    <option value="training" {{ old('event_category', $gallery->event_category) == 'training' ? 'selected' : '' }}>Training</option>
                                    <option value="webinar" {{ old('event_category', $gallery->event_category) == 'webinar' ? 'selected' : '' }}>Webinar</option>
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="max_slots" class="form-label">Max Participants</label>
                                <input type="number" class="form-control" id="max_slots" name="max_slots" value="{{ old('max_slots', $gallery->max_slots) }}" min="0">
                                <small class="text-muted">Current registrations: {{ $gallery->registered_count }}</small>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="event_status" class="form-label">Status</label>
                            <select class="form-select" id="event_status" name="event_status">
                                <option value="upcoming" {{ old('event_status', $gallery->event_status) == 'upcoming' ? 'selected' : '' }}>Upcoming</option>
                                <option value="ongoing" {{ old('event_status', $gallery->event_status) == 'ongoing' ? 'selected' : '' }}>Ongoing</option>
                                <option value="completed" {{ old('event_status', $gallery->event_status) == 'completed' ? 'selected' : '' }}>Completed</option>
                            </select>
                        </div>
                    @else
                        <div class="mb-3">
                            <label for="event_date" class="form-label">Activity Date</label>
                            <input type="date" class="form-control" id="event_date" name="event_date" value="{{ old('event_date', $gallery->event_date?->format('Y-m-d')) }}">
                        </div>
                    @endif

                    <div class="mb-3">
                        <label class="form-label">Current Image</label>
                        <div class="mb-2">
                            <img src="{{ $gallery->image_url }}" alt="{{ $gallery->title }}" style="max-width: 400px; border-radius: 8px;" data-has-valid-image="{{ $gallery->hasValidImage() ? 'true' : 'false' }}">
                        </div>
                        <label for="file" class="form-label">Upload New Image (Optional)</label>
                        <input type="file" class="form-control" id="file" name="file" accept="image/*">
                        <small class="text-muted">Max: 20MB. Format: JPG, PNG, GIF</small>
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
