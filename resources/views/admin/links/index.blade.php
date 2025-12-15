@extends('admin.layout')

@section('title', 'Links')

@section('content')
<div class="page-header d-flex justify-content-between align-items-center">
    <div>
        <h1 class="page-title">Links</h1>
        <p class="page-subtitle">Kelola link eksternal</p>
    </div>
    <div>
        <a href="{{ route('links.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> Add Link
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
                        <th>Name</th>
                        <th>URL</th>
                        <th>Description</th>
                        <th>Date</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($links as $link)
                        <tr>
                            <td>{{ $loop->iteration + ($links->currentPage() - 1) * $links->perPage() }}</td>
                            <td><strong>{{ $link->name }}</strong></td>
                            <td><a href="{{ $link->url }}" target="_blank">{{ Str::limit($link->url, 40) }}</a></td>
                            <td>{{ Str::limit($link->description, 50) }}</td>
                            <td>{{ $link->created_at->format('d M Y') }}</td>
                            <td>
                                <div class="btn-group btn-group-sm" role="group">
                                    <a href="{{ route('links.show', $link) }}" class="btn btn-info"><i class="fas fa-eye"></i></a>
                                    <a href="{{ route('links.edit', $link) }}" class="btn btn-warning"><i class="fas fa-edit"></i></a>
                                    <form action="{{ route('links.destroy', $link) }}" method="POST" class="d-inline" onsubmit="return confirmDelete(event)">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center py-4 text-muted">
                                <i class="fas fa-inbox fa-3x mb-3 d-block"></i>
                                Belum ada link
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        

    </div>
</div>
@endsection
