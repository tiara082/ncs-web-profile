<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Admin Login - Network & Cyber Security Lab</title>
    
    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('img/logo.png') }}">
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- Google Fonts - Poppins -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#66bbf2',
                        secondary: '#222f7f',
                        accent: '#66bbf2',
                    },
                    fontFamily: {
                        sans: ['Poppins', 'sans-serif']
                    }
                }
            }
        }
    </script>
    
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }
        
        @keyframes gradient-shift {
            0%, 100% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
        }
        
        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-20px); }
        }
        
        @keyframes float-rotate {
            0%, 100% { transform: translateY(0px) rotate(0deg); }
            50% { transform: translateY(-30px) rotate(10deg); }
        }
        
        @keyframes pulse-glow {
            0%, 100% { box-shadow: 0 0 30px rgba(102, 187, 242, 0.4); }
            50% { box-shadow: 0 0 60px rgba(102, 187, 242, 0.6); }
        }
        
        @keyframes shimmer {
            0% { background-position: -200% center; }
            100% { background-position: 200% center; }
        }
        
        @keyframes slide-up {
            from { opacity: 0; transform: translateY(30px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        .animate-gradient {
            background-size: 200% 200%;
            animation: gradient-shift 8s ease infinite;
        }
        
        .animate-float {
            animation: float 6s ease-in-out infinite;
        }
        
        .animate-float-rotate {
            animation: float-rotate 8s ease-in-out infinite;
        }
        
        .animate-pulse-glow {
            animation: pulse-glow 3s ease-in-out infinite;
        }
        
        .animate-slide-up {
            animation: slide-up 0.8s ease-out forwards;
        }
        
        .shimmer-text {
            background: linear-gradient(90deg, #66bbf2, #222f7f, #66bbf2);
            background-size: 200% 100%;
            -webkit-background-clip: text;
            background-clip: text;
            -webkit-text-fill-color: transparent;
            animation: shimmer 3s linear infinite;
        }
        
        .glass-card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.3);
        }
        
        .input-field {
            transition: all 0.3s ease;
        }
        
        .input-field:focus {
            transform: translateY(-2px);
            box-shadow: 0 8px 30px rgba(102, 187, 242, 0.2);
        }
        
        .btn-gradient {
            background: linear-gradient(135deg, #66bbf2 0%, #222f7f 100%);
            transition: all 0.4s ease;
            position: relative;
            overflow: hidden;
        }
        
        .btn-gradient::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.3), transparent);
            transition: left 0.5s ease;
        }
        
        .btn-gradient:hover::before {
            left: 100%;
        }
        
        .btn-gradient:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 40px rgba(102, 187, 242, 0.5);
        }
    </style>
</head>
<body class="min-h-screen relative overflow-hidden">
    
    <!-- Animated Gradient Background -->
    <div class="absolute inset-0 bg-gradient-to-br from-white via-cyan-50 to-blue-50 animate-gradient"></div>
    
    <!-- Decorative Floating Elements -->
    <div class="absolute inset-0 overflow-hidden pointer-events-none">
        <div class="absolute -top-20 -left-20 w-64 sm:w-96 h-64 sm:h-96 bg-gradient-to-br from-primary/30 to-secondary/20 rounded-full blur-3xl animate-float"></div>
        <div class="absolute -bottom-32 -right-32 w-80 sm:w-[500px] h-80 sm:h-[500px] bg-gradient-to-tl from-secondary/30 to-primary/20 rounded-full blur-3xl animate-float" style="animation-delay: 2s;"></div>
        <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-96 sm:w-[600px] h-96 sm:h-[600px] bg-gradient-to-r from-primary/10 to-secondary/10 rounded-full blur-3xl animate-pulse-glow"></div>
        
        <div class="hidden sm:block absolute top-20 right-40 w-20 h-20 bg-primary/20 rounded-lg animate-float-rotate"></div>
        <div class="hidden sm:block absolute bottom-40 left-40 w-16 h-16 bg-secondary/20 rounded-full animate-float" style="animation-delay: 1s;"></div>
        <div class="hidden sm:block absolute top-1/3 right-20 w-12 h-12 bg-accent/20 rounded-lg animate-float-rotate" style="animation-delay: 3s;"></div>
    </div>
    
    <!-- Main Container -->
    <div class="min-h-screen flex items-center justify-center p-4 sm:p-6 md:p-8 relative z-10">
        <div class="w-full max-w-md">
            
            <!-- Login Form -->
            <div class="flex items-center justify-center">
                <div class="w-full">
                    
                    <!-- Logo -->
                    <div class="text-center mb-6 sm:mb-8">
                        <div class="flex items-center justify-center gap-3 sm:gap-4 mb-4 sm:mb-6">
                            <img src="{{ asset('img/polinema.png') }}" alt="Polinema" class="w-12 h-12 sm:w-16 sm:h-16 object-contain hover:scale-110 transition-transform">
                            <div class="h-10 sm:h-14 w-1 bg-gradient-to-b from-primary to-secondary rounded-full"></div>
                            <img src="{{ asset('img/logo.png') }}" alt="NCS Lab" class="w-12 h-12 sm:w-16 sm:h-16 object-contain hover:scale-110 transition-transform animate-pulse-glow">
                        </div>
                        <h2 class="text-2xl sm:text-3xl font-bold shimmer-text mb-1 sm:mb-2">Admin Portal</h2>
                        <p class="text-sm sm:text-base text-gray-600">Network & Cyber Security Lab</p>
                    </div>
                    
                    <!-- Login Card -->
                    <div class="glass-card rounded-2xl sm:rounded-3xl shadow-2xl p-6 sm:p-8 md:p-10 animate-slide-up">
                        
                        <div class="text-center mb-5 sm:mb-6">
                            <h3 class="text-xl sm:text-2xl font-bold text-gray-900 mb-1">Welcome Back!</h3>
                            <p class="text-xs sm:text-sm text-gray-600">Sign in to admin dashboard</p>
                        </div>
                        
                        @if($errors->any())
                            <div class="mb-4 sm:mb-6 p-3 sm:p-4 bg-red-50 border-l-4 border-red-500 rounded-lg">
                                <div class="flex items-start">
                                    <svg class="w-4 h-4 sm:w-5 sm:h-5 text-red-500 mt-0.5 mr-2 sm:mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
                                    </svg>
                                    <div class="text-xs sm:text-sm text-red-700">
                                        @foreach($errors->all() as $error)
                                            <p>{{ $error }}</p>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        @endif
                        
                        <form action="{{ route('admin.login.post') }}" method="POST" class="space-y-4 sm:space-y-6">
                            @csrf
                            
                            <!-- Username -->
                            <div>
                                <label class="block text-xs sm:text-sm font-semibold text-gray-700 mb-1.5 sm:mb-2">Username</label>
                                <div class="relative">
                                    <div class="absolute left-3 sm:left-4 top-1/2 -translate-y-1/2 text-gray-400">
                                        <svg class="w-4 h-4 sm:w-5 sm:h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                        </svg>
                                    </div>
                                    <input 
                                        type="text" 
                                        name="username"
                                        value="{{ old('username') }}"
                                        placeholder="admin" 
                                        class="input-field w-full pl-10 sm:pl-12 pr-3 sm:pr-4 py-3 sm:py-4 bg-gray-50 border-2 border-gray-200 rounded-xl focus:outline-none focus:bg-white focus:border-primary text-sm @error('username') border-red-500 @enderror"
                                        required autofocus
                                    />
                                </div>
                                @error('username')
                                    <p class="mt-1 text-xs sm:text-sm text-red-500">{{ $message }}</p>
                                @enderror
                            </div>
                            
                            <!-- Password -->
                            <div>
                                <label class="block text-xs sm:text-sm font-semibold text-gray-700 mb-1.5 sm:mb-2">Password</label>
                                <div class="relative">
                                    <div class="absolute left-3 sm:left-4 top-1/2 -translate-y-1/2 text-gray-400">
                                        <svg class="w-4 h-4 sm:w-5 sm:h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                                        </svg>
                                    </div>
                                    <input 
                                        type="password" 
                                        name="password"
                                        placeholder="••••••••" 
                                        class="input-field w-full pl-10 sm:pl-12 pr-3 sm:pr-4 py-3 sm:py-4 bg-gray-50 border-2 border-gray-200 rounded-xl focus:outline-none focus:bg-white focus:border-primary text-sm @error('password') border-red-500 @enderror"
                                        required
                                    />
                                </div>
                                @error('password')
                                    <p class="mt-1 text-xs sm:text-sm text-red-500">{{ $message }}</p>
                                @enderror
                            </div>
                            
                            <!-- Login Button -->
                            <button type="submit" class="btn-gradient w-full text-white font-bold py-3.5 sm:py-4 rounded-xl text-sm sm:text-base relative overflow-hidden">
                                <span class="relative z-10 flex items-center justify-center gap-2">
                                    <svg class="w-4 h-4 sm:w-5 sm:h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"/>
                                    </svg>
                                    <span class="hidden sm:inline">Sign In to Dashboard</span>
                                    <span class="sm:hidden">Sign In</span>
                                </span>
                            </button>
                        </form>
                        
                        <!-- Footer Note -->
                        <div class="mt-5 sm:mt-6 text-center">
                            <p class="text-xs sm:text-sm text-gray-500">
                                <svg class="w-3 h-3 sm:w-4 sm:h-4 inline mr-1" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"/>
                                </svg>
                                Hubungi administrator jika lupa password
                            </p>
                        </div>
                    </div>
                    
                    <!-- Copyright -->
                    <div class="text-center mt-4 sm:mt-6">
                        <p class="text-[10px] sm:text-xs text-gray-500 px-4">
                            &copy; {{ date('Y') }} NCS Laboratory - Politeknik Negeri Malang
                        </p>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</body>
</html>
