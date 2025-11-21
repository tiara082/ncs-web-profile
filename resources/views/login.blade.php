<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome Back - NCS Lab Admin</title>
    
    <!-- Favicon - Logo NCS -->
    <link rel="icon" type="image/png" href="/ncs-web/public/img/logo.png">
    <link rel="shortcut icon" href="/ncs-web/public/img/logo.png">
    <link rel="apple-touch-icon" sizes="180x180" href="/ncs-web/public/img/logo.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/ncs-web/public/img/logo.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/ncs-web/public/img/logo.png">
    
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
        
        @keyframes float {
            0%, 100% { transform: translateY(0px) rotate(0deg); }
            50% { transform: translateY(-30px) rotate(5deg); }
        }
        
        .floating {
            animation: float 8s ease-in-out infinite;
        }
        
        @keyframes spin-slow {
            from { transform: rotate(0deg); }
            to { transform: rotate(360deg); }
        }
        
        .spin-slow {
            animation: spin-slow 20s linear infinite;
        }
        
        .modern-input {
            transition: all 0.3s ease;
        }
        
        .modern-input:focus {
            transform: translateY(-1px);
            box-shadow: 0 4px 20px rgba(102, 187, 242, 0.15);
        }
        
        .btn-primary {
            background: linear-gradient(135deg, #3b82f6 0%, #1e40af 100%);
            transition: all 0.3s ease;
        }
        
        .btn-primary:hover {
            background: linear-gradient(135deg, #2563eb 0%, #1e3a8a 100%);
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(59, 130, 246, 0.4);
        }
        
        .social-btn {
            transition: all 0.3s ease;
        }
        
        .social-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
            border-color: #3b82f6;
        }
        
        .tab-btn {
            position: relative;
            transition: all 0.3s ease;
        }
        
        .tab-active {
            color: #1e293b;
        }
        
        .tab-active::after {
            content: '';
            position: absolute;
            bottom: -2px;
            left: 0;
            right: 0;
            height: 3px;
            background: linear-gradient(90deg, #3b82f6, #1e40af);
            border-radius: 2px;
        }
        
        @keyframes pulse-slow {
            0%, 100% { opacity: 0.3; transform: scale(1); }
            50% { opacity: 0.5; transform: scale(1.05); }
        }
        
        .pulse-slow {
            animation: pulse-slow 4s ease-in-out infinite;
        }
    </style>
</head>
<body class="min-h-screen flex items-center justify-center p-4 md:p-6 lg:p-8 relative overflow-hidden" style="background: linear-gradient(135deg, #e0f2fe 0%, #f0f9ff 50%, #e0e7ff 100%);">
    
    <!-- Background Decorations -->
    <div class="absolute inset-0 overflow-hidden pointer-events-none">
        <!-- Polinema & JTI Logo Background -->
        <img src="https://avatars.githubusercontent.com/u/63681676?s=280&v=4" 
             alt="Pattern" 
             class="absolute -top-20 -right-20 w-80 h-80 opacity-5 spin-slow">
        <img src="https://avatars.githubusercontent.com/u/63681676?s=280&v=4" 
             alt="Pattern" 
             class="absolute -bottom-32 -left-32 w-96 h-96 opacity-5 spin-slow" 
             style="animation-delay: -10s;">
        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/6/64/Jti_polinema.svg/328px-Jti_polinema.svg.png?20240606144137" 
             alt="JTI Pattern" 
             class="absolute top-1/3 right-1/4 w-64 h-64 opacity-3 spin-slow" 
             style="animation-delay: -5s;">
        
        <!-- Floating Shapes -->
        <div class="absolute top-20 left-20 w-32 h-32 bg-blue-200 rounded-full blur-3xl opacity-40 pulse-slow"></div>
        <div class="absolute bottom-40 right-32 w-40 h-40 bg-indigo-200 rounded-full blur-3xl opacity-40 pulse-slow" style="animation-delay: 2s;"></div>
        <div class="absolute top-1/2 left-1/4 w-24 h-24 bg-cyan-200 rounded-full blur-3xl opacity-30 pulse-slow" style="animation-delay: 1s;"></div>
    </div>
    
    <div class="w-full max-w-7xl grid lg:grid-cols-2 gap-8 lg:gap-16 relative z-10">
        
        <!-- Left Side - Login Form -->
        <div class="flex items-center justify-center order-2 lg:order-1">
            <div class="w-full max-w-md">
                
                <!-- Logo & Title -->
                <div class="text-center mb-8">
                    <div class="inline-flex items-center gap-3 mb-6">
                        <img src="https://avatars.githubusercontent.com/u/63681676?s=280&v=4" 
                             alt="Polinema" 
                             class="w-12 h-12 object-contain mix-blend-multiply">
                        <div class="h-8 w-px bg-gray-300"></div>
                        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/6/64/Jti_polinema.svg/328px-Jti_polinema.svg.png?20240606144137" 
                             alt="JTI" 
                             class="w-12 h-12 object-contain mix-blend-multiply">
                    </div>
                    <h1 class="text-4xl font-bold text-gray-900 mb-2">Welcome Back</h1>
                    <p class="text-gray-500">Welcome Back, Please enter Your details</p>
                </div>
                
                <!-- White Card -->
                <div class="bg-white rounded-3xl shadow-xl p-8 md:p-10">
                    
                    <!-- Tabs -->
                    <div class="flex gap-8 border-b border-gray-200 mb-8">
                        <button class="tab-btn tab-active text-sm font-semibold pb-4 text-gray-500" onclick="switchTab('signin')">
                            Sign In
                        </button>
                        <button class="tab-btn text-sm font-semibold pb-4 text-gray-500" onclick="switchTab('signup')">
                            Signup
                        </button>
                    </div>
                    
                    <!-- Sign In Form -->
                    <form id="signin-form" class="space-y-5">
                        <!-- Email Input -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Email Address</label>
                            <div class="relative">
                                <div class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-400">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <rect x="2" y="4" width="20" height="16" rx="2"></rect>
                                        <path d="m2 7 10 7 10-7"></path>
                                    </svg>
                                </div>
                                <input 
                                    type="email" 
                                    placeholder="admin@ncslab.com" 
                                    class="modern-input w-full pl-12 pr-4 py-3.5 bg-gray-50 border border-gray-200 rounded-xl focus:outline-none focus:border-blue-500 focus:bg-white text-sm"
                                    required
                                />
                                <div class="absolute right-4 top-1/2 -translate-y-1/2 text-green-500 hidden">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                                        <polyline points="22 4 12 14.01 9 11.01"></polyline>
                                    </svg>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Continue Button -->
                        <button type="submit" class="btn-primary w-full text-white font-semibold py-4 rounded-xl text-sm">
                            <span id="signin-text">Continue</span>
                            <svg id="signin-spinner" class="hidden animate-spin h-5 w-5 mx-auto" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                            </svg>
                        </button>
                        
                        <!-- Divider -->
                        <div class="relative my-8">
                            <div class="absolute inset-0 flex items-center">
                                <div class="w-full border-t border-gray-200"></div>
                            </div>
                            <div class="relative flex justify-center">
                                <span class="bg-white px-4 text-xs text-gray-500">Or Continue With</span>
                            </div>
                        </div>
                        
                        <!-- Social Login Buttons -->
                        <div class="grid grid-cols-3 gap-3">
                            <button type="button" class="social-btn flex items-center justify-center py-3.5 bg-white border border-gray-200 rounded-xl">
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none">
                                    <path d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z" fill="#4285F4"/>
                                    <path d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z" fill="#34A853"/>
                                    <path d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z" fill="#FBBC05"/>
                                    <path d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z" fill="#EA4335"/>
                                </svg>
                            </button>
                            <button type="button" class="social-btn flex items-center justify-center py-3.5 bg-white border border-gray-200 rounded-xl">
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
                                    <path d="M17.05 20.28c-.98.95-2.05.8-3.08.35-1.09-.46-2.09-.48-3.24 0-1.44.62-2.2.44-3.06-.35C2.79 15.25 3.51 7.59 9.05 7.31c1.35.07 2.29.74 3.08.8 1.18-.24 2.31-.93 3.57-.84 1.51.12 2.65.72 3.4 1.8-3.12 1.87-2.38 5.98.48 7.13-.57 1.5-1.31 2.99-2.54 4.09l.01-.01zM12.03 7.25c-.15-2.23 1.66-4.07 3.74-4.25.29 2.58-2.34 4.5-3.74 4.25z"/>
                                </svg>
                            </button>
                            <button type="button" class="social-btn flex items-center justify-center py-3.5 bg-white border border-gray-200 rounded-xl">
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="#1877F2">
                                    <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                                </svg>
                            </button>
                        </div>
                    </form>
                    
                    <!-- Sign Up Form (Hidden) -->
                    <div id="signup-form" class="hidden">
                        <div class="text-center py-16">
                            <div class="w-20 h-20 bg-blue-50 rounded-full mx-auto mb-6 flex items-center justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" class="text-blue-600" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"></path>
                                    <circle cx="9" cy="7" r="4"></circle>
                                    <line x1="19" y1="8" x2="19" y2="14"></line>
                                    <line x1="22" y1="11" x2="16" y2="11"></line>
                                </svg>
                            </div>
                            <h3 class="text-xl font-bold text-gray-900 mb-2">Registration Coming Soon</h3>
                            <p class="text-gray-600 text-sm">Please contact administrator for account registration</p>
                        </div>
                    </div>
                    
                </div>
                
                <!-- Footer Text -->
                <p class="text-center text-sm text-gray-500 mt-8">
                    Join the millions of smart developers who trust NCS Lab. Log in to access your personalized dashboard, track your progress, and collaborate with team.
                </p>
                
            </div>
        </div>
        
        <!-- Right Side - 3D Safe Illustration -->
        <div class="flex items-center justify-center order-1 lg:order-2">
            <div class="relative w-full max-w-xl">
                <!-- Safe/Vault Illustration -->
                <div class="floating relative">
                    <div class="relative aspect-square max-w-md mx-auto">
                        <!-- 3D Cube Effect -->
                        <div class="absolute inset-0 bg-gradient-to-br from-blue-400 via-blue-300 to-indigo-400 rounded-[4rem] shadow-2xl transform rotate-6"></div>
                        <div class="absolute inset-0 bg-gradient-to-br from-blue-500 via-cyan-400 to-blue-400 rounded-[4rem] shadow-2xl">
                            <!-- Safe Door -->
                            <div class="absolute inset-0 flex items-center justify-center p-12">
                                <div class="relative w-full h-full bg-gradient-to-br from-slate-700 to-slate-800 rounded-[3rem] shadow-inner p-8">
                                    <!-- Lock Circle -->
                                    <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2">
                                        <div class="relative w-32 h-32 bg-gradient-to-br from-cyan-400 to-cyan-500 rounded-full shadow-2xl">
                                            <!-- Inner Circle Details -->
                                            <div class="absolute inset-4 bg-gradient-to-br from-slate-600 to-slate-700 rounded-full"></div>
                                            <div class="absolute inset-8 bg-gradient-to-br from-cyan-300 to-cyan-400 rounded-full"></div>
                                            <div class="absolute inset-10 bg-slate-700 rounded-full"></div>
                                            <!-- Center Dot -->
                                            <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-3 h-3 bg-cyan-400 rounded-full"></div>
                                        </div>
                                        <!-- Lock Handle -->
                                        <div class="absolute top-1/2 left-1/2 -translate-x-1/2 translate-y-12 w-2 h-16 bg-gradient-to-b from-cyan-300 to-cyan-400 rounded-full shadow-lg"></div>
                                    </div>
                                    
                                    <!-- Corner Bolts -->
                                    <div class="absolute top-6 left-6 w-4 h-4 bg-slate-600 rounded-full shadow-inner"></div>
                                    <div class="absolute top-6 right-6 w-4 h-4 bg-slate-600 rounded-full shadow-inner"></div>
                                    <div class="absolute bottom-6 left-6 w-4 h-4 bg-slate-600 rounded-full shadow-inner"></div>
                                    <div class="absolute bottom-6 right-6 w-4 h-4 bg-slate-600 rounded-full shadow-inner"></div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Glowing Effects -->
                        <div class="absolute -inset-8 bg-gradient-to-br from-blue-300/30 via-cyan-300/20 to-indigo-300/30 rounded-full blur-3xl pulse-slow"></div>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
    
    <script>
        // Tab Switching
        function switchTab(tab) {
            const signinTab = document.querySelector('[onclick="switchTab(\'signin\')"]');
            const signupTab = document.querySelector('[onclick="switchTab(\'signup\')"]');
            const signinForm = document.getElementById('signin-form');
            const signupForm = document.getElementById('signup-form');
            
            if (tab === 'signin') {
                signinTab.classList.add('tab-active');
                signupTab.classList.remove('tab-active');
                signinForm.classList.remove('hidden');
                signupForm.classList.add('hidden');
            } else {
                signupTab.classList.add('tab-active');
                signinTab.classList.remove('tab-active');
                signupForm.classList.remove('hidden');
                signinForm.classList.add('hidden');
            }
        }
        
        // Form Submit Loading
        document.getElementById('signin-form').addEventListener('submit', function(e) {
            e.preventDefault();
            
            const submitText = document.getElementById('signin-text');
            const submitSpinner = document.getElementById('signin-spinner');
            const submitButton = this.querySelector('button[type="submit"]');
            
            submitText.classList.add('hidden');
            submitSpinner.classList.remove('hidden');
            submitButton.disabled = true;
            
            // Simulate loading
            setTimeout(() => {
                submitText.classList.remove('hidden');
                submitSpinner.classList.add('hidden');
                submitButton.disabled = false;
                
                // Demo alert
                alert('🔐 Demo: Login functionality will be connected to backend\n\nSuggested credentials:\nEmail: admin@ncslab.com\nPassword: admin123');
            }, 1500);
        });
    </script>
    
</body>
</html>
