@extends('admin.layout')

@section('title', 'Dashboard')

@section('content')
<div class="page-header">
    <h1 class="page-title">Dashboard</h1>
    <p class="page-subtitle">Selamat datang di Admin Panel NCS Lab</p>
</div>

<div class="row g-4 mb-4">
    <div class="col-md-3">
        <div class="card stat-card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <p class="text-muted mb-1">Total Admins</p>
                        <h3 class="mb-0">{{ $stats['admins'] }}</h3>
                    </div>
                    <div class="stat-icon bg-primary">
                        <i class="fas fa-user-shield"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-md-3">
        <div class="card stat-card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <p class="text-muted mb-1">Total Contents</p>
                        <h3 class="mb-0">{{ $stats['contents'] }}</h3>
                    </div>
                    <div class="stat-icon bg-success">
                        <i class="fas fa-file-alt"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-md-3">
        <div class="card stat-card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <p class="text-muted mb-1">Total Categories</p>
                        <h3 class="mb-0">{{ $stats['categories'] }}</h3>
                    </div>
                    <div class="stat-icon bg-warning">
                        <i class="fas fa-tags"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-md-3">
        <div class="card stat-card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <p class="text-muted mb-1">Total Members</p>
                        <h3 class="mb-0">{{ $stats['members'] }}</h3>
                    </div>
                    <div class="stat-icon bg-info">
                        <i class="fas fa-users"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-md-3">
        <div class="card stat-card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <p class="text-muted mb-1">Total Galleries</p>
                        <h3 class="mb-0">{{ $stats['galleries'] }}</h3>
                    </div>
                    <div class="stat-icon bg-purple">
                        <i class="fas fa-images"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-md-3">
        <div class="card stat-card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <p class="text-muted mb-1">Total Archives</p>
                        <h3 class="mb-0">{{ $stats['archives'] }}</h3>
                    </div>
                    <div class="stat-icon bg-danger">
                        <i class="fas fa-archive"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-md-3">
        <div class="card stat-card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <p class="text-muted mb-1">Total Links</p>
                        <h3 class="mb-0">{{ $stats['links'] }}</h3>
                    </div>
                    <div class="stat-icon bg-secondary">
                        <i class="fas fa-link"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row g-4 mb-4">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0"><i class="fas fa-chart-pie"></i> Content by Type</h5>
            </div>
            <div class="card-body">
                <canvas id="contentTypeChart" height="250"></canvas>
            </div>
        </div>
    </div>
    
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0"><i class="fas fa-chart-line"></i> Monthly Content Creation ({{ date('Y') }})</h5>
            </div>
            <div class="card-body">
                <canvas id="monthlyChart" height="250"></canvas>
            </div>
        </div>
    </div>
</div>

<div class="row g-4">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0"><i class="fas fa-newspaper"></i> Content Terbaru</h5>
            </div>
            <div class="card-body">
                @forelse($recentContents as $content)
                    <div class="d-flex justify-content-between align-items-center mb-3 pb-3 border-bottom">
                        <div>
                            <h6 class="mb-1">{{ Str::limit($content->title, 50) }}</h6>
                            <small class="text-muted">
                                <i class="fas fa-user"></i> {{ $content->creator->username ?? 'Unknown' }}
                                | <i class="fas fa-clock"></i> {{ $content->created_at->diffForHumans() }}
                            </small>
                        </div>
                        <a href="{{ route('contents.show', $content) }}" class="btn btn-sm btn-outline-primary">
                            <i class="fas fa-eye"></i>
                        </a>
                    </div>
                @empty
                    <p class="text-muted text-center py-3">Belum ada content</p>
                @endforelse
                <a href="{{ route('contents.index') }}" class="btn btn-sm btn-link">Lihat Semua Content →</a>
            </div>
        </div>
    </div>
    
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0"><i class="fas fa-history"></i> Log Aktivitas Terbaru</h5>
            </div>
            <div class="card-body" style="max-height: 400px; overflow-y: auto;">
                @forelse($recentLogs as $log)
                    <div class="d-flex mb-3 pb-3 border-bottom">
                        <div class="flex-grow-1">
                            <small class="text-muted">
                                <i class="fas fa-user"></i> {{ $log->admin->username ?? 'Unknown' }}
                            </small>
                            <p class="mb-0 small">{{ $log->action }} - {{ $log->table_name }}</p>
                            <small class="text-muted">
                                <i class="fas fa-clock"></i> {{ $log->created_at->diffForHumans() }}
                            </small>
                        </div>
                    </div>
                @empty
                    <p class="text-muted text-center py-3">Belum ada log aktivitas</p>
                @endforelse
                <a href="{{ route('admin_logs.index') }}" class="btn btn-sm btn-link">Lihat Semua Log →</a>
            </div>
        </div>
    </div>
</div>

<style>
.stat-card {
    border-left: 4px solid;
    transition: all 0.3s ease;
    position: relative;
    overflow: hidden;
}

.stat-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: linear-gradient(135deg, rgba(102, 187, 242, 0.05) 0%, transparent 100%);
    opacity: 0;
    transition: opacity 0.3s ease;
}

.stat-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 12px 24px rgba(102, 187, 242, 0.2) !important;
}

.stat-card:hover::before {
    opacity: 1;
}

.stat-card:nth-child(1) { border-left-color: #66bbf2; }
.stat-card:nth-child(2) { border-left-color: #10b981; }
.stat-card:nth-child(3) { border-left-color: #f59e0b; }
.stat-card:nth-child(4) { border-left-color: #0ea5e9; }
.stat-card:nth-child(5) { border-left-color: #8b5cf6; }
.stat-card:nth-child(6) { border-left-color: #ef4444; }
.stat-card:nth-child(7) { border-left-color: #6b7280; }

.stat-card h3 {
    font-size: 2rem;
    font-weight: 700;
    color: #66bbf2;
    margin: 0;
}

.stat-card p {
    font-size: 0.875rem;
    font-weight: 500;
    margin: 0;
}

.stat-icon {
    width: 55px;
    height: 55px;
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.5rem;
    color: white;
    transition: transform 0.3s ease;
}

.stat-card:hover .stat-icon {
    transform: scale(1.1) rotate(5deg);
}

.bg-purple {
    background: linear-gradient(135deg, #8b5cf6 0%, #6d28d9 100%);
}

.bg-primary {
    background: linear-gradient(135deg, #66bbf2 0%, #5aadde 100%);
}

.bg-success {
    background: linear-gradient(135deg, #10b981 0%, #059669 100%);
}

.bg-warning {
    background: linear-gradient(135deg, #f59e0b 0%, #d97706 100%);
}

.bg-info {
    background: linear-gradient(135deg, #0ea5e9 0%, #0284c7 100%);
}

.bg-danger {
    background: linear-gradient(135deg, #ef4444 0%, #dc2626 100%);
}

.bg-secondary {
    background: linear-gradient(135deg, #6b7280 0%, #4b5563 100%);
}

.card-header h5 i {
    margin-right: 8px;
    color: #66bbf2;
}

body.dark-mode .stat-card h3 {
    color: #93d5ff;
}

body.dark-mode .stat-card p {
    color: #94a3b8;
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Chart.js default config
    Chart.defaults.font.family = "'Poppins', sans-serif";
    Chart.defaults.color = document.body.classList.contains('dark-mode') ? '#e5e7eb' : '#6B7280';
    
    const isDark = document.body.classList.contains('dark-mode');
    const gridColor = isDark ? 'rgba(148, 163, 184, 0.1)' : 'rgba(0, 0, 0, 0.1)';
    const textColor = isDark ? '#e5e7eb' : '#6B7280';
    
    // Content by Type Chart (Doughnut)
    const contentTypeCtx = document.getElementById('contentTypeChart').getContext('2d');
    const contentTypeData = @json($contentsByType);
    
    new Chart(contentTypeCtx, {
        type: 'doughnut',
        data: {
            labels: Object.keys(contentTypeData).map(key => key.charAt(0).toUpperCase() + key.slice(1)),
            datasets: [{
                data: Object.values(contentTypeData),
                backgroundColor: [
                    '#66bbf2',
                    '#222f7f',
                    '#10b981',
                    '#f59e0b',
                    '#ef4444',
                    '#8b5cf6'
                ],
                borderWidth: 2,
                borderColor: isDark ? '#1e293b' : '#fff'
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    position: 'bottom',
                    labels: {
                        padding: 15,
                        color: textColor,
                        font: {
                            size: 12
                        }
                    }
                },
                tooltip: {
                    backgroundColor: isDark ? '#1e293b' : '#fff',
                    titleColor: textColor,
                    bodyColor: textColor,
                    borderColor: '#66bbf2',
                    borderWidth: 1,
                    padding: 12,
                    displayColors: true
                }
            }
        }
    });
    
    // Monthly Content Chart (Line)
    const monthlyCtx = document.getElementById('monthlyChart').getContext('2d');
    const monthlyData = @json(array_values($monthlyData));
    const months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
    
    new Chart(monthlyCtx, {
        type: 'line',
        data: {
            labels: months,
            datasets: [{
                label: 'Contents Created',
                data: monthlyData,
                borderColor: '#66bbf2',
                backgroundColor: 'rgba(102, 187, 242, 0.1)',
                borderWidth: 3,
                fill: true,
                tension: 0.4,
                pointBackgroundColor: '#66bbf2',
                pointBorderColor: '#fff',
                pointBorderWidth: 2,
                pointRadius: 5,
                pointHoverRadius: 7
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    display: false
                },
                tooltip: {
                    backgroundColor: isDark ? '#1e293b' : '#fff',
                    titleColor: textColor,
                    bodyColor: textColor,
                    borderColor: '#66bbf2',
                    borderWidth: 1,
                    padding: 12
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        stepSize: 1,
                        color: textColor
                    },
                    grid: {
                        color: gridColor
                    }
                },
                x: {
                    ticks: {
                        color: textColor
                    },
                    grid: {
                        display: false
                    }
                }
            }
        }
    });
});
</script>
@endsection
