<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Laboratory Profile - Network & Cyber Security Lab</title>
    <meta name="description" content="Profile and overview of Network and Cyber Security Laboratory at Malang State Polytechnic"/>
    <link rel="icon" type="image/x-icon" href="/favicon.ico"/>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/feather-icons"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com"/>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin/>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet"/>
    
    @include('partials.custom-scrollbar-styles')
    @include('partials.shared-styles')
    
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#66bbf2',
                        secondary: '#222f7f',
                        accent: '#66bbf2',
                        background: '#ffffff',
                        foreground: '#0a0a0a',
                        card: '#ffffff',
                        'card-foreground': '#0a0a0a',
                        muted: '#f1f5f9',
                        'muted-foreground': '#64748b',
                        border: '#e2e8f0',
                    },
                    fontFamily: {
                        sans: ['Poppins', 'sans-serif'],
                    },
                    animation: {
                        'float': 'float 6s ease-in-out infinite',
                        'fade-in-up': 'fadeInUp 0.6s ease-out',
                        'pulse': 'pulse 4s cubic-bezier(0.4, 0, 0.6, 1) infinite',
                    },
                    keyframes: {
                        float: {
                            '0%, 100%': { transform: 'translateY(0px)' },
                            '50%': { transform: 'translateY(-20px)' },
                        },
                        fadeInUp: {
                            '0%': { opacity: '0', transform: 'translateY(20px)' },
                            '100%': { opacity: '1', transform: 'translateY(0)' },
                        },
                    },
                }
            }
        }
    </script>
</head>
<body class="bg-background text-foreground">
    @include('partials.scroll-progress')
    
    <!-- Navigation from Navbar Partial -->
    @include('partials.navbar')

    <!-- Hero Section -->
    <section class="relative pt-32 pb-16 px-4 sm:px-6 lg:px-8 overflow-hidden">
        <!-- Background Video/Image -->
        <div class="absolute inset-0 z-0">
            <img src="https://images.unsplash.com/photo-1639322537228-f710d846310a?q=80&w=2000" alt="Cybersecurity Background" class="w-full h-full object-cover"/>
            <div class="absolute inset-0 bg-gradient-to-br from-slate-900/90 via-blue-950/85 to-indigo-950/90"></div>
        </div>
        <!-- Animated Grid Pattern -->
        <div class="absolute inset-0 z-0 opacity-10">
            <div class="absolute inset-0 bg-[linear-gradient(rgba(255,255,255,0.05)_1px,transparent_1px),linear-gradient(90deg,rgba(255,255,255,0.05)_1px,transparent_1px)] bg-[size:64px_64px]"></div>
        </div>
        <div class="max-w-7xl mx-auto relative z-10 text-center">
            <div class="animate-fade-in-up">
                <h1 class="text-4xl md:text-5xl font-bold text-white mb-4">
                    Laboratory Profile
                </h1>
                <p class="text-lg text-white/80 max-w-2xl mx-auto">
                    Network & Cyber Security Laboratory overview and capabilities
                </p>
            </div>
        </div>
    </section>

    <!-- Profile Content Section -->
    <section class="relative py-20 px-4 sm:px-6 lg:px-8 bg-gradient-to-br from-background via-cyan-50/30 to-blue-50/20 overflow-hidden">
        <div class="absolute top-0 right-0 w-96 h-96 bg-primary/5 rounded-full blur-3xl animate-float"></div>
        <div class="absolute bottom-0 left-0 w-96 h-96 bg-blue-500/5 rounded-full blur-3xl animate-float" style="animation-delay: 2s"></div>
        
        <div class="max-w-7xl mx-auto relative z-10">
            <div class="text-center mb-12 animate-fade-in-up">
                <div class="inline-flex items-center gap-2 mb-6 text-primary font-bold">
                    <div class="h-1 w-8 bg-primary rounded-full"></div>
                    <span class="text-sm uppercase tracking-widest">About Us</span>
                </div>
                <h2 class="text-4xl md:text-5xl font-bold bg-gradient-to-r from-primary via-secondary to-accent bg-clip-text text-transparent mb-4">Laboratory Overview</h2>
                <p class="text-lg text-muted-foreground max-w-2xl mx-auto">Advancing cybersecurity education and research excellence</p>
            </div>

            <!-- Main Content -->
            <div class="grid md:grid-cols-2 gap-12 mb-16">
                <!-- Left Column -->
                <div class="space-y-6 animate-fade-in-up">
                    <div class="group relative bg-white rounded-2xl border-2 border-border p-8 shadow-lg hover-lift hover:border-primary/50 transition-all duration-300">
                        <div class="absolute top-0 right-0 w-32 h-32 bg-primary/5 rounded-full blur-2xl opacity-0 group-hover:opacity-100 transition-opacity"></div>
                        <div class="relative">
                            <div class="flex items-center gap-4 mb-4">
                                <div class="w-14 h-14 bg-gradient-to-br from-primary/20 to-accent/20 rounded-xl flex items-center justify-center group-hover:scale-110 transition-transform shadow-lg">
                                    <i data-feather="briefcase" class="text-primary" width="28" height="28"></i>
                                </div>
                                <h3 class="text-2xl font-bold text-foreground">Who We Are</h3>
                            </div>
                            <p class="text-muted-foreground leading-relaxed">
                                An academic support unit within the Information Technology Department focused on developing competencies in computer networking and cybersecurity. This laboratory supports practicum activities, research, and development related to network administration, infrastructure security, data traffic monitoring, and the implementation of information security technologies to protect organizational digital assets.
                            </p>
                            <div class="mt-4 flex items-center gap-2 text-sm text-primary font-semibold">
                                <div class="w-8 h-px bg-primary"></div>
                                <span>Academic Excellence</span>
                            </div>
                        </div>
                    </div>

                    <div class="group relative bg-white rounded-2xl border-2 border-border p-8 shadow-lg hover-lift hover:border-primary/50 transition-all duration-300">
                        <div class="absolute top-0 right-0 w-32 h-32 bg-accent/5 rounded-full blur-2xl opacity-0 group-hover:opacity-100 transition-opacity"></div>
                        <div class="relative">
                            <div class="flex items-center gap-4 mb-4">
                                <div class="w-14 h-14 bg-gradient-to-br from-accent/20 to-primary/20 rounded-xl flex items-center justify-center group-hover:scale-110 transition-transform shadow-lg">
                                    <i data-feather="target" class="text-primary" width="28" height="28"></i>
                                </div>
                                <h3 class="text-2xl font-bold text-foreground">Our Purpose</h3>
                            </div>
                            <p class="text-muted-foreground leading-relaxed">
                                Beyond serving as a learning facility for students, the Network & Cyber Security Laboratory also functions as a platform for research and innovation for both faculty and students in examining solutions in the fields of network security, system testing, as well as data and digital infrastructure protection.
                            </p>
                            <div class="mt-4 flex items-center gap-2 text-sm text-primary font-semibold">
                                <div class="w-8 h-px bg-primary"></div>
                                <span>Innovation & Research</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Right Column - Image Gallery -->
                <div class="space-y-6 animate-fade-in-up" style="animation-delay: 0.2s">
                    <!-- Main Image -->
                    <div class="group relative bg-white rounded-2xl overflow-hidden border-2 border-border shadow-lg hover-lift hover:border-primary/50 transition-all duration-300" style="height: 404px;">
                        <div class="absolute top-0 right-0 w-32 h-32 bg-primary/5 rounded-full blur-2xl opacity-0 group-hover:opacity-100 transition-opacity"></div>
                        <img src="https://jti.polinema.ac.id/wp-content/uploads/2025/08/IMG_2937-scaled.jpg" alt="Laboratory 1" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105"/>
                    </div>
                    
                    <!-- Small Images Grid -->
                    <div class="grid grid-cols-2 gap-6">
                        <div class="group relative bg-white rounded-2xl overflow-hidden border-2 border-border shadow-lg hover-lift hover:border-primary/50 transition-all duration-300">
                            <div class="absolute top-0 right-0 w-32 h-32 bg-accent/5 rounded-full blur-2xl opacity-0 group-hover:opacity-100 transition-opacity"></div>
                            <img src="https://jti.polinema.ac.id/wp-content/uploads/2025/08/IMG_2936-scaled.jpg" alt="Laboratory 2" class="w-full h-48 object-cover transition-transform duration-500 group-hover:scale-105"/>
                        </div>
                        
                        <div class="group relative bg-white rounded-2xl overflow-hidden border-2 border-border shadow-lg hover-lift hover:border-primary/50 transition-all duration-300">
                            <div class="absolute top-0 right-0 w-32 h-32 bg-primary/5 rounded-full blur-2xl opacity-0 group-hover:opacity-100 transition-opacity"></div>
                            <img src="https://jti.polinema.ac.id/wp-content/uploads/2025/08/IMG_2766-scaled.jpg" alt="Laboratory 3" class="w-full h-48 object-cover transition-transform duration-500 group-hover:scale-105"/>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Statistics & Highlights -->
            <div class="grid md:grid-cols-3 gap-6">
                <div class="group relative bg-white rounded-2xl border-2 border-border p-6 shadow-lg hover-lift hover:border-primary/50 transition-all duration-300">
                    <div class="absolute top-0 right-0 w-32 h-32 bg-primary/5 rounded-full blur-2xl opacity-0 group-hover:opacity-100 transition-opacity"></div>
                    <div class="relative text-center">
                        <div class="inline-flex items-center justify-center w-12 h-12 bg-gradient-to-br from-primary/20 to-accent/20 rounded-xl mb-3 group-hover:scale-110 transition-transform">
                            <i data-feather="users" class="text-primary" width="24" height="24"></i>
                        </div>
                        <div class="text-3xl font-bold text-primary mb-2">50+</div>
                        <div class="text-sm font-semibold text-foreground uppercase tracking-wide mb-1">Active Students</div>
                        <p class="text-xs text-muted-foreground">Enrolled in practicum programs</p>
                    </div>
                </div>
                <div class="group relative bg-white rounded-2xl border-2 border-border p-6 shadow-lg hover-lift hover:border-primary/50 transition-all duration-300">
                    <div class="absolute top-0 right-0 w-32 h-32 bg-accent/5 rounded-full blur-2xl opacity-0 group-hover:opacity-100 transition-opacity"></div>
                    <div class="relative text-center">
                        <div class="inline-flex items-center justify-center w-12 h-12 bg-gradient-to-br from-accent/20 to-primary/20 rounded-xl mb-3 group-hover:scale-110 transition-transform">
                            <i data-feather="search" class="text-primary" width="24" height="24"></i>
                        </div>
                        <div class="text-3xl font-bold text-primary mb-2">15+</div>
                        <div class="text-sm font-semibold text-foreground uppercase tracking-wide mb-1">Research Projects</div>
                        <p class="text-xs text-muted-foreground">Ongoing cybersecurity research</p>
                    </div>
                </div>
                <div class="group relative bg-white rounded-2xl border-2 border-border p-6 shadow-lg hover-lift hover:border-primary/50 transition-all duration-300">
                    <div class="absolute top-0 right-0 w-32 h-32 bg-primary/5 rounded-full blur-2xl opacity-0 group-hover:opacity-100 transition-opacity"></div>
                    <div class="relative text-center">
                        <div class="inline-flex items-center justify-center w-12 h-12 bg-gradient-to-br from-primary/20 to-accent/20 rounded-xl mb-3 group-hover:scale-110 transition-transform">
                            <i data-feather="award" class="text-primary" width="24" height="24"></i>
                        </div>
                        <div class="text-3xl font-bold text-primary mb-2">25+</div>
                        <div class="text-sm font-semibold text-foreground uppercase tracking-wide mb-1">Published Projects</div>
                        <p class="text-xs text-muted-foreground">Academic & industry publications</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    @include('partials.footer')

    <!-- Back to Top Button -->
    @include('partials.back-to-top')

    <!-- Shared Scripts -->
    @include('partials.shared-scripts')
    
    <script>
        // Initialize Feather Icons
        feather.replace();
    </script>
</body>
</html>
