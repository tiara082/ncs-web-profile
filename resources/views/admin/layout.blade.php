<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Admin Panel') - NCS Lab</title>
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.2/css/buttons.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.5.0/css/responsive.bootstrap5.min.css">
    <!-- SweetAlert2 CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.4/dist/sweetalert2.min.css">
    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.1/dist/chart.umd.min.js"></script>
    <!-- Custom CSS -->
    <style>
        :root {
            --sidebar-width: 260px;
            --primary-color: #66bbf2;
            --secondary-color: #222f7f;
            --accent-color: #5aadde;
            --dark-bg: #1a2460;
            --light-bg: #F1F5F9;
            --text-primary: #1F2937;
            --text-secondary: #6B7280;
        }

        * {
            scroll-behavior: smooth;
        }

        body {
            font-family: 'Poppins', 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #f1f5f9 0%, #e2e8f0 100%);
            transition: background-color 0.3s ease;
            overflow-x: hidden;
        }

        /* Dark Mode Styles */
        body.dark-mode {
            background: linear-gradient(135deg, #0f172a 0%, #1e293b 100%);
            color: #e5e7eb;
        }

        body.dark-mode .card {
            background: linear-gradient(135deg, #1e293b 0%, #1f2937 100%);
            color: #e5e7eb;
            border-color: rgba(102, 187, 242, 0.2);
        }

        body.dark-mode .card-header {
            background: linear-gradient(135deg, #222f7f 0%, #1a2460 100%);
            color: #66bbf2;
        }

        body.dark-mode .table {
            color: #e5e7eb;
        }

        body.dark-mode .table thead th {
            background: linear-gradient(135deg, rgba(102, 187, 242, 0.2) 0%, rgba(34, 47, 127, 0.2) 100%);
            color: #66bbf2 !important;
            border-bottom-color: rgba(102, 187, 242, 0.5);
            font-weight: 700;
        }

        body.dark-mode .table tbody tr {
            background: rgba(15, 23, 42, 0.3);
            border-color: rgba(102, 187, 242, 0.15);
        }

        body.dark-mode .table tbody tr:hover {
            background: rgba(102, 187, 242, 0.12) !important;
            box-shadow: 0 2px 12px rgba(102, 187, 242, 0.15);
        }

        body.dark-mode .table tbody td {
            color: #000000ff !important;
            border-bottom-color: rgba(102, 187, 242, 0.15);
        }

        body.dark-mode .table td,
        body.dark-mode .table th {
            color: #f1f5f9 !important;
        }

        body.dark-mode .table a {
            color: #ffffffff !important;
            font-weight: 500;
        }

        body.dark-mode .table a:hover {
            color: #93d5ff !important;
            text-decoration: underline;
        }

        body.dark-mode .table .badge {
            font-weight: 600;
            padding: 6px 12px;
            border-radius: 6px;
        }

        body.dark-mode .form-control,
        body.dark-mode .form-select {
            background-color: #0f172a;
            border-color: rgba(102, 187, 242, 0.3);
            color: #f1f5f9;
        }

        body.dark-mode .form-control:focus,
        body.dark-mode .form-select:focus {
            background-color: #0f172a;
            border-color: #66bbf2;
            color: #f1f5f9;
            box-shadow: 0 0 0 4px rgba(102, 187, 242, 0.2);
        }

        body.dark-mode .form-control::placeholder {
            color: #64748b;
        }

        body.dark-mode .form-label {
            color: #e5e7eb;
        }

        body.dark-mode .page-title {
            background: linear-gradient(135deg, #66bbf2 0%, #ffffff 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        body.dark-mode .page-subtitle {
            color: rgba(102, 187, 242, 0.8);
        }

        body.dark-mode .page-header {
            background: linear-gradient(135deg, rgba(102, 187, 242, 0.1) 0%, rgba(34, 47, 127, 0.1) 100%);
            border-left-color: #66bbf2;
        }

        body.dark-mode .top-navbar {
            background: linear-gradient(135deg, #1e293b 0%, #1f2937 100%);
            border-bottom-color: rgba(102, 187, 242, 0.2);
        }

        body.dark-mode .theme-toggle {
            color: #66bbf2;
            background: rgba(102, 187, 242, 0.15);
        }

        body.dark-mode .theme-toggle:hover {
            background: rgba(102, 187, 242, 0.25);
        }

        body.dark-mode .text-muted {
            color: #94a3b8 !important;
        }

        body.dark-mode .top-navbar span[style*="color: var(--text-primary)"] {
            color: #e5e7eb !important;
        }

        body.dark-mode .badge {
            color: #fff;
        }

        body.dark-mode small,
        body.dark-mode p,
        body.dark-mode span:not(.badge):not(.text-white):not(.shimmer-text) {
            color: #e5e7eb;
        }

        body.dark-mode .btn {
            color: #fff !important;
        }

        body.dark-mode .btn-outline-danger {
            color: #ef4444 !important;
            border-color: #ef4444 !important;
        }

        body.dark-mode .btn-outline-danger:hover {
            background: #ef4444 !important;
            color: #fff !important;
        }

        body.dark-mode ::-webkit-scrollbar-track {
            background: #1e293b;
        }

        body.dark-mode ::-webkit-scrollbar-thumb {
            background: linear-gradient(180deg, #222f7f 0%, #1a2460 100%);
        }

        .theme-toggle {
            cursor: pointer;
            font-size: 1.2rem;
            color: #66bbf2;
            transition: all 0.3s ease;
            padding: 8px;
            border-radius: 8px;
            background: rgba(102, 187, 242, 0.1);
        }

        .theme-toggle:hover {
            color: #222f7f;
            background: rgba(102, 187, 242, 0.2);
            transform: rotate(20deg);
        }

        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            height: 100vh;
            width: var(--sidebar-width);
            background: linear-gradient(180deg, #222f7f 0%, #1a2460 100%);
            padding: 20px 0;
            z-index: 1000;
            overflow-y: auto;
            box-shadow: 4px 0 20px rgba(34, 47, 127, 0.2);
        }

        .sidebar::-webkit-scrollbar {
            width: 6px;
        }

        .sidebar::-webkit-scrollbar-track {
            background: rgba(255, 255, 255, 0.05);
        }

        .sidebar::-webkit-scrollbar-thumb {
            background: rgba(255, 255, 255, 0.2);
            border-radius: 3px;
        }

        .sidebar-brand {
            padding: 20px;
            margin-bottom: 20px;
            border-bottom: 2px solid rgba(102, 187, 242, 0.2);
            background: rgba(102, 187, 242, 0.05);
        }

        .sidebar-brand img {
            filter: drop-shadow(0 2px 8px rgba(102, 187, 242, 0.3));
        }

        .sidebar-brand h5 {
            letter-spacing: 0.5px;
        }

        .sidebar-brand small {
            letter-spacing: 1px;
        }

        .nav-section {
            margin-bottom: 25px;
        }

        .nav-section-title {
            color: rgba(255, 255, 255, 0.5);
            font-size: 0.75rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            padding: 0 20px;
            margin-bottom: 10px;
        }

        .nav-link {
            color: rgba(255, 255, 255, 0.7);
            padding: 12px 20px;
            display: flex;
            align-items: center;
            text-decoration: none;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            border-left: 3px solid transparent;
            position: relative;
            overflow: hidden;
        }

        .nav-link::before {
            content: '';
            position: absolute;
            left: 0;
            top: 0;
            height: 100%;
            width: 0;
            background: rgba(102, 187, 242, 0.1);
            transition: width 0.3s ease;
            z-index: -1;
        }

        .nav-link:hover {
            background-color: rgba(255, 255, 255, 0.05);
            color: #66bbf2;
            border-left-color: var(--primary-color);
            padding-left: 25px;
        }

        .nav-link:hover::before {
            width: 100%;
        }

        .nav-link.active {
            background: linear-gradient(90deg, rgba(102, 187, 242, 0.2) 0%, rgba(102, 187, 242, 0.05) 100%);
            color: #66bbf2;
            border-left-color: var(--primary-color);
            font-weight: 600;
        }

        .nav-link i {
            width: 20px;
            margin-right: 12px;
            font-size: 1.1rem;
        }

        .main-content {
            margin-left: var(--sidebar-width);
            padding: 0;
            min-height: 100vh;
        }

        .top-navbar {
            background: linear-gradient(135deg, #ffffff 0%, #f8fafc 100%);
            padding: 15px 30px;
            box-shadow: 0 4px 12px rgba(102, 187, 242, 0.1);
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: sticky;
            top: 0;
            z-index: 999;
            border-bottom: 2px solid rgba(102, 187, 242, 0.1);
        }

        .content-wrapper {
            padding: 30px;
            animation: fadeIn 0.4s ease-in;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .page-header {
            margin-bottom: 30px;
        }

        .page-title {
            font-size: 2rem;
            font-weight: 700;
            background: linear-gradient(135deg, #222f7f 0%, #66bbf2 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            margin-bottom: 5px;
        }

        .page-subtitle {
            color: #6B7280;
            font-size: 0.95rem;
            font-weight: 500;
        }

        .card {
            border: 1px solid rgba(102, 187, 242, 0.1);
            border-radius: 16px;
            box-shadow: 0 4px 12px rgba(102, 187, 242, 0.08);
            margin-bottom: 20px;
            background: #fff;
            transition: all 0.3s ease;
        }

        .card:hover {
            box-shadow: 0 8px 24px rgba(102, 187, 242, 0.15);
            transform: translateY(-2px);
        }

        /* Button Group Spacing */
        .btn-group .btn {
            margin-right: 0 !important;
        }

        .btn-group .btn:not(:last-child) {
            border-right: 1px solid rgba(255, 255, 255, 0.2);
        }

        .btn-group-sm .btn {
            padding: 0.375rem 0.75rem;
            font-size: 0.875rem;
        }

        /* Improve button contrast in dark mode */
        body.dark-mode .btn-info {
            background-color: #0ea5e9 !important;
            border-color: #0ea5e9 !important;
            color: #fff !important;
        }

        body.dark-mode .btn-warning {
            background-color: #f59e0b !important;
            border-color: #f59e0b !important;
            color: #fff !important;
        }

        body.dark-mode .btn-danger {
            background-color: #ef4444 !important;
            border-color: #ef4444 !important;
            color: #fff !important;
        }

        body.dark-mode .btn-info:hover {
            background-color: #0284c7 !important;
            border-color: #0284c7 !important;
        }

        body.dark-mode .btn-warning:hover {
            background-color: #d97706 !important;
            border-color: #d97706 !important;
        }

        body.dark-mode .btn-danger:hover {
            background-color: #dc2626 !important;
            border-color: #dc2626 !important;
        }

        .card-header {
            background: linear-gradient(135deg, #66bbf2 0%, #5aadde 100%);
            border-bottom: none;
            padding: 20px;
            font-weight: 600;
            color: #fff;
            border-radius: 16px 16px 0 0;
        }

        .btn-primary {
            background: linear-gradient(135deg, #66bbf2 0%, #5aadde 100%);
            border: none;
            padding: 10px 24px;
            border-radius: 10px;
            font-weight: 600;
            box-shadow: 0 4px 12px rgba(102, 187, 242, 0.3);
            transition: all 0.3s ease;
        }

        .btn-primary:hover {
            background: linear-gradient(135deg, #5aadde 0%, #222f7f 100%);
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(102, 187, 242, 0.4);
        }

        .table {
            margin-bottom: 0;
            border-collapse: separate;
            border-spacing: 0;
        }

        .table thead th {
            background: linear-gradient(135deg, rgba(102, 187, 242, 0.1) 0%, rgba(90, 173, 222, 0.05) 100%);
            color: #222f7f;
            font-weight: 700;
            border-bottom: 2px solid #66bbf2;
            padding: 16px 20px;
            text-transform: uppercase;
            font-size: 0.8rem;
            letter-spacing: 0.8px;
            white-space: nowrap;
            position: sticky;
            top: 0;
            z-index: 10;
        }

        .table tbody td {
            padding: 16px 20px;
            vertical-align: middle;
            border-bottom: 1px solid rgba(102, 187, 242, 0.1);
            color: #374151;
            font-size: 0.9rem;
        }

        .table tbody tr {
            transition: all 0.2s ease;
            background: #fff;
        }

        .table tbody tr:hover {
            background-color: rgba(102, 187, 242, 0.05);
            transform: scale(1.001);
            box-shadow: 0 2px 8px rgba(102, 187, 242, 0.08);
        }

        .table tbody tr:last-child td {
            border-bottom: none;
        }

        .badge {
            padding: 6px 12px;
            font-weight: 600;
            border-radius: 8px;
            letter-spacing: 0.3px;
        }

        .badge-primary {
            background: linear-gradient(135deg, #66bbf2 0%, #5aadde 100%);
        }

        .alert {
            border-radius: 12px;
            border: none;
            padding: 15px 20px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
        }

        .alert-success {
            background: linear-gradient(135deg, #10b981 0%, #059669 100%);
            color: white;
            border-left: 4px solid #047857;
        }

        .alert-danger {
            background: linear-gradient(135deg, #ef4444 0%, #dc2626 100%);
            color: white;
            border-left: 4px solid #b91c1c;
        }

        .form-label {
            font-weight: 600;
            color: #374151;
            margin-bottom: 8px;
        }

        .form-control, .form-select {
            border-radius: 8px;
            border: 1px solid #D1D5DB;
            padding: 10px 15px;
        }

        .form-control:focus, .form-select:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 4px rgba(102, 187, 242, 0.15);
            outline: none;
        }

        .stats-card {
            background: linear-gradient(135deg, #66bbf2 0%, #222f7f 100%);
            color: white;
            border-radius: 16px;
            padding: 25px;
            margin-bottom: 20px;
            box-shadow: 0 8px 24px rgba(102, 187, 242, 0.25);
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .stats-card::before {
            content: '';
            position: absolute;
            top: -50%;
            right: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle, rgba(255, 255, 255, 0.1) 0%, transparent 70%);
            animation: pulse 3s ease-in-out infinite;
        }

        @keyframes pulse {
            0%, 100% { opacity: 0.3; }
            50% { opacity: 0.6; }
        }

        .stats-card:hover {
            transform: translateY(-4px) scale(1.02);
            box-shadow: 0 12px 32px rgba(102, 187, 242, 0.35);
        }

        .stats-card h3 {
            font-size: 2.5rem;
            font-weight: 700;
            margin: 10px 0;
            position: relative;
            z-index: 1;
        }

        .stats-card p {
            margin: 0;
            opacity: 0.95;
            position: relative;
            z-index: 1;
            font-weight: 500;
        }

        .stats-card i {
            position: absolute;
            right: 20px;
            top: 50%;
            transform: translateY(-50%);
            font-size: 3rem;
            opacity: 0.15;
        }

        /* Action Buttons */
        .btn-sm {
            padding: 6px 12px;
            font-size: 0.875rem;
            border-radius: 8px;
            font-weight: 600;
        }

        .btn-info {
            background: linear-gradient(135deg, #3b82f6 0%, #2563eb 100%);
            border: none;
            color: white;
        }

        .btn-info:hover {
            background: linear-gradient(135deg, #2563eb 0%, #1d4ed8 100%);
            transform: translateY(-1px);
        }

        .btn-warning {
            background: linear-gradient(135deg, #f59e0b 0%, #d97706 100%);
            border: none;
            color: white;
        }

        .btn-warning:hover {
            background: linear-gradient(135deg, #d97706 0%, #b45309 100%);
            transform: translateY(-1px);
        }

        .btn-danger {
            background: linear-gradient(135deg, #ef4444 0%, #dc2626 100%);
            border: none;
        }

        .btn-danger:hover {
            background: linear-gradient(135deg, #dc2626 0%, #b91c1c 100%);
            transform: translateY(-1px);
        }

        .btn-success {
            background: linear-gradient(135deg, #10b981 0%, #059669 100%);
            border: none;
        }

        .btn-success:hover {
            background: linear-gradient(135deg, #059669 0%, #047857 100%);
            transform: translateY(-1px);
        }

        .btn-outline-danger {
            border: 2px solid #ef4444;
            color: #ef4444;
            font-weight: 600;
        }

        .btn-outline-danger:hover {
            background: #ef4444;
            border-color: #ef4444;
            color: white;
        }

        /* Page Header Enhancement */
        .page-header {
            background: linear-gradient(135deg, rgba(102, 187, 242, 0.05) 0%, rgba(34, 47, 127, 0.05) 100%);
            padding: 25px;
            border-radius: 16px;
            margin-bottom: 30px;
            border-left: 4px solid #66bbf2;
        }

        /* Scrollbar Styling */
        ::-webkit-scrollbar {
            width: 8px;
            height: 8px;
        }

        ::-webkit-scrollbar-track {
            background: #f1f5f9;
        }

        ::-webkit-scrollbar-thumb {
            background: linear-gradient(180deg, #66bbf2 0%, #5aadde 100%);
            border-radius: 4px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: linear-gradient(180deg, #5aadde 0%, #222f7f 100%);
        }

        @media (max-width: 768px) {
            .sidebar {
                transform: translateX(-100%);
                transition: transform 0.3s ease;
            }

            .sidebar.show {
                transform: translateX(0);
            }

            .main-content {
                margin-left: 0;
            }
        }

        /* Image placeholder styles */
        img[src*="poltek.png"] {
            opacity: 0.8;
            filter: grayscale(20%);
            transition: all 0.3s ease;
        }

        img[src*="poltek.png"]:hover {
            opacity: 1;
            filter: grayscale(0%);
            transform: scale(1.02);
        }

        /* Specific styles for different image contexts */
        .card img[src*="poltek.png"] {
            background: linear-gradient(135deg, #f8fafc 0%, #e2e8f0 100%);
            padding: 8px;
            border: 2px dashed #cbd5e1;
        }

        body.dark-mode .card img[src*="poltek.png"] {
            background: linear-gradient(135deg, #1e293b 0%, #334155 100%);
            border-color: #475569;
        }

        /* Gallery/thumbnail placeholder styles */
        img[style*="width: 60px"][src*="poltek.png"],
        img[style*="width: 40px"][src*="poltek.png"] {
            background: #f1f5f9;
            border: 1px solid #e2e8f0;
            padding: 4px;
        }

        body.dark-mode img[style*="width: 60px"][src*="poltek.png"],
        body.dark-mode img[style*="width: 40px"][src*="poltek.png"] {
            background: #1e293b;
            border-color: #475569;
        }
    </style>
    @yield('styles')
</head>
<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <div class="sidebar-brand">
            <div class="d-flex align-items-center gap-2 mb-2">
                <img src="{{ asset('img/logo.png') }}" alt="NCS Lab" style="width: 45px; height: 45px; object-fit: contain;">
                <div>
                    <h5 class="mb-0" style="font-weight: 700; color: #66bbf2;">NCS Lab</h5>
                    <small style="color: #94a3b8; font-size: 0.75rem;">Admin Panel</small>
                </div>
            </div>
        </div>

        <nav>
            <div class="nav-section">
                <div class="nav-section-title">Dashboard</div>
                <a href="{{ route('admins.index') }}" class="nav-link {{ request()->routeIs('admins.index') ? 'active' : '' }}">
                    <i class="fas fa-home"></i>
                    <span>Dashboard</span>
                </a>
            </div>

            <!-- Content Management - Available to all authenticated users -->
            <div class="nav-section">
                <div class="nav-section-title">Content</div>
                <a href="{{ route('galleries.index') }}" class="nav-link {{ request()->routeIs('galleries.*') ? 'active' : '' }}">
                    <i class="fas fa-images"></i>
                    <span>Gallery</span>
                </a>
                <a href="{{ route('archives.index') }}" class="nav-link {{ request()->routeIs('archives.*') ? 'active' : '' }}">
                    <i class="fas fa-archive"></i>
                    <span>Research</span>
                </a>
                <a href="{{ route('community-services.index') }}" class="nav-link {{ request()->routeIs('community-services.*') ? 'active' : '' }}">
                    <i class="fas fa-hands-helping"></i>
                    <span>Community Service</span>
                </a>
                {{-- Hidden for now - not used in backend/frontend
                <a href="{{ route('contents.index') }}" class="nav-link {{ request()->routeIs('contents.*') ? 'active' : '' }}">
                    <i class="fas fa-file-alt"></i>
                    <span>Contents</span>
                </a>
                --}}</div>

            <!-- Profile Management - Available to all authenticated users -->
            <div class="nav-section">
                <div class="nav-section-title">Account</div>
                <a href="{{ route('admin.profile') }}" class="nav-link {{ request()->routeIs('admin.profile') ? 'active' : '' }}">
                    <i class="fas fa-user-edit"></i>
                    <span>Edit Profile</span>
                </a>
            </div>

            @if(Auth::user()->role === 'superadmin')
            <!-- Superadmin Only Sections -->
            <div class="nav-section">
                <div class="nav-section-title">System Management</div>
                <a href="{{ route('categories.index') }}" class="nav-link {{ request()->routeIs('categories.*') ? 'active' : '' }}">
                    <i class="fas fa-tags"></i>
                    <span>Categories</span>
                </a>
                <a href="{{ route('members.index') }}" class="nav-link {{ request()->routeIs('members.*') ? 'active' : '' }}">
                    <i class="fas fa-users"></i>
                    <span>Members</span>
                </a>
                <a href="{{ route('links.index') }}" class="nav-link {{ request()->routeIs('links.*') ? 'active' : '' }}">
                    <i class="fas fa-link"></i>
                    <span>Links</span>
                </a>
            </div>

            <div class="nav-section">
                <div class="nav-section-title">Administration</div>
                <a href="{{ route('administrators.index') }}" class="nav-link {{ request()->routeIs('administrators.*') ? 'active' : '' }}">
                    <i class="fas fa-user-shield"></i>
                    <span>Administrators</span>
                </a>
                <a href="{{ route('consultations.index') }}" class="nav-link {{ request()->routeIs('consultations.*') ? 'active' : '' }}">
                    <i class="fas fa-comments"></i>
                    <span>Consultations</span>
                </a>
                <a href="{{ route('admin_logs.index') }}" class="nav-link {{ request()->routeIs('admin_logs.*') ? 'active' : '' }}">
                    <i class="fas fa-clipboard-list"></i>
                    <span>Activity Logs</span>
                </a>
            </div>
            @endif
        </nav>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <!-- Top Navbar -->
        <div class="top-navbar">
            <div>
                <button class="btn btn-link d-md-none" id="sidebarToggle">
                    <i class="fas fa-bars"></i>
                </button>
            </div>
            <div class="d-flex align-items-center gap-3">
                <span class="theme-toggle" id="themeToggle" title="Toggle Dark Mode">
                    <i class="fas fa-moon"></i>
                </span>
                <div class="d-flex align-items-center gap-2 px-3 py-2" style="background: rgba(102, 187, 242, 0.1); border-radius: 8px;">
                    <i class="fas fa-user-circle" style="font-size: 1.2rem; color: #66bbf2;"></i> 
                    <div class="d-flex flex-column">
                        <span style="font-weight: 500; color: var(--text-primary); font-size: 0.9rem;">
                            {{ Auth::user()->name ?? Auth::user()->username ?? 'Admin' }}
                        </span>
                        <small class="badge {{ Auth::user()->role === 'superadmin' ? 'badge-primary' : 'bg-secondary' }}" style="font-size: 0.7rem;">
                            {{ Auth::user()->role === 'superadmin' ? 'Super Admin' : 'Admin' }}
                        </small>
                    </div>
                </div>
                <a href="{{ route('logout') }}" class="btn btn-sm btn-outline-danger" onclick="event.preventDefault(); confirmLogout();" style="font-weight: 600;">
                    <i class="fas fa-sign-out-alt"></i> Logout
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>
        </div>

        <!-- Content Wrapper -->
        <div class="content-wrapper">
            @if ($errors->any())
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong><i class="fas fa-exclamation-triangle"></i> Error!</strong>
                    <ul class="mb-0 mt-2">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @yield('content')
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- jQuery (required for DataTables) -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <!-- SweetAlert2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.4/dist/sweetalert2.all.min.js"></script>
    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.5.0/js/responsive.bootstrap5.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
    <!-- Custom JS -->
    <script>
        // Sidebar toggle for mobile
        document.getElementById('sidebarToggle')?.addEventListener('click', function() {
            document.querySelector('.sidebar').classList.toggle('show');
        });

        // SweetAlert2 custom theme
        const isDarkMode = () => document.body.classList.contains('dark-mode');
        
        const getSwalTheme = () => {
            return isDarkMode() ? {
                background: '#1e293b',
                color: '#e5e7eb',
                confirmButtonColor: '#66bbf2',
                cancelButtonColor: '#ef4444',
            } : {
                background: '#fff',
                color: '#1F2937',
                confirmButtonColor: '#66bbf2',
                cancelButtonColor: '#ef4444',
            };
        };

        // Auto hide alerts
        setTimeout(function() {
            const alerts = document.querySelectorAll('.alert');
            alerts.forEach(function(alert) {
                const bsAlert = new bootstrap.Alert(alert);
                bsAlert.close();
            });
        }, 5000);

        // Logout confirmation
        function confirmLogout() {
            Swal.fire({
                title: 'Confirm Logout',
                text: 'Are you sure you want to logout?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, Logout',
                cancelButtonText: 'Cancel',
                ...getSwalTheme()
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('logout-form').submit();
                }
            });
        }

        // Delete confirmation function
        function confirmDelete(event) {
            event.preventDefault();
            const form = event.target;
            
            Swal.fire({
                title: 'Confirm Delete',
                text: 'Deleted data cannot be recovered!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, Delete',
                cancelButtonText: 'Cancel',
                ...getSwalTheme()
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            });
            
            return false;
        }

        // Success message
        @if(session('success'))
            Swal.fire({
                icon: 'success',
                title: 'Success!',
                text: '{{ session("success") }}',
                timer: 3000,
                showConfirmButton: false,
                ...getSwalTheme()
            });
        @endif

        // Error message
        @if(session('error'))
            Swal.fire({
                icon: 'error',
                title: 'Failed!',
                text: '{{ session("error") }}',
                ...getSwalTheme()
            });
        @endif

        // Dark Mode Toggle
        const themeToggle = document.getElementById('themeToggle');
        const body = document.body;
        const icon = themeToggle.querySelector('i');

        // Load saved theme
        const savedTheme = localStorage.getItem('theme');
        if (savedTheme === 'dark') {
            body.classList.add('dark-mode');
            icon.classList.remove('fa-moon');
            icon.classList.add('fa-sun');
        }

        // Toggle theme
        themeToggle.addEventListener('click', function() {
            body.classList.toggle('dark-mode');
            
            if (body.classList.contains('dark-mode')) {
                icon.classList.remove('fa-moon');
                icon.classList.add('fa-sun');
                localStorage.setItem('theme', 'dark');
            } else {
                icon.classList.remove('fa-sun');
                icon.classList.add('fa-moon');
                localStorage.setItem('theme', 'light');
            }
        });

        // Initialize DataTables for all tables with class 'data-table'
        $(document).ready(function() {
            if ($.fn.DataTable && $('.data-table').length > 0) {
                $('.data-table').each(function() {
                    const $table = $(this);
                    
                    // Check if table has thead and tbody
                    if ($table.find('thead').length && $table.find('tbody').length) {
                        // Check if columns match
                        const headerCols = $table.find('thead tr:first th').length;
                        const bodyCols = $table.find('tbody tr:first td').length;
                        
                        if (headerCols === bodyCols || bodyCols === 0) {
                            try {
                                $table.DataTable({
                                    responsive: true,
                                    pageLength: 10,
                                    lengthMenu: [[5, 10, 25, 50, 100, -1], [5, 10, 25, 50, 100, "All"]],
                                    dom: '<"row"<"col-sm-12 col-md-6"l><"col-sm-12 col-md-6"f>>rtip',
                                    language: {
                                        search: "_INPUT_",
                                        searchPlaceholder: "Search...",
                                        lengthMenu: "Show _MENU_ entries",
                                        info: "Showing _START_ to _END_ of _TOTAL_ entries",
                                        infoEmpty: "No entries available",
                                        infoFiltered: "(filtered from _MAX_ total entries)",
                                        zeroRecords: "No matching records found",
                                        emptyTable: "No data available in table",
                                        paginate: {
                                            first: "First",
                                            last: "Last",
                                            next: "Next",
                                            previous: "Previous"
                                        }
                                    },
                                    order: [[0, 'asc']],
                                    columnDefs: [
                                        {
                                            targets: -1,
                                            orderable: false,
                                            searchable: false
                                        }
                                    ]
                                });
                            } catch (e) {
                                console.warn('DataTable initialization failed for table:', e);
                            }
                        }
                    }
                });

                // Re-style DataTables elements
                setTimeout(function() {
                    $('.dataTables_filter input').addClass('form-control form-control-sm');
                    $('.dataTables_length select').addClass('form-select form-select-sm');
                }, 100);
            }
        });

        // Global image error handling - replace broken images with poltek.png
        document.addEventListener('DOMContentLoaded', function() {
            // Handle existing images
            const images = document.querySelectorAll('img');
            images.forEach(function(img) {
                img.addEventListener('error', function() {
                    if (this.src !== '{{ asset("img/poltek.png") }}') {
                        console.log('Image failed to load:', this.src, 'Replacing with poltek.png');
                        this.src = '{{ asset("img/poltek.png") }}';
                        this.alt = 'Default Image';
                        this.title = 'Image not available';
                    }
                });
                
                // Check if image is already broken
                if (img.complete && img.naturalHeight === 0) {
                    if (img.src !== '{{ asset("img/poltek.png") }}') {
                        img.src = '{{ asset("img/poltek.png") }}';
                        img.alt = 'Default Image';
                        img.title = 'Image not available';
                    }
                }
            });

            // Handle dynamically added images
            const observer = new MutationObserver(function(mutations) {
                mutations.forEach(function(mutation) {
                    mutation.addedNodes.forEach(function(node) {
                        if (node.nodeType === 1) { // Element node
                            // Check if the added node is an image
                            if (node.tagName === 'IMG') {
                                node.addEventListener('error', function() {
                                    if (this.src !== '{{ asset("img/poltek.png") }}') {
                                        console.log('Dynamic image failed to load:', this.src, 'Replacing with poltek.png');
                                        this.src = '{{ asset("img/poltek.png") }}';
                                        this.alt = 'Default Image';
                                        this.title = 'Image not available';
                                    }
                                });
                            }
                            
                            // Check for images within the added node
                            const images = node.querySelectorAll ? node.querySelectorAll('img') : [];
                            images.forEach(function(img) {
                                img.addEventListener('error', function() {
                                    if (this.src !== '{{ asset("img/poltek.png") }}') {
                                        console.log('Nested dynamic image failed to load:', this.src, 'Replacing with poltek.png');
                                        this.src = '{{ asset("img/poltek.png") }}';
                                        this.alt = 'Default Image';
                                        this.title = 'Image not available';
                                    }
                                });
                            });
                        }
                    });
                });
            });

            // Start observing
            observer.observe(document.body, {
                childList: true,
                subtree: true
            });
        });
    </script>
    @yield('scripts')
</body>
</html>
