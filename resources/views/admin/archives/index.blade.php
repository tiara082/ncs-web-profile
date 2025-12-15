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
            <i class="fas fa-plus"></i> Add Archive
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
                        <th>Title</th>
                        <th>Category</th>
                        <th>Keywords</th>
                        <th>DOI</th>
                        <th>File</th>
                        <th>Uploaded By</th>
                        <th>Date</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($archives as $archive)
                        <tr>
                            <td>{{ $loop->iteration + ($archives->currentPage() - 1) * $archives->perPage() }}</td>
                            <td><strong>{{ Str::limit($archive->title, 40) }}</strong></td>
                            <td><span class="badge bg-secondary">{{ $archive->category }}</span></td>
                            <td>
                                @if(!empty($archive->keywords))
                                    @php
                                        $keywords = explode(',', $archive->keywords);
                                        $displayKeywords = array_slice($keywords, 0, 2);
                                    @endphp
                                    @foreach($displayKeywords as $keyword)
                                        @php
                                            $keyword = trim($keyword);
                                            if(!empty($keyword)) {
                                        @endphp
                                            <span class="badge bg-info text-white me-1">{{ Str::limit($keyword, 10) }}</span>
                                        @php
                                            }
                                        @endphp
                                    @endforeach
                                    @if(count($keywords) > 2)
                                        <span class="badge bg-secondary">+{{ count($keywords) - 2 }}</span>
                                    @endif
                                @else
                                    -
                                @endif
                            </td>
                            <td>
                                @if(!empty($archive->doi))
                                    <a href="https://doi.org/{{ $archive->doi }}" target="_blank" class="btn btn-sm btn-outline-primary" title="{{ $archive->doi }}">
                                        <i class="fas fa-external-link-alt"></i>
                                    </a>
                                @else
                                    -
                                @endif
                            </td>
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
                            <td colspan="9" class="text-center py-4 text-muted">
                                <i class="fas fa-inbox fa-3x mb-3 d-block"></i>
                                Belum ada archive
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        
        <!-- Pagination Links -->
        <div class="d-flex justify-content-center mt-4">
            {{ $archives->links('custom.pagination') }}
        </div>

    </div>
</div>
@endsection
