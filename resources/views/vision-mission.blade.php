<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Vision & Mission - Network & Cyber Security Lab</title>
    <meta name="description" content="Vision and mission of Network and Cyber Security Laboratory at Malang State Polytechnic"/>
    <link rel="icon" type="image/x-icon" href="/favicon.ico"/>
    <link rel="preconnect" href="https://fonts.googleapis.com"/>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin/>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet"/>
    
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
                    Vision & Mission
                </h1>
                <p class="text-lg text-white/80 max-w-2xl mx-auto">
                    Guiding principles that drive our innovation and excellence
                </p>
            </div>
        </div>
    </section>

    <!-- Vision & Mission Content Section -->
    <section class="relative py-20 px-4 sm:px-6 lg:px-8 bg-gradient-to-br from-white via-cyan-50/30 to-blue-50/20 overflow-hidden">
        <!-- Animated Background Elements -->
        <div class="absolute top-0 left-0 w-full h-full overflow-hidden">
            <div class="absolute top-20 left-20 w-96 h-96 bg-blue-500/5 rounded-full blur-3xl animate-float"></div>
            <div class="absolute bottom-20 right-20 w-96 h-96 bg-cyan-500/5 rounded-full blur-3xl animate-float" style="animation-delay: 2s"></div>
            <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[500px] h-[500px] bg-primary/5 rounded-full blur-3xl animate-pulse"></div>
        </div>
        <!-- Grid Pattern -->
        <div class="absolute inset-0 bg-[linear-gradient(rgba(102,187,242,0.03)_1px,transparent_1px),linear-gradient(90deg,rgba(102,187,242,0.03)_1px,transparent_1px)] bg-[size:64px_64px] opacity-20"></div>
        
        <div class="max-w-7xl mx-auto relative z-10">
            <!-- Vision & Mission Side by Side -->
            <div class="grid lg:grid-cols-2 gap-8 mb-12">
                <!-- Vision Card -->
                <div class="animate-fade-in-up" style="animation-delay: 0.2s">
                    <div class="group relative p-8 bg-white rounded-3xl border-2 border-border hover:border-primary/50 transition-all duration-500 hover:shadow-2xl hover:shadow-primary/20 overflow-hidden h-full">
                        <!-- Glow Effect -->
                        <div class="absolute inset-0 bg-gradient-to-br from-primary/0 via-primary/5 to-accent/0 opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                        
                        <div class="relative h-full flex flex-col">
                            <!-- Icon & Title -->
                            <div class="text-center mb-6">
                                <div class="relative inline-block mb-4">
                                    <div class="absolute inset-0 bg-primary/20 rounded-2xl blur-xl opacity-50 group-hover:opacity-75 transition-opacity"></div>
                                    <div class="relative w-20 h-20 bg-gradient-to-br from-primary/20 to-primary/10 rounded-2xl flex items-center justify-center group-hover:scale-110 group-hover:rotate-6 transition-all duration-300 shadow-lg border border-primary/30 mx-auto">
                                        <i data-feather="eye" class="text-primary" width="40" height="40"></i>
                                    </div>
                                </div>
                                <h3 class="text-3xl font-bold text-foreground mb-2">Vision</h3>
                                <div class="h-1 w-16 bg-primary rounded-full mx-auto"></div>
                            </div>
                            
                            <!-- Content -->
                            <div class="flex-1 space-y-6">
                                <p class="text-lg text-muted-foreground leading-loose text-center">
                                    To become a <span class="text-foreground font-semibold">leading laboratory</span> in the field of networking and cybersecurity that is <span class="text-foreground font-semibold">innovative, adaptive, and globally competitive</span>.
                                </p>
                                <div class="h-px w-24 bg-border mx-auto"></div>
                                <p class="text-lg text-muted-foreground leading-loose text-center">
                                    While supporting the development of <span class="text-foreground font-semibold">education, research, and community service</span> in Information Technology.
                                </p>
                                <div class="mt-8 pt-6 border-t border-border">
                                    <p class="text-base text-muted-foreground italic text-center">
                                        Driving excellence through innovation, collaboration, and continuous advancement in cybersecurity education and research.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Mission Card -->
                <div class="animate-fade-in-up" style="animation-delay: 0.4s">
                    <div class="group relative p-8 bg-white rounded-3xl border-2 border-border hover:border-primary/50 transition-all duration-500 hover:shadow-2xl hover:shadow-primary/20 overflow-hidden h-full">
                        <!-- Glow Effect -->
                        <div class="absolute inset-0 bg-gradient-to-br from-primary/0 via-primary/5 to-accent/0 opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                        
                        <div class="relative h-full flex flex-col">
                            <!-- Icon & Title -->
                            <div class="text-center mb-6">
                                <div class="relative inline-block mb-4">
                                    <div class="absolute inset-0 bg-primary/20 rounded-2xl blur-xl opacity-50 group-hover:opacity-75 transition-opacity"></div>
                                    <div class="relative w-20 h-20 bg-gradient-to-br from-primary/20 to-primary/10 rounded-2xl flex items-center justify-center group-hover:scale-110 group-hover:-rotate-6 transition-all duration-300 shadow-lg border border-primary/30 mx-auto">
                                        <i data-feather="target" class="text-primary" width="40" height="40"></i>
                                    </div>
                                </div>
                                <h3 class="text-3xl font-bold text-foreground mb-2">Mission</h3>
                                <div class="h-1 w-16 bg-primary rounded-full mx-auto"></div>
                            </div>
                            
                            <!-- Mission Items -->
                            <div class="flex-1 space-y-4">
                                <div class="flex items-start gap-4">
                                    <div class="flex-shrink-0 w-8 h-8 bg-primary/20 rounded-lg flex items-center justify-center">
                                        <span class="text-primary font-bold text-sm">1</span>
                                    </div>
                                    <p class="text-muted-foreground text-base leading-relaxed">Conduct <span class="text-foreground font-semibold">high-quality practicum activities</span> to produce graduates with advanced competencies in computer networking and cybersecurity.</p>
                                </div>
                                
                                <div class="flex items-start gap-4">
                                    <div class="flex-shrink-0 w-8 h-8 bg-primary/20 rounded-lg flex items-center justify-center">
                                        <span class="text-primary font-bold text-sm">2</span>
                                    </div>
                                    <p class="text-muted-foreground text-base leading-relaxed">Develop <span class="text-foreground font-semibold">applied research</span> in networking, system security, IoT, and monitoring technologies relevant to industry needs.</p>
                                </div>
                                
                                <div class="flex items-start gap-4">
                                    <div class="flex-shrink-0 w-8 h-8 bg-primary/20 rounded-lg flex items-center justify-center">
                                        <span class="text-primary font-bold text-sm">3</span>
                                    </div>
                                    <p class="text-muted-foreground text-base leading-relaxed">Provide <span class="text-foreground font-semibold">security testing services</span>, mentoring, and training through collaboration with industry, government, and institutions.</p>
                                </div>
                                
                                <div class="flex items-start gap-4">
                                    <div class="flex-shrink-0 w-8 h-8 bg-primary/20 rounded-lg flex items-center justify-center">
                                        <span class="text-primary font-bold text-sm">4</span>
                                    </div>
                                    <p class="text-muted-foreground text-base leading-relaxed">Enhance <span class="text-foreground font-semibold">capacity of staff</span> in mastering current technologies through training, certification, and professional participation.</p>
                                </div>
                                
                                <div class="flex items-start gap-4">
                                    <div class="flex-shrink-0 w-8 h-8 bg-primary/20 rounded-lg flex items-center justify-center">
                                        <span class="text-primary font-bold text-sm">5</span>
                                    </div>
                                    <p class="text-muted-foreground text-base leading-relaxed">Support <span class="text-foreground font-semibold">digital security literacy improvement</span> in society through workshops, seminars, and IT-based community service programs.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Research Focus Areas -->
            <div class="mt-24">
                <div class="text-center mb-12">
                    <h3 class="text-3xl md:text-4xl font-bold text-foreground mb-4">Research Focus</h3>
                    <p class="text-muted-foreground text-base">Core domains of our cybersecurity research and development</p>
                </div>
                <div class="grid md:grid-cols-3 gap-6">
                    <div class="group p-6 bg-white rounded-xl border-2 border-border hover:border-primary/50 transition-all duration-300 hover:shadow-xl hover:shadow-primary/20 hover:-translate-y-1">
                        <div class="flex items-center gap-4">
                            <div class="w-12 h-12 bg-gradient-to-br from-primary/20 to-primary/10 rounded-lg flex items-center justify-center group-hover:scale-110 group-hover:rotate-6 transition-all duration-300">
                                <i data-feather="settings" class="text-primary" width="24" height="24"></i>
                            </div>
                            <p class="text-foreground text-base font-semibold">Network Administration & Engineering</p>
                        </div>
                    </div>
                    <div class="group p-6 bg-white rounded-xl border-2 border-border hover:border-primary/50 transition-all duration-300 hover:shadow-xl hover:shadow-primary/20 hover:-translate-y-1">
                        <div class="flex items-center gap-4">
                            <div class="w-12 h-12 bg-gradient-to-br from-primary/20 to-primary/10 rounded-lg flex items-center justify-center group-hover:scale-110 group-hover:rotate-6 transition-all duration-300">
                                <i data-feather="shield" class="text-primary" width="24" height="24"></i>
                            </div>
                            <p class="text-foreground text-base font-semibold">Cyber Defense</p>
                        </div>
                    </div>
                    <div class="group p-6 bg-white rounded-xl border-2 border-border hover:border-primary/50 transition-all duration-300 hover:shadow-xl hover:shadow-primary/20 hover:-translate-y-1">
                        <div class="flex items-center gap-4">
                            <div class="w-12 h-12 bg-gradient-to-br from-primary/20 to-primary/10 rounded-lg flex items-center justify-center group-hover:scale-110 group-hover:rotate-6 transition-all duration-300">
                                <i data-feather="crosshair" class="text-primary" width="24" height="24"></i>
                            </div>
                            <p class="text-foreground text-base font-semibold">Offensive Security</p>
                        </div>
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
        // Initialize Feather Icons for footer
        feather.replace();
    </script>
</body>
</html>
