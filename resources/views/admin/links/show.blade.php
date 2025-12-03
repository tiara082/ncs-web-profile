@extends('admin.layout')

@section('title', 'Detail Link')

@section('content')
<div class="page-header">
    <h1 class="page-title">Detail Link</h1>
</div>

<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">{{ $link->name }}</h5>
                <a href="{{ route('links.edit', $link) }}" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i> Edit</a>
            </div>
            <div class="card-body">
                <table class="table table-borderless">
                    <tr>
                        <td width="200"><strong>URL</strong></td>
                        <td><a href="{{ $link->url }}" target="_blank">{{ $link->url }} <i class="fas fa-external-link-alt"></i></a></td>
                    </tr>
                    <tr>
                        <td><strong>Deskripsi</strong></td>
                        <td>{{ $link->description ?? '-' }}</td>
                    </tr>
                    <tr>
                        <td><strong>Ditambahkan</strong></td>
                        <td>{{ $link->created_at->format('d M Y H:i') }}</td>
                    </tr>
                    <tr>
                        <td><strong>Terakhir Diupdate</strong></td>
                        <td>{{ $link->updated_at->format('d M Y H:i') }}</td>
                    </tr>
                </table>

                <div class="mt-4">
                    <a href="{{ route('links.index') }}" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Kembali</a>
                    <form action="{{ route('links.destroy', $link) }}" method="POST" class="d-inline" onsubmit="return confirmDelete(event)">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i> Hapus</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
