@extends('admin.layout')

@section('title', 'Detail Category')

@section('content')
<div class="page-header">
    <h1 class="page-title">Detail Category</h1>
    <p class="page-subtitle">Informasi kategori dan konten terkait</p>
</div>

<div class="row">
    <div class="col-md-8">
        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">{{ $category->name }}</h5>
                <div>
                    <a href="{{ route('categories.edit', $category) }}" class="btn btn-sm btn-warning">
                        <i class="fas fa-edit"></i> Edit
                    </a>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-borderless">
                    <tbody>
                        <tr>
                            <td width="200"><strong>Nama Category</strong></td>
                            <td>{{ $category->name }}</td>
                        </tr>
                        <tr>
                            <td><strong>Jumlah Contents</strong></td>
                            <td><span class="badge bg-primary">{{ $category->contents_count }} contents</span></td>
                        </tr>
                        <tr>
                            <td><strong>Ditambahkan</strong></td>
                            <td>{{ $category->created_at->format('d M Y H:i') }}</td>
                        </tr>
                        <tr>
                            <td><strong>Terakhir Diupdate</strong></td>
                            <td>{{ $category->updated_at->format('d M Y H:i') }}</td>
                        </tr>
                    </tbody>
                </table>

                <div class="mt-4">
                    <a href="{{ route('categories.index') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left"></i> Kembali
                    </a>
                    <form action="{{ route('categories.destroy', $category) }}" method="POST" class="d-inline" onsubmit="return confirmDelete(event)">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">
                            <i class="fas fa-trash"></i> Hapus
                        </button>
                    </form>
                </div>
            </div>
        </div>

        @if($category->contents->count() > 0)
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">Contents Terkait</h5>
            </div>
            <div class="card-body">
                <div class="list-group">
                    @foreach($category->contents as $content)
                        <a href="{{ route('contents.show', $content) }}" class="list-group-item list-group-item-action">
                            <div class="d-flex w-100 justify-content-between">
                                <h6 class="mb-1">{{ $content->title }}</h6>
                                <small>{{ $content->created_at->format('d M Y') }}</small>
                            </div>
                            <small class="text-muted">{{ Str::limit($content->body, 100) }}</small>
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
        @endif
    </div>
</div>
@endsection
