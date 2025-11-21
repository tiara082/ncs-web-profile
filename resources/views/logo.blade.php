<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <title>Official Logos - NCS Lab</title>
    <meta name="description" content="Official logos and branding assets of Politeknik Negeri Malang and Jurusan Teknologi Informasi"/>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    
    @include('partials.custom-scrollbar-styles')
    @include('partials.shared-styles')
    
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/feather-icons"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#66bbf2',
                        secondary: '#222f7f',
                        accent: '#66bbf2',
                        background: '#ffffff',
                        foreground: '#000000',
                        muted: {
                            DEFAULT: '#f1f5f9',
                            foreground: '#64748b'
                        },
                        card: '#ffffff',
                        border: '#e2e8f0'
                    },
                    fontFamily: {
                        sans: ['Poppins', 'sans-serif']
                    }
                }
            }
        }
    </script>
    
    <!-- Custom CSS for Logo Page -->
    <link rel="stylesheet" href="{{ asset('css/logo.css') }}">
</head>
<body class="font-sans antialiased scroll-smooth">
    @include('partials.scroll-progress')
    
    <div class="min-h-screen bg-gradient-to-br from-slate-50 via-blue-50 to-indigo-50">
        <!-- Sub Header (includes navbar + hero) -->
        @include('partials.sub-header')
        
        <!-- Main Content -->
        <main class="py-16">
            @include('partials.logo-content')
        </main>
        
        <!-- Footer -->
        @include('partials.footer')
        
        <!-- Back to Top -->
        @include('partials.back-to-top')
    </div>
    
    <!-- Custom JS -->
    <script src="{{ asset('js/logo.js') }}"></script>
    
    <!-- Initialize Feather Icons -->
    <script>
        feather.replace();
    </script>
    
    <!-- Shared Scripts -->
    @include('partials.shared-scripts')
</body>
</html>
