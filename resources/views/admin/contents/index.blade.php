@extends('admin.layout')

@section('title', 'Contents')

@section('content')
<div class="page-header d-flex justify-content-between align-items-center">
    <div>
        <h1 class="page-title">Contents</h1>
        <p class="page-subtitle">Kelola konten artikel dan publikasi</p>
    </div>
    <div>
        <a href="{{ route('contents.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> Tambah Content
        </a>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover data-table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Judul</th>
                        <th>Tipe</th>
                        <th>Pembuat</th>
                        <th>Categories</th>
                        <th>Tanggal</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($contents as $content)
                        <tr>
                            <td>{{ $loop->iteration + ($contents->currentPage() - 1) * $contents->perPage() }}</td>
                            <td><strong>{{ Str::limit($content->title, 50) }}</strong></td>
                            <td><span class="badge bg-info">{{ $content->content_type }}</span></td>
                            <td>{{ $content->creator->name ?? $content->creator->username ?? '-' }}</td>
                            <td>
                                @foreach($content->categories as $category)
                                    <span class="badge bg-secondary">{{ $category->name }}</span>
                                @endforeach
                            </td>
                            <td>{{ $content->created_at->format('d M Y') }}</td>
                            <td>
                                <div class="btn-group btn-group-sm" role="group">
                                    <a href="{{ route('contents.show', $content) }}" class="btn btn-info" title="Detail">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="{{ route('contents.edit', $content) }}" class="btn btn-warning" title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('contents.destroy', $content) }}" method="POST" class="d-inline" onsubmit="return confirmDelete(event)">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger" title="Hapus">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center py-4 text-muted">
                                <i class="fas fa-inbox fa-3x mb-3 d-block"></i>
                                Belum ada content
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
