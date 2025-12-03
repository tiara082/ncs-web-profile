@extends('admin.layout')

@section('title', 'Tambah Member')

@section('content')
<div class="page-header">
    <h1 class="page-title">Tambah Member</h1>
    <p class="page-subtitle">Tambahkan anggota laboratorium baru</p>
</div>

<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">Form Tambah Member</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('members.store') }}" method="POST">
                    @csrf
                    
                    <div class="mb-3">
                        <label for="member_name" class="form-label">Nama Lengkap <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('member_name') is-invalid @enderror" 
                               id="member_name" name="member_name" value="{{ old('member_name') }}" required>
                        @error('member_name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="member_role" class="form-label">Role/Posisi <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('member_role') is-invalid @enderror" 
                               id="member_role" name="member_role" value="{{ old('member_role') }}" 
                               placeholder="e.g., Laboratory Head, Researcher" required>
                        @error('member_role')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="member_email" class="form-label">Email</label>
                        <input type="email" class="form-control @error('member_email') is-invalid @enderror" 
                               id="member_email" name="member_email" value="{{ old('member_email') }}">
                        @error('member_email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="member_phone" class="form-label">Nomor Telepon</label>
                        <input type="text" class="form-control @error('member_phone') is-invalid @enderror" 
                               id="member_phone" name="member_phone" value="{{ old('member_phone') }}">
                        @error('member_phone')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="member_address" class="form-label">Alamat</label>
                        <textarea class="form-control @error('member_address') is-invalid @enderror" 
                                  id="member_address" name="member_address" rows="3">{{ old('member_address') }}</textarea>
                        @error('member_address')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save"></i> Simpan
                        </button>
                        <a href="{{ route('members.index') }}" class="btn btn-secondary">
                            <i class="fas fa-arrow-left"></i> Kembali
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
