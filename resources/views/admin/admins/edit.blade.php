@extends('admin.layout')

@section('title', 'Edit Administrator')

@section('content')
<div class="page-header">
    <h1 class="page-title">Edit Administrator</h1>
</div>

<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('administrators.update', $admin) }}" method="POST">
                    @csrf
                    @method('PUT')
                    
                    <div class="mb-3">
                        <label for="username" class="form-label">Username <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="username" name="username" value="{{ old('username', $admin->username) }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
                        <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $admin->email) }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="role" class="form-label">Role <span class="text-danger">*</span></label>
                        <select class="form-control" id="role" name="role" required>
                            <option value="admin" {{ old('role', $admin->role) == 'admin' ? 'selected' : '' }}>Admin</option>
                            <option value="super_admin" {{ old('role', $admin->role) == 'super_admin' ? 'selected' : '' }}>Super Admin</option>
                            <option value="editor" {{ old('role', $admin->role) == 'editor' ? 'selected' : '' }}>Editor</option>
                            <option value="moderator" {{ old('role', $admin->role) == 'moderator' ? 'selected' : '' }}>Moderator</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="member_id" class="form-label">Linked Member (Optional)</label>
                        <select class="form-control" id="member_id" name="member_id">
                            <option value="">None</option>
                            @foreach(\App\Models\Members::all() as $member)
                                <option value="{{ $member->id }}" {{ old('member_id', $admin->member_id) == $member->id ? 'selected' : '' }}>
                                    {{ $member->member_name }} - {{ $member->member_role }}
                                </option>
                            @endforeach
                        </select>
                        <small class="text-muted">Link this admin to a lab member for automatic author attribution</small>
                    </div>

                    <hr class="my-4">
                    <p class="text-muted">Kosongkan password jika tidak ingin mengubahnya</p>

                    <div class="mb-3">
                        <label for="password" class="form-label">Password Baru</label>
                        <input type="password" class="form-control" id="password" name="password">
                        <small class="text-muted">Minimal 8 karakter</small>
                    </div>

                    <div class="mb-3">
                        <label for="password_confirmation" class="form-label">Konfirmasi Password Baru</label>
                        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
                    </div>

                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Update</button>
                        <a href="{{ route('administrators.index') }}" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Kembali</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
