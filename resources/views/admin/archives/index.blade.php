@extends('admin.layout')

@section('title', 'Archives')

@section('content')
<div class="page-header d-flex justify-content-between align-items-center">
    <div>
        <h1 class="page-title">Archives</h1>
        <p class="page-subtitle">Kelola arsip dan dokumen</p>
    </div>
    <div>
        <a href="{{ route('archives.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> Tambah Archive
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
                        <th>Category</th>
                        <th>File</th>
                        <th>Uploaded By</th>
                        <th>Tanggal</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($archives as $archive)
                        <tr>
                            <td>{{ $loop->iteration + ($archives->currentPage() - 1) * $archives->perPage() }}</td>
                            <td><strong>{{ Str::limit($archive->title, 40) }}</strong></td>
                            <td><span class="badge bg-secondary">{{ $archive->category }}</span></td>
                            <td><a href="{{ asset('storage/' . $archive->file_path) }}" target="_blank"><i class="fas fa-download"></i></a></td>
                            <td>{{ $archive->admin->username ?? '-' }}</td>
                            <td>{{ $archive->created_at->format('d M Y') }}</td>
                            <td>
                                <div class="btn-group btn-group-sm" role="group">
                                    <a href="{{ route('archives.show', $archive) }}" class="btn btn-info"><i class="fas fa-eye"></i></a>
                                    <a href="{{ route('archives.edit', $archive) }}" class="btn btn-warning"><i class="fas fa-edit"></i></a>
                                    <form action="{{ route('archives.destroy', $archive) }}" method="POST" class="d-inline" onsubmit="return confirmDelete(event)">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center py-4 text-muted">
                                <i class="fas fa-inbox fa-3x mb-3 d-block"></i>
                                Belum ada archive
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        
        <!-- Pagination -->
        <div class="d-flex justify-content-between align-items-center mt-3 px-3">
            <div class="text-muted small">
                Showing {{ $archives->firstItem() ?? 0 }} to {{ $archives->lastItem() ?? 0 }} of {{ $archives->total() }} entries
            </div>
            <div>
                {{ $archives->links('pagination::bootstrap-4') }}
            </div>
        </div>
    </div>
</div>
@endsection
