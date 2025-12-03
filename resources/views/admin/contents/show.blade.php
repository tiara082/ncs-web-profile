@extends('admin.layout')

@section('title', 'Detail Content')

@section('content')
<div class="page-header">
    <h1 class="page-title">Detail Content</h1>
    <p class="page-subtitle">Informasi lengkap konten</p>
</div>

<div class="row">
    <div class="col-md-10">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">{{ $content->title }}</h5>
                <div>
                    <a href="{{ route('contents.edit', $content) }}" class="btn btn-sm btn-warning">
                        <i class="fas fa-edit"></i> Edit
                    </a>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-borderless mb-4">
                    <tbody>
                        <tr>
                            <td width="200"><strong>Tipe Content</strong></td>
                            <td><span class="badge bg-info">{{ $content->content_type }}</span></td>
                        </tr>
                        <tr>
                            <td><strong>Pembuat</strong></td>
                            <td>{{ $content->creator->name ?? '-' }}</td>
                        </tr>
                        <tr>
                            <td><strong>Categories</strong></td>
                            <td>
                                @forelse($content->categories as $category)
                                    <span class="badge bg-secondary">{{ $category->name }}</span>
                                @empty
                                    <span class="text-muted">-</span>
                                @endforelse
                            </td>
                        </tr>
                        <tr>
                            <td><strong>Ditambahkan</strong></td>
                            <td>{{ $content->created_at->format('d M Y H:i') }}</td>
                        </tr>
                        <tr>
                            <td><strong>Terakhir Diupdate</strong></td>
                            <td>{{ $content->updated_at->format('d M Y H:i') }}</td>
                        </tr>
                    </tbody>
                </table>

                <hr>

                <h6 class="mb-3"><strong>Konten:</strong></h6>
                <div class="bg-light p-3 rounded" style="max-height: 500px; overflow-y: auto;">
                    {!! nl2br(e($content->body)) !!}
                </div>

                <div class="mt-4">
                    <a href="{{ route('contents.index') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left"></i> Kembali
                    </a>
                    <form action="{{ route('contents.destroy', $content) }}" method="POST" class="d-inline" onsubmit="return confirmDelete(event)">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">
                            <i class="fas fa-trash"></i> Hapus
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
