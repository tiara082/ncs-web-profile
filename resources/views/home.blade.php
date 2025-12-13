<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <title>Network & Cyber Security Lab | Malang State Polytechnic</title>
    <meta name="description" content="Professional laboratory profile for Network and Cyber Security research and education at Malang State Polytechnic"/>
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
    <style>
        @keyframes gradient-shift {
            0%, 100% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
        }
        @keyframes float {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-20px); }
        }
        @keyframes fade-in-up {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        @keyframes slide-down {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        @keyframes pulse-glow {
            0%, 100% { box-shadow: 0 0 20px rgba(102, 187, 242, 0.4); }
            50% { box-shadow: 0 0 40px rgba(102, 187, 242, 0.6); }
        }
        @keyframes bounce-in {
            0% { transform: scale(0.8); opacity: 0; }
            50% { transform: scale(1.05); }
            100% { transform: scale(1); opacity: 1; }
        }
        @keyframes shimmer {
            0% { background-position: -200% center; }
            100% { background-position: 200% center; }
        }
        .animate-gradient-shift {
            animation: gradient-shift 8s ease infinite;
        }
        .animate-float {
            animation: float 6s ease-in-out infinite;
        }
        .animate-fade-in-up {
            animation: fade-in-up 0.8s ease-out forwards;
        }
        .animate-slide-down {
            animation: slide-down 0.6s ease-out forwards;
        }
        .animate-slide-down-delay-1 {
            animation: slide-down 0.6s ease-out 0.2s forwards;
            opacity: 0;
        }
        .animate-slide-down-delay-2 {
            animation: slide-down 0.6s ease-out 0.4s forwards;
            opacity: 0;
        }
        .animate-bounce-in {
            animation: bounce-in 0.6s cubic-bezier(0.68, -0.55, 0.265, 1.55) forwards;
        }
        .hover-glow {
            transition: all 0.3s ease;
        }
        .hover-glow:hover {
            box-shadow: 0 0 30px rgba(102, 187, 242, 0.3);
        }
        .hover-lift {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }
        .hover-lift:hover {
            transform: translateY(-8px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
        }
        .glass-effect {
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.1);
        }
        .shimmer-effect {
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            background-size: 200% 100%;
            animation: shimmer 2s infinite;
        }
        .group:hover .group-hover\:scale-105 {
            transform: scale(1.05);
        }
        .group:hover .group-hover\:scale-110 {
            transform: scale(1.1);
        }
        .group:hover .group-hover\:rotate-3 {
            transform: rotate(3deg);
        }
        .group:hover .group-hover\:rotate-12 {
            transform: rotate(12deg);
        }
        .group:hover .group-hover\:-rotate-3 {
            transform: rotate(-3deg);
        }
        .group:hover .group-hover\:translate-x-1 {
            transform: translateX(0.25rem);
        }
        .group:hover .group-hover\:translate-x-2 {
            transform: translateX(0.5rem);
        }
        .group:hover .group-hover\:-translate-y-1 {
            transform: translateY(-0.25rem);
        }
        .scroll-smooth {
            scroll-behavior: smooth;
        }
        /* Mobile menu styles */
        .mobile-menu {
            transform: translateX(100%);
            transition: transform 0.3s ease-in-out;
        }
        .mobile-menu.active {
            transform: translateX(0);
        }
        /* Remove white background from Polinema logo */
        .logo-polinema {
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            overflow: hidden;
            border-radius: 50%;
            padding: 1px;
        }
        .logo-polinema img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 50%;
        }
    </style>
</head>
<body class="font-sans antialiased scroll-smooth">
    @include('partials.scroll-progress')
    
    <div class="min-h-screen bg-background">
        <!-- Header (Navbar + Hero) -->
        @include('partials.header')


        <!-- About Section -->
        <section id="about" class="relative py-12 sm:py-16 md:py-24 px-4 sm:px-6 lg:px-8 bg-gradient-to-br from-background via-cyan-50/30 to-blue-50/20 overflow-hidden">
            <div class="absolute top-0 right-0 w-96 h-96 bg-primary/5 rounded-full blur-3xl animate-float"></div>
            <div class="absolute bottom-0 left-0 w-96 h-96 bg-blue-500/5 rounded-full blur-3xl animate-float" style="animation-delay: 2s"></div>
            <div class="max-w-6xl mx-auto relative z-10">
                <div class="grid md:grid-cols-2 gap-8 md:gap-16 items-center">
                    <div class="animate-fade-in-up">
                        <div class="inline-flex items-center gap-2 mb-4 sm:mb-6 text-primary font-bold">
                            <div class="h-1 w-8 bg-primary rounded-full"></div>
                            <span class="text-xs sm:text-sm uppercase tracking-widest">About Us</span>
                        </div>
                        <h2 class="text-3xl sm:text-4xl md:text-5xl font-bold bg-gradient-to-r from-primary via-secondary to-accent bg-clip-text text-transparent mb-4 sm:mb-6">Laboratory Profile</h2>
                        <div class="space-y-3 sm:space-y-5 text-muted-foreground leading-relaxed text-sm sm:text-base">
                            <p>An academic support unit within the Information Technology Department focused on developing competencies in computer networking and cybersecurity. This laboratory supports practicum activities, research, and development related to network administration, infrastructure security, data traffic monitoring, and the implementation of information security technologies to protect organizational digital assets.</p>
                            <p>Beyond serving as a learning facility for students, the Network & Cyber Security Laboratory also functions as a platform for research and innovation for both faculty and students in examining solutions in the fields of network security, system testing, as well as data and digital infrastructure protection.</p>
                            <p class="font-medium text-foreground">The role of this laboratory is expected to strengthen the quality of learning, deepen research in computer networking and information security, and support the creation of competent graduates in network administration and cybersecurity.</p>
                        </div>
                        <div class="mt-6 sm:mt-10 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-3 sm:gap-4">
                            <div class="group relative overflow-hidden p-4 sm:p-5 bg-white rounded-2xl border-2 border-primary/20 hover:border-primary transition-all duration-300 hover:shadow-xl hover:shadow-primary/20 hover:-translate-y-2 cursor-pointer">
                                <div class="absolute top-0 right-0 w-20 h-20 bg-gradient-to-bl from-primary/10 to-transparent rounded-bl-full opacity-0 group-hover:opacity-100 transition-opacity"></div>
                                <div class="relative">
                                    <div class="text-2xl sm:text-3xl font-bold text-primary mb-1 sm:mb-2 group-hover:scale-110 transition-transform">50+</div>
                                    <div class="text-[10px] sm:text-xs font-semibold text-muted-foreground uppercase tracking-wide">Active Members</div>
                                </div>
                            </div>
                            <div class="group relative overflow-hidden p-4 sm:p-5 bg-white rounded-2xl border-2 border-primary/20 hover:border-primary transition-all duration-300 hover:shadow-xl hover:shadow-primary/20 hover:-translate-y-2 cursor-pointer">
                                <div class="absolute top-0 right-0 w-20 h-20 bg-gradient-to-bl from-primary/10 to-transparent rounded-bl-full opacity-0 group-hover:opacity-100 transition-opacity"></div>
                                <div class="relative">
                                    <div class="text-2xl sm:text-3xl font-bold text-primary mb-1 sm:mb-2 group-hover:scale-110 transition-transform">15+</div>
                                    <div class="text-[10px] sm:text-xs font-semibold text-muted-foreground uppercase tracking-wide">Lab Activities</div>
                                </div>
                            </div>
                            <div class="group relative overflow-hidden p-4 sm:p-5 bg-white rounded-2xl border-2 border-primary/20 hover:border-primary transition-all duration-300 hover:shadow-xl hover:shadow-primary/20 hover:-translate-y-2 cursor-pointer">
                                <div class="absolute top-0 right-0 w-20 h-20 bg-gradient-to-bl from-primary/10 to-transparent rounded-bl-full opacity-0 group-hover:opacity-100 transition-opacity"></div>
                                <div class="relative">
                                    <div class="text-2xl sm:text-3xl font-bold text-primary mb-1 sm:mb-2 group-hover:scale-110 transition-transform">25+</div>
                                    <div class="text-[10px] sm:text-xs font-semibold text-muted-foreground uppercase tracking-wide">Research Publications</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Image Slider -->
                    <div class="group/slider relative h-64 sm:h-80 md:h-96 bg-gradient-to-br from-primary/10 to-secondary/10 rounded-2xl overflow-hidden border border-border hover:border-primary/50 transition-all hover:shadow-2xl">
                        <!-- Slider Container -->
                        <div id="lab-slider" class="relative w-full h-full">
                            <!-- Slide 1 -->
                            <div class="slider-item absolute w-full h-full transition-opacity duration-500 opacity-100">
                                <img src="https://jti.polinema.ac.id/wp-content/uploads/2025/08/IMG_2937-scaled.jpg" alt="Laboratory 1" class="w-full h-full object-cover"/>
                                <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent"></div>
                                <div class="absolute bottom-0 left-0 right-0 p-6 text-white">
                                    <h3 class="text-xl font-bold mb-2">Laboratory Facilities</h3>
                                    <p class="text-sm text-white/80">State-of-the-art equipment for cybersecurity research</p>
                                </div>
                            </div>
                            <!-- Slide 2 -->
                            <div class="slider-item absolute w-full h-full transition-opacity duration-500 opacity-0">
                                <img src="https://jti.polinema.ac.id/wp-content/uploads/2025/08/IMG_2936-scaled.jpg" alt="Laboratory 2" class="w-full h-full object-cover"/>
                                <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent"></div>
                                <div class="absolute bottom-0 left-0 right-0 p-6 text-white">
                                    <h3 class="text-xl font-bold mb-2">Network Infrastructure</h3>
                                    <p class="text-sm text-white/80">Advanced networking and security systems</p>
                                </div>
                            </div>
                            <!-- Slide 3 -->
                            <div class="slider-item absolute w-full h-full transition-opacity duration-500 opacity-0">
                                <img src="https://jti.polinema.ac.id/wp-content/uploads/2025/08/IMG_2766-scaled.jpg" alt="Laboratory 3" class="w-full h-full object-cover"/>
                                <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent"></div>
                                <div class="absolute bottom-0 left-0 right-0 p-6 text-white">
                                    <h3 class="text-xl font-bold mb-2">Research Environment</h3>
                                    <p class="text-sm text-white/80">Dedicated space for cybersecurity research</p>
                                </div>
                            </div>
                            <!-- Slide 4 -->
                            <div class="slider-item absolute w-full h-full transition-opacity duration-500 opacity-0">
                                <img src="https://jti.polinema.ac.id/wp-content/uploads/2025/08/IMG_2764-scaled.jpg" alt="Laboratory 4" class="w-full h-full object-cover"/>
                                <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent"></div>
                                <div class="absolute bottom-0 left-0 right-0 p-6 text-white">
                                    <h3 class="text-xl font-bold mb-2">Learning Space</h3>
                                    <p class="text-sm text-white/80">Modern facilities for hands-on learning</p>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Navigation Arrows -->
                        <button id="prev-slide" class="absolute left-4 top-1/2 -translate-y-1/2 z-10 bg-white/10 backdrop-blur-sm text-white p-3 rounded-full transition-all opacity-0 group-hover/slider:opacity-100 hover:bg-white/20 hover:scale-110">
                            <i data-feather="chevron-left" width="24" height="24"></i>
                        </button>
                        <button id="next-slide" class="absolute right-4 top-1/2 -translate-y-1/2 z-10 bg-white/10 backdrop-blur-sm text-white p-3 rounded-full transition-all opacity-0 group-hover/slider:opacity-100 hover:bg-white/20 hover:scale-110">
                            <i data-feather="chevron-right" width="24" height="24"></i>
                        </button>
                        
                        <!-- Dots Indicator -->
                        <div class="absolute bottom-4 left-1/2 -translate-x-1/2 z-10 flex gap-2">
                            <button class="slider-dot w-2.5 h-2.5 rounded-full bg-white transition-all" data-slide="0"></button>
                            <button class="slider-dot w-2.5 h-2.5 rounded-full bg-white/40 transition-all" data-slide="1"></button>
                            <button class="slider-dot w-2.5 h-2.5 rounded-full bg-white/40 transition-all" data-slide="2"></button>
                            <button class="slider-dot w-2.5 h-2.5 rounded-full bg-white/40 transition-all" data-slide="3"></button>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Vision & Mission Section -->
        <section id="mission" class="relative py-12 sm:py-16 md:py-24 px-4 sm:px-6 lg:px-8 bg-gradient-to-br from-slate-900 via-blue-950 to-indigo-950 overflow-hidden">
            <!-- Animated Background Elements -->
            <div class="absolute top-0 left-0 w-full h-full overflow-hidden">
                <div class="absolute top-20 left-20 w-96 h-96 bg-blue-500/10 rounded-full blur-3xl animate-float"></div>
                <div class="absolute bottom-20 right-20 w-96 h-96 bg-purple-500/10 rounded-full blur-3xl animate-float" style="animation-delay: 2s"></div>
                <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[500px] h-[500px] bg-cyan-500/5 rounded-full blur-3xl animate-pulse"></div>
            </div>
            <!-- Grid Pattern -->
            <div class="absolute inset-0 bg-[linear-gradient(rgba(59,130,246,0.05)_1px,transparent_1px),linear-gradient(90deg,rgba(59,130,246,0.05)_1px,transparent_1px)] bg-[size:64px_64px] opacity-20"></div>
            
            <div class="max-w-7xl mx-auto relative z-10">
                <!-- Section Header -->
                <div class="text-center mb-8 sm:mb-12 md:mb-16 animate-fade-in-up">
                    <h2 class="text-3xl sm:text-4xl md:text-5xl lg:text-6xl font-bold mb-3 sm:mb-4 bg-gradient-to-r from-primary via-cyan-400 to-blue-400 bg-clip-text text-transparent">Vision & Mission</h2>
                    <p class="text-sm sm:text-base md:text-lg text-white/70 max-w-2xl mx-auto px-4">Guiding principles that drive our innovation and excellence in cybersecurity education</p>
                </div>

                <!-- Vision & Mission Side by Side -->
                <div class="grid lg:grid-cols-2 gap-6 sm:gap-8 mb-8 sm:mb-12">
                    <!-- Vision Card -->
                    <div class="animate-fade-in-up" style="animation-delay: 0.2s">
                        <div class="group relative p-5 sm:p-6 md:p-8 bg-gradient-to-br from-primary/10 via-secondary/5 to-accent/10 backdrop-blur-sm rounded-2xl sm:rounded-3xl border border-white/10 hover:border-primary/40 transition-all duration-500 hover:shadow-2xl hover:shadow-primary/20 overflow-hidden h-full">
                            <!-- Glow Effect -->
                            <div class="absolute inset-0 bg-gradient-to-br from-primary/0 via-primary/5 to-accent/0 opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                            
                            <div class="relative h-full flex flex-col">
                                <!-- Icon & Title -->
                                <div class="text-center mb-4 sm:mb-6">
                                    <div class="relative inline-block mb-3 sm:mb-4">
                                        <div class="absolute inset-0 bg-primary/40 rounded-2xl blur-xl opacity-50 group-hover:opacity-75 transition-opacity"></div>
                                        <div class="relative w-14 h-14 sm:w-16 sm:h-16 md:w-20 md:h-20 bg-primary/20 rounded-xl sm:rounded-2xl flex items-center justify-center group-hover:scale-110 group-hover:rotate-6 transition-all duration-300 shadow-xl border border-primary/30 mx-auto">
                                            <i data-feather="eye" class="text-primary" width="32" height="32"></i>
                                        </div>
                                    </div>
                                    <h3 class="text-2xl sm:text-3xl font-bold text-white mb-2">Vision</h3>
                                    <div class="h-1 w-12 sm:w-16 bg-primary/50 rounded-full mx-auto"></div>
                                </div>
                                
                                <!-- Content -->
                                <div class="flex-1 space-y-4 sm:space-y-6">
                                    <p class="text-sm sm:text-base md:text-lg text-white/80 leading-relaxed sm:leading-loose text-center">
                                        To become a <span class="text-white font-semibold">leading laboratory</span> in the field of networking and cybersecurity that is <span class="text-white font-semibold">innovative, adaptive, and globally competitive</span>.
                                    </p>
                                    <div class="h-px w-20 sm:w-24 bg-primary/30 mx-auto"></div>
                                    <p class="text-sm sm:text-base md:text-lg text-white/70 leading-relaxed sm:leading-loose text-center">
                                        While supporting the development of <span class="text-white font-semibold">education, research, and community service</span> in Information Technology.
                                    </p>
                                    <div class="mt-4 sm:mt-6 md:mt-8 pt-4 sm:pt-6 border-t border-white/10">
                                        <p class="text-xs sm:text-sm md:text-base text-white/60 italic text-center">
                                            Driving excellence through innovation, collaboration, and continuous advancement in cybersecurity education and research.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Mission Card -->
                    <div class="animate-fade-in-up" style="animation-delay: 0.4s">
                        <div class="group relative p-5 sm:p-6 md:p-8 bg-gradient-to-br from-secondary/10 via-primary/5 to-accent/10 backdrop-blur-sm rounded-2xl sm:rounded-3xl border border-white/10 hover:border-primary/40 transition-all duration-500 hover:shadow-2xl hover:shadow-primary/20 overflow-hidden h-full">
                            <!-- Glow Effect -->
                            <div class="absolute inset-0 bg-gradient-to-br from-primary/0 via-primary/5 to-accent/0 opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                            
                            <div class="relative h-full flex flex-col">
                                <!-- Icon & Title -->
                                <div class="text-center mb-4 sm:mb-6">
                                    <div class="relative inline-block mb-3 sm:mb-4">
                                        <div class="absolute inset-0 bg-primary/40 rounded-2xl blur-xl opacity-50 group-hover:opacity-75 transition-opacity"></div>
                                        <div class="relative w-14 h-14 sm:w-16 sm:h-16 md:w-20 md:h-20 bg-primary/20 rounded-xl sm:rounded-2xl flex items-center justify-center group-hover:scale-110 group-hover:-rotate-6 transition-all duration-300 shadow-xl border border-primary/30 mx-auto">
                                            <i data-feather="target" class="text-primary" width="32" height="32"></i>
                                        </div>
                                    </div>
                                    <h3 class="text-2xl sm:text-3xl font-bold text-white mb-2">Mission</h3>
                                    <div class="h-1 w-12 sm:w-16 bg-primary/50 rounded-full mx-auto"></div>
                                </div>
                                
                                <!-- Mission Items -->
                                <div class="flex-1 space-y-3 sm:space-y-4">
                                    <div class="flex items-start gap-3 sm:gap-4">
                                        <div class="flex-shrink-0 w-7 h-7 sm:w-8 sm:h-8 bg-primary/20 rounded-lg flex items-center justify-center">
                                            <span class="text-primary font-bold text-xs sm:text-sm">1</span>
                                        </div>
                                        <p class="text-white/80 text-xs sm:text-sm md:text-base leading-relaxed">Conduct <span class="text-white font-semibold">high-quality practicum activities</span> to produce graduates with advanced competencies in computer networking and cybersecurity.</p>
                                    </div>
                                    
                                    <div class="flex items-start gap-3 sm:gap-4">
                                        <div class="flex-shrink-0 w-7 h-7 sm:w-8 sm:h-8 bg-primary/20 rounded-lg flex items-center justify-center">
                                            <span class="text-primary font-bold text-xs sm:text-sm">2</span>
                                        </div>
                                        <p class="text-white/80 text-xs sm:text-sm md:text-base leading-relaxed">Develop <span class="text-white font-semibold">applied research</span> in networking, system security, IoT, and monitoring technologies relevant to industry needs.</p>
                                    </div>
                                    
                                    <div class="flex items-start gap-3 sm:gap-4">
                                        <div class="flex-shrink-0 w-7 h-7 sm:w-8 sm:h-8 bg-primary/20 rounded-lg flex items-center justify-center">
                                            <span class="text-primary font-bold text-xs sm:text-sm">3</span>
                                        </div>
                                        <p class="text-white/80 text-xs sm:text-sm md:text-base leading-relaxed">Provide <span class="text-white font-semibold">security testing services</span>, mentoring, and training through collaboration with industry, government, and institutions.</p>
                                    </div>
                                    
                                    <div class="flex items-start gap-3 sm:gap-4">
                                        <div class="flex-shrink-0 w-7 h-7 sm:w-8 sm:h-8 bg-primary/20 rounded-lg flex items-center justify-center">
                                            <span class="text-primary font-bold text-xs sm:text-sm">4</span>
                                        </div>
                                        <p class="text-white/80 text-xs sm:text-sm md:text-base leading-relaxed">Enhance <span class="text-white font-semibold">capacity of staff</span> in mastering current technologies through training, certification, and professional participation.</p>
                                    </div>
                                    
                                    <div class="flex items-start gap-4">
                                        <div class="flex-shrink-0 w-8 h-8 bg-primary/20 rounded-lg flex items-center justify-center">
                                            <span class="text-primary font-bold text-sm">5</span>
                                        </div>
                                        <p class="text-white/80 text-base leading-relaxed">Support <span class="text-white font-semibold">digital security literacy improvement</span> in society through workshops, seminars, and IT-based community service programs.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Research Focus Areas -->
                <div class="mt-12 sm:mt-16 md:mt-24">
                    <div class="text-center mb-8 sm:mb-12">
                        <h3 class="text-2xl sm:text-3xl md:text-4xl font-bold text-white mb-3 sm:mb-4">Research Focus</h3>
                        <p class="text-white/60 text-sm sm:text-base px-4">Core domains of our cybersecurity research and development</p>
                    </div>
                    <div class="grid md:grid-cols-3 gap-4 sm:gap-6">
                        <div class="group p-6 bg-gradient-to-br from-white/10 to-white/5 rounded-xl border border-white/20 hover:border-primary/50 transition-all duration-300 hover:shadow-xl hover:shadow-primary/20 hover:-translate-y-1">
                            <div class="flex items-center gap-4">
                                <div class="w-12 h-12 bg-primary/20 rounded-lg flex items-center justify-center group-hover:scale-110 group-hover:rotate-6 transition-all duration-300">
                                    <i data-feather="settings" class="text-primary" width="24" height="24"></i>
                                </div>
                                <p class="text-white text-base font-semibold">Network Administration & Engineering</p>
                            </div>
                        </div>
                        <div class="group p-6 bg-gradient-to-br from-white/10 to-white/5 rounded-xl border border-white/20 hover:border-primary/50 transition-all duration-300 hover:shadow-xl hover:shadow-primary/20 hover:-translate-y-1">
                            <div class="flex items-center gap-4">
                                <div class="w-12 h-12 bg-primary/20 rounded-lg flex items-center justify-center group-hover:scale-110 group-hover:rotate-6 transition-all duration-300">
                                    <i data-feather="shield" class="text-primary" width="24" height="24"></i>
                                </div>
                                <p class="text-white text-base font-semibold">Cyber Defense</p>
                            </div>
                        </div>
                        <div class="group p-6 bg-gradient-to-br from-white/10 to-white/5 rounded-xl border border-white/20 hover:border-primary/50 transition-all duration-300 hover:shadow-xl hover:shadow-primary/20 hover:-translate-y-1">
                            <div class="flex items-center gap-4">
                                <div class="w-12 h-12 bg-primary/20 rounded-lg flex items-center justify-center group-hover:scale-110 group-hover:rotate-6 transition-all duration-300">
                                    <i data-feather="crosshair" class="text-primary" width="24" height="24"></i>
                                </div>
                                <p class="text-white text-base font-semibold">Offense Security</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Activities & Projects Section -->
        <section id="activities" class="relative py-12 sm:py-16 md:py-24 px-4 sm:px-6 lg:px-8 bg-gradient-to-br from-white via-cyan-50/20 to-blue-50/30 overflow-hidden">
            <!-- Animated Background -->
            <div class="absolute top-0 right-0 w-[600px] h-[600px] bg-gradient-to-br from-cyan-200/20 to-blue-200/20 rounded-full blur-3xl animate-float"></div>
            <div class="absolute bottom-0 left-0 w-[500px] h-[500px] bg-gradient-to-tr from-blue-200/20 to-indigo-200/20 rounded-full blur-3xl animate-float" style="animation-delay: 2s"></div>
            
            <div class="max-w-7xl mx-auto relative z-10">
                <!-- Activities & Projects -->
                <div class="text-center mb-16 animate-fade-in-up">
                    <div class="inline-flex items-center gap-2 mb-6 text-primary font-semibold">
                        <div class="h-1 w-8 bg-primary rounded-full"></div>
                        <span class="text-sm uppercase tracking-widest">What We Do</span>
                    </div>
                    <h2 class="text-4xl md:text-5xl font-bold bg-gradient-to-r from-primary via-secondary to-accent bg-clip-text text-transparent mb-4">Activities & Projects</h2>
                    <p class="text-lg text-muted-foreground max-w-2xl mx-auto">Hands-on learning experiences and research initiatives in cybersecurity</p>
                </div>
                
                <div class="grid md:grid-cols-3 gap-8 mb-24">
                    <!-- Card 1 -->
                    <a href="/activities" class="group relative overflow-hidden block">
                        <div class="absolute inset-0 bg-gradient-to-br from-cyan-500/10 to-blue-500/10 rounded-3xl transform group-hover:scale-105 transition-transform duration-500"></div>
                        <div class="relative p-8 bg-white/80 backdrop-blur-sm rounded-3xl border border-cyan-200/50 hover:border-cyan-400/70 transition-all duration-500 hover:shadow-2xl hover:shadow-cyan-500/20 hover:-translate-y-2 text-center">
                            <div class="relative mb-6 flex justify-center">
                                <div class="absolute inset-0 bg-cyan-500/30 rounded-2xl blur-xl opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                                <div class="relative w-16 h-16 bg-gradient-to-br from-cyan-500/20 to-blue-500/20 rounded-2xl flex items-center justify-center group-hover:scale-110 group-hover:rotate-6 transition-all duration-300">
                                    <i data-feather="cpu" class="text-cyan-600" width="32" height="32"></i>
                                </div>
                            </div>
                            <h3 class="text-2xl font-bold text-foreground mb-4 group-hover:text-cyan-600 transition-colors">Student Practicum</h3>
                            <p class="text-muted-foreground leading-relaxed">Practicum related to network administration, router & switch configuration, and cyber security simulation using supporting software.</p>
                            <div class="mt-6 flex items-center justify-center text-cyan-600 font-semibold opacity-0 group-hover:opacity-100 group-hover:translate-x-2 transition-all">
                                Learn more <span class="ml-2">→</span>
                            </div>
                        </div>
                    </a>

                    <!-- Card 2 -->
                    <a href="/research-documents" class="group relative overflow-hidden block">
                        <div class="absolute inset-0 bg-gradient-to-br from-blue-500/10 to-indigo-500/10 rounded-3xl transform group-hover:scale-105 transition-transform duration-500"></div>
                        <div class="relative p-8 bg-white/80 backdrop-blur-sm rounded-3xl border border-blue-200/50 hover:border-blue-400/70 transition-all duration-500 hover:shadow-2xl hover:shadow-blue-500/20 hover:-translate-y-2 text-center">
                            <div class="relative mb-6 flex justify-center">
                                <div class="absolute inset-0 bg-blue-500/30 rounded-2xl blur-xl opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                                <div class="relative w-16 h-16 bg-gradient-to-br from-blue-500/20 to-indigo-500/20 rounded-2xl flex items-center justify-center group-hover:scale-110 group-hover:rotate-6 transition-all duration-300">
                                    <i data-feather="search" class="text-blue-600" width="32" height="32"></i>
                                </div>
                            </div>
                            <h3 class="text-2xl font-bold text-foreground mb-4 group-hover:text-blue-600 transition-colors">Research</h3>
                            <p class="text-muted-foreground leading-relaxed">Faculty and student research in computer networks, information security, Internet of Things (IoT), and monitoring systems.</p>
                            <div class="mt-6 flex items-center justify-center text-blue-600 font-semibold opacity-0 group-hover:opacity-100 group-hover:translate-x-2 transition-all">
                                Learn more <span class="ml-2">→</span>
                            </div>
                        </div>
                    </a>

                    <!-- Card 3 -->
                    <a href="/activities" class="group relative overflow-hidden block">
                        <div class="absolute inset-0 bg-gradient-to-br from-indigo-500/10 to-purple-500/10 rounded-3xl transform group-hover:scale-105 transition-transform duration-500"></div>
                        <div class="relative p-8 bg-white/80 backdrop-blur-sm rounded-3xl border border-indigo-200/50 hover:border-indigo-400/70 transition-all duration-500 hover:shadow-2xl hover:shadow-indigo-500/20 hover:-translate-y-2 text-center">
                            <div class="relative mb-6 flex justify-center">
                                <div class="absolute inset-0 bg-indigo-500/30 rounded-2xl blur-xl opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                                <div class="relative w-16 h-16 bg-gradient-to-br from-indigo-500/20 to-purple-500/20 rounded-2xl flex items-center justify-center group-hover:scale-110 group-hover:rotate-6 transition-all duration-300">
                                    <i data-feather="users" class="text-indigo-600" width="32" height="32"></i>
                                </div>
                            </div>
                            <h3 class="text-2xl font-bold text-foreground mb-4 group-hover:text-indigo-600 transition-colors">Workshops & Seminars</h3>
                            <p class="text-muted-foreground leading-relaxed">Workshop activities, seminars, and internal training on network security, ethical hacking, and IT infrastructure monitoring.</p>
                            <div class="mt-6 flex items-center justify-center text-indigo-600 font-semibold opacity-0 group-hover:opacity-100 group-hover:translate-x-2 transition-all">
                                Learn more <span class="ml-2">→</span>
                            </div>
                        </div>
                    </a>
                </div>

                <!-- Related Courses -->
                <div class="text-center mb-16 animate-fade-in-up" style="animation-delay: 0.2s">
                    <div class="inline-flex items-center gap-2 mb-6 text-secondary font-semibold">
                        <div class="h-1 w-8 bg-secondary rounded-full"></div>
                        <span class="text-sm uppercase tracking-widest">Curriculum</span>
                    </div>
                    <h2 class="text-4xl md:text-5xl font-bold bg-gradient-to-r from-secondary via-primary to-accent bg-clip-text text-transparent mb-4">Related Courses</h2>
                    <p class="text-lg text-muted-foreground max-w-2xl mx-auto">Comprehensive curriculum designed to build expertise in networking and cybersecurity</p>
                </div>
                
                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
                    <div class="group relative p-6 bg-gradient-to-br from-white to-blue-50/30 rounded-2xl border border-border hover:border-primary/60 transition-all duration-300 hover:shadow-xl hover:shadow-primary/10 hover:-translate-y-1">
                        <div class="absolute top-0 right-0 w-32 h-32 bg-primary/5 rounded-full blur-2xl opacity-0 group-hover:opacity-100 transition-opacity"></div>
                        <div class="relative flex items-start gap-4 mb-3">
                            <div class="w-12 h-12 bg-gradient-to-br from-primary/20 to-primary/10 rounded-xl flex items-center justify-center flex-shrink-0 group-hover:scale-110 group-hover:rotate-12 transition-all duration-300 shadow-lg shadow-primary/20">
                                <i data-feather="layers" class="text-primary" width="24" height="24"></i>
                            </div>
                            <div>
                                <h3 class="text-lg font-bold text-foreground group-hover:text-primary transition-colors mb-2">Advanced Computer Networks</h3>
                                <p class="text-sm text-muted-foreground leading-relaxed">VPN, High Availability, Load Balancing on real devices for system resilience.</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="group relative p-6 bg-gradient-to-br from-white to-blue-50/30 rounded-2xl border border-border hover:border-primary/60 transition-all duration-300 hover:shadow-xl hover:shadow-primary/10 hover:-translate-y-1">
                        <div class="absolute top-0 right-0 w-32 h-32 bg-primary/5 rounded-full blur-2xl opacity-0 group-hover:opacity-100 transition-opacity"></div>
                        <div class="relative flex items-start gap-4 mb-3">
                            <div class="w-12 h-12 bg-gradient-to-br from-primary/20 to-primary/10 rounded-xl flex items-center justify-center flex-shrink-0 group-hover:scale-110 group-hover:rotate-12 transition-all duration-300 shadow-lg shadow-primary/20">
                                <i data-feather="shield" class="text-primary" width="24" height="24"></i>
                            </div>
                            <div>
                                <h3 class="text-lg font-bold text-foreground group-hover:text-primary transition-colors mb-2">Network Security</h3>
                                <p class="text-sm text-muted-foreground leading-relaxed">Next-Gen Firewall, IDS/IPS, policy enforcement for perimeter security.</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="group relative p-6 bg-gradient-to-br from-white to-blue-50/30 rounded-2xl border border-border hover:border-primary/60 transition-all duration-300 hover:shadow-xl hover:shadow-primary/10 hover:-translate-y-1">
                        <div class="absolute top-0 right-0 w-32 h-32 bg-primary/5 rounded-full blur-2xl opacity-0 group-hover:opacity-100 transition-opacity"></div>
                        <div class="relative flex items-start gap-4 mb-3">
                            <div class="w-12 h-12 bg-gradient-to-br from-primary/20 to-primary/10 rounded-xl flex items-center justify-center flex-shrink-0 group-hover:scale-110 group-hover:rotate-12 transition-all duration-300 shadow-lg shadow-primary/20">
                                <i data-feather="lock" class="text-primary" width="24" height="24"></i>
                            </div>
                            <div>
                                <h3 class="text-lg font-bold text-foreground group-hover:text-primary transition-colors mb-2">Network Administration & Security</h3>
                                <p class="text-sm text-muted-foreground leading-relaxed">Server Hardening, SIEM, advanced authentication (RADIUS/TACACS+).</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="group relative p-6 bg-gradient-to-br from-white to-blue-50/30 rounded-2xl border border-border hover:border-primary/60 transition-all duration-300 hover:shadow-xl hover:shadow-primary/10 hover:-translate-y-1">
                        <div class="absolute top-0 right-0 w-32 h-32 bg-primary/5 rounded-full blur-2xl opacity-0 group-hover:opacity-100 transition-opacity"></div>
                        <div class="relative flex items-start gap-4 mb-3">
                            <div class="w-12 h-12 bg-gradient-to-br from-primary/20 to-primary/10 rounded-xl flex items-center justify-center flex-shrink-0 group-hover:scale-110 group-hover:rotate-12 transition-all duration-300 shadow-lg shadow-primary/20">
                                <i data-feather="terminal" class="text-primary" width="24" height="24"></i>
                            </div>
                            <div>
                                <h3 class="text-lg font-bold text-foreground group-hover:text-primary transition-colors mb-2">Ethical Hacking & Penetration Testing</h3>
                                <p class="text-sm text-muted-foreground leading-relaxed">Vulnerability assessments in Cyber Range/Sandbox environments.</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="group relative p-6 bg-gradient-to-br from-white to-blue-50/30 rounded-2xl border border-border hover:border-primary/60 transition-all duration-300 hover:shadow-xl hover:shadow-primary/10 hover:-translate-y-1">
                        <div class="absolute top-0 right-0 w-32 h-32 bg-primary/5 rounded-full blur-2xl opacity-0 group-hover:opacity-100 transition-opacity"></div>
                        <div class="relative flex items-start gap-4 mb-3">
                            <div class="w-12 h-12 bg-gradient-to-br from-primary/20 to-primary/10 rounded-xl flex items-center justify-center flex-shrink-0 group-hover:scale-110 group-hover:rotate-12 transition-all duration-300 shadow-lg shadow-primary/20">
                                <i data-feather="activity" class="text-primary" width="24" height="24"></i>
                            </div>
                            <div>
                                <h3 class="text-lg font-bold text-foreground group-hover:text-primary transition-colors mb-2">Digital Forensics & Incident Response</h3>
                                <p class="text-sm text-muted-foreground leading-relaxed">Cyber incident investigation and malware analysis with forensic tools.</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="group relative p-6 bg-gradient-to-br from-white to-blue-50/30 rounded-2xl border border-border hover:border-primary/60 transition-all duration-300 hover:shadow-xl hover:shadow-primary/10 hover:-translate-y-1">
                        <div class="absolute top-0 right-0 w-32 h-32 bg-primary/5 rounded-full blur-2xl opacity-0 group-hover:opacity-100 transition-opacity"></div>
                        <div class="relative flex items-start gap-4 mb-3">
                            <div class="w-12 h-12 bg-gradient-to-br from-primary/20 to-primary/10 rounded-xl flex items-center justify-center flex-shrink-0 group-hover:scale-110 group-hover:rotate-12 transition-all duration-300 shadow-lg shadow-primary/20">
                                <i data-feather="cloud" class="text-primary" width="24" height="24"></i>
                            </div>
                            <div>
                                <h3 class="text-lg font-bold text-foreground group-hover:text-primary transition-colors mb-2">Cloud Computing <span class="text-xs font-normal text-muted-foreground">(Elective)</span></h3>
                                <p class="text-sm text-muted-foreground leading-relaxed">VPC and Security Groups configuration on AWS/Azure platforms.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Publications Section -->
        <section id="publications" class="relative py-24 px-4 sm:px-6 lg:px-8 bg-gradient-to-br from-slate-900 via-blue-950 to-indigo-950 overflow-hidden">
            <!-- Animated Background Elements -->
            <div class="absolute top-0 left-0 w-full h-full overflow-hidden">
                <div class="absolute top-20 left-20 w-96 h-96 bg-primary/10 rounded-full blur-3xl animate-float"></div>
                <div class="absolute bottom-20 right-20 w-96 h-96 bg-blue-500/10 rounded-full blur-3xl animate-float" style="animation-delay: 2s"></div>
                <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[500px] h-[500px] bg-cyan-500/5 rounded-full blur-3xl animate-pulse"></div>
            </div>
            <!-- Grid Pattern -->
            <div class="absolute inset-0 bg-[linear-gradient(rgba(102,187,242,0.03)_1px,transparent_1px),linear-gradient(90deg,rgba(102,187,242,0.03)_1px,transparent_1px)] bg-[size:64px_64px] opacity-20"></div>
            
            <div class="max-w-7xl mx-auto relative z-10">
                <div class="text-center mb-16 animate-fade-in-up">
                    <div class="inline-flex items-center gap-2 mb-6 text-primary font-bold">
                        <div class="h-1 w-8 bg-primary rounded-full"></div>
                        <span class="text-sm uppercase tracking-widest">Research & Innovation</span>
                    </div>
                    <h2 class="text-4xl md:text-5xl font-bold bg-gradient-to-r from-primary via-cyan-400 to-blue-400 bg-clip-text text-transparent mb-4">Featured Publications</h2>
                    <p class="text-lg text-white/70 max-w-2xl mx-auto">Explore our latest research contributions to the cybersecurity field</p>
                </div>
                
                <div class="grid md:grid-cols-2 gap-6 mb-10">
                    @forelse($featuredPublications as $publication)
                    <!-- Publication Card -->
                    <div class="group relative overflow-hidden h-full">
                        <div class="relative bg-white/5 backdrop-blur-sm rounded-2xl border border-white/10 hover:border-primary/40 transition-all duration-300 hover:shadow-2xl hover:shadow-primary/20 h-full flex flex-col p-6">
                            <!-- Type Badge -->
                            <div class="flex items-center justify-between mb-4">
                                <span class="px-3 py-1.5 bg-primary/90 text-white text-xs font-bold rounded-full backdrop-blur-sm">{{ $publication['type'] }}</span>
                                <span class="px-3 py-1.5 bg-white/10 text-white/70 text-xs font-semibold rounded-full backdrop-blur-sm">{{ $publication['year'] }}</span>
                            </div>
                            
                            <!-- Content -->
                            <div class="flex flex-col flex-grow">
                                <h3 class="text-xl font-bold text-white mb-4 group-hover:text-primary transition-colors leading-tight">{{ $publication['title'] }}</h3>
                                
                                <!-- Author Info -->
                                <div class="flex items-center gap-3 mb-4">
                                    <img src="{{ $publication['author_photo'] }}" 
                                         alt="{{ $publication['author_name'] }}" 
                                         class="w-10 h-10 rounded-full object-cover border-2 border-primary/30"
                                         onerror="this.src='https://ui-avatars.com/api/?name={{ urlencode($publication['author_name']) }}&background=66bbf2&color=fff&size=40'">
                                    <span class="text-sm text-white/70 font-medium">{{ $publication['author_name'] }}</span>
                                </div>
                                
                                <!-- Publication Info -->
                                <p class="text-sm text-white/60 mb-6 flex-grow">{{ Str::limit($publication['publication'], 150) }}</p>
                                
                                <!-- Footer -->
                                <div class="flex items-center justify-between mt-auto">
                                    <span class="px-3 py-1 bg-white/10 text-white/70 text-xs font-semibold rounded uppercase">{{ Str::limit($publication['category'], 20) }}</span>
                                    @if($publication['file_path'])
                                    <a href="{{ $publication['file_path'] }}" target="_blank" class="text-primary font-semibold text-sm hover:translate-x-2 transition-all inline-flex items-center gap-2 group/link">
                                        Read <span class="group-hover/link:translate-x-1 transition-transform">→</span>
                                    </a>
                                    @else
                                    <span class="text-white/40 text-sm italic">No file</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    @empty
                    <!-- No Publications Message -->
                    <div class="col-span-2 text-center py-12">
                        <p class="text-white/60 text-lg">No publications available yet.</p>
                    </div>
                    @endforelse
                </div>
                
                <div class="text-center">
                    <a href="/research-documents" class="group inline-flex items-center gap-3 px-8 py-4 bg-gradient-to-r from-primary/20 to-secondary/20 hover:from-primary/30 hover:to-secondary/30 text-primary font-bold rounded-xl border border-primary/30 hover:border-primary/60 transition-all duration-300 hover:shadow-xl hover:shadow-primary/30 hover:scale-105">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                        </svg>
                        View All Research Documents
                        <span class="group-hover:translate-x-1 transition-transform">→</span>
                    </a>
                </div>
            </div>
        </section>

        <!-- Articles/Blog Section -->
        <section id="articles" class="relative py-24 px-4 sm:px-6 lg:px-8 bg-white overflow-hidden">
            <div class="max-w-7xl mx-auto relative z-10">
                <div class="text-center mb-16 animate-fade-in-up">
                    <div class="inline-flex items-center gap-2 mb-6 text-primary font-semibold">
                        <div class="h-1 w-8 bg-primary rounded-full"></div>
                        <span class="text-sm uppercase tracking-widest">Knowledge Hub</span>
                    </div>
                    <h2 class="text-4xl md:text-5xl font-bold bg-gradient-to-r from-primary via-secondary to-accent bg-clip-text text-transparent mb-4">Latest Articles</h2>
                    <p class="text-lg text-muted-foreground max-w-2xl mx-auto">Expert insights and educational content on cybersecurity topics</p>
                </div>
                
                <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6 mb-10">
                    @if($latestArticles->count() > 0)
                        @foreach($latestArticles as $article)
                            <!-- Article Card {{ $loop->iteration }} -->
                            <div class="group bg-white rounded-2xl border border-border hover:border-primary/50 transition-all duration-300 overflow-hidden hover:shadow-xl hover:-translate-y-1">
                                <div class="relative h-48 overflow-hidden">
                                    @if($article['cover_image'])
                                        <img src="{{ $article['cover_image'] }}" alt="{{ $article['title'] }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300"/>
                                    @else
                                        <div class="w-full h-full bg-gradient-to-br from-primary/20 to-secondary/20 flex items-center justify-center">
                                            <i data-feather="file-text" class="text-primary/50" width="48" height="48"></i>
                                        </div>
                                    @endif
                                    <div class="absolute top-3 left-3">
                                        <span class="px-3 py-1 bg-white/90 backdrop-blur-sm text-primary text-xs font-bold rounded-full">{{ ucfirst($article['category']) }}</span>
                                    </div>
                                </div>
                                <div class="p-6 flex flex-col">
                                    <div class="flex items-center gap-2 mb-3 text-xs text-muted-foreground">
                                        <i data-feather="clock" class="w-3 h-3"></i>
                                        <span>{{ $article['reading_time'] }} min read</span>
                                    </div>
                                    <h3 class="text-lg font-bold text-foreground mb-3 group-hover:text-primary transition-colors line-clamp-2">{{ $article['title'] }}</h3>
                                    <p class="text-sm text-muted-foreground mb-4 line-clamp-2">{{ Str::limit($article['description'], 100) }}</p>
                                    <div class="flex items-center justify-between pt-4 border-t border-border mt-auto">
                                        <div class="text-xs text-muted-foreground">
                                            <div class="font-semibold text-foreground">{{ $article['author_name'] }}</div>
                                            <div>{{ $article['created_date'] }}</div>
                                        </div>
                                        @if($article['file_path'])
                                            <a href="{{ $article['file_path'] }}" target="_blank" class="text-primary font-semibold text-sm group-hover:translate-x-1 transition-transform inline-flex items-center">
                                                Read →
                                            </a>
                                        @else
                                            <span class="text-muted-foreground text-sm">
                                                View →
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        
                        @if($latestArticles->count() < 4)
                            @php
                                $fallbackArticles = [
                                    ['title' => 'Understanding Network Segmentation', 'category' => 'Best Practices', 'author' => 'Erfan Rohadi', 'date' => 'Nov 2024', 'time' => '8', 'desc' => 'Learn how network segmentation plays a crucial role in preventing lateral movement of threats...', 'img' => 'https://images.unsplash.com/photo-1558494949-ef010cbdcc31?q=80&w=800'],
                                    ['title' => 'Zero Trust Security Model', 'category' => 'Strategy', 'author' => 'Dr. Siti Nurhaliza', 'date' => 'Oct 2024', 'time' => '12', 'desc' => 'Discover the principles of zero trust security and how to implement it in your organization...', 'img' => 'https://images.unsplash.com/photo-1563986768494-4dee2763ff3f?q=80&w=800'],
                                    ['title' => 'Incident Response Planning', 'category' => 'Incident Response', 'author' => 'Budi Santoso', 'date' => 'Sep 2024', 'time' => '10', 'desc' => 'Essential steps for small and medium enterprises to prepare for and respond to security incidents...', 'img' => 'https://images.unsplash.com/photo-1504868584819-f8e8b4b6d7e3?q=80&w=800']
                                ];
                                $needed = 4 - $latestArticles->count();
                            @endphp
                            
                            @for($i = 0; $i < min($needed, 3); $i++)
                                <div class="group bg-white rounded-2xl border border-border hover:border-primary/50 transition-all duration-300 overflow-hidden hover:shadow-xl hover:-translate-y-1">
                                    <div class="relative h-48 overflow-hidden">
                                        <img src="{{ $fallbackArticles[$i]['img'] }}" alt="{{ $fallbackArticles[$i]['title'] }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300"/>
                                        <div class="absolute top-3 left-3">
                                            <span class="px-3 py-1 bg-white/90 backdrop-blur-sm text-primary text-xs font-bold rounded-full">{{ $fallbackArticles[$i]['category'] }}</span>
                                        </div>
                                    </div>
                                    <div class="p-6 flex flex-col">
                                        <div class="flex items-center gap-2 mb-3 text-xs text-muted-foreground">
                                            <i data-feather="clock" class="w-3 h-3"></i>
                                            <span>{{ $fallbackArticles[$i]['time'] }} min read</span>
                                        </div>
                                        <h3 class="text-lg font-bold text-foreground mb-3 group-hover:text-primary transition-colors line-clamp-2">{{ $fallbackArticles[$i]['title'] }}</h3>
                                        <p class="text-sm text-muted-foreground mb-4 line-clamp-2">{{ $fallbackArticles[$i]['desc'] }}</p>
                                        <div class="flex items-center justify-between pt-4 border-t border-border mt-auto">
                                            <div class="text-xs text-muted-foreground">
                                                <div class="font-semibold text-foreground">{{ $fallbackArticles[$i]['author'] }}</div>
                                                <div>{{ $fallbackArticles[$i]['date'] }}</div>
                                            </div>
                                            <span class="text-muted-foreground text-sm">
                                                View →
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            @endfor
                        @endif
                    @else
                        <!-- Fallback static articles if no database content -->
                        <div class="group bg-white rounded-2xl border border-border hover:border-primary/50 transition-all duration-300 overflow-hidden hover:shadow-xl hover:-translate-y-1">
                            <div class="relative h-48 overflow-hidden">
                                <img src="https://images.unsplash.com/photo-1558494949-ef010cbdcc31?q=80&w=800" alt="Network Segmentation" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300"/>
                                <div class="absolute top-3 left-3">
                                    <span class="px-3 py-1 bg-white/90 backdrop-blur-sm text-primary text-xs font-bold rounded-full">Best Practices</span>
                                </div>
                            </div>
                            <div class="p-6 flex flex-col">
                                <div class="flex items-center gap-2 mb-3 text-xs text-muted-foreground">
                                    <i data-feather="clock" class="w-3 h-3"></i>
                                    <span>8 min read</span>
                                </div>
                                <h3 class="text-lg font-bold text-foreground mb-3 group-hover:text-primary transition-colors line-clamp-2">Understanding Network Segmentation</h3>
                                <p class="text-sm text-muted-foreground mb-4 line-clamp-2">Learn how network segmentation plays a crucial role in preventing lateral movement of threats...</p>
                                <div class="flex items-center justify-between pt-4 border-t border-border mt-auto">
                                    <div class="text-xs text-muted-foreground">
                                        <div class="font-semibold text-foreground">Erfan Rohadi</div>
                                        <div>Nov 2024</div>
                                    </div>
                                    <span class="text-muted-foreground text-sm">View →</span>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
                
                <div class="text-center">
                    <a href="/research-documents" class="group inline-flex items-center gap-3 px-8 py-4 bg-primary text-white font-bold rounded-xl hover:bg-secondary transition-all duration-300 hover:shadow-lg hover:shadow-primary/30 hover:scale-105">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                        </svg>
                        View All Research Documents
                        <span class="group-hover:translate-x-1 transition-transform">→</span>
                    </a>
                </div>
            </div>
        </section>

        <!-- Gallery Section -->
        <section id="gallery" class="relative py-24 px-4 sm:px-6 lg:px-8 bg-gradient-to-br from-slate-900 via-blue-950 to-indigo-950 overflow-hidden">
            <!-- Animated Background Elements -->
            <div class="absolute top-0 left-1/4 w-96 h-96 bg-gradient-to-br from-primary/20 to-blue-500/20 rounded-full blur-3xl animate-float"></div>
            <div class="absolute bottom-0 right-1/4 w-96 h-96 bg-gradient-to-tl from-indigo-500/20 to-primary/20 rounded-full blur-3xl animate-float" style="animation-delay: 2s"></div>
            <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[600px] h-[600px] bg-gradient-to-r from-blue-500/10 to-purple-500/10 rounded-full blur-3xl animate-pulse"></div>
            
            <div class="max-w-7xl mx-auto relative z-10">
                <div class="text-center mb-16 animate-fade-in-up">
                    <div class="inline-flex items-center gap-2 mb-6 text-primary font-bold">
                        <div class="h-1 w-8 bg-primary rounded-full"></div>
                        <span class="text-sm uppercase tracking-widest">Visual Journey</span>
                    </div>
                    <h2 class="text-4xl md:text-5xl font-bold bg-gradient-to-r from-primary via-cyan-400 to-blue-400 bg-clip-text text-transparent mb-4">Gallery</h2>
                    <p class="text-lg text-white/70 max-w-2xl mx-auto">Explore our laboratory facilities, activities, and achievements</p>
                </div>
                
                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6 mb-10">
                    @forelse($galleryImages as $gallery)
                        <!-- Gallery Item {{ $loop->iteration }} -->
                        <a href="{{ $gallery['type'] === 'agenda' ? '/agenda' : '/activities' }}" class="group relative overflow-hidden rounded-2xl border-2 border-border hover:border-primary/50 transition-all duration-300 hover:shadow-2xl hover:shadow-primary/20 hover:-translate-y-2 block">
                            <div class="aspect-video bg-gradient-to-br from-slate-100 to-slate-50">
                                @if($gallery['image'])
                                    <img src="{{ $gallery['image'] }}" alt="{{ $gallery['title'] }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500" loading="lazy"/>
                                @else
                                    <div class="w-full h-full bg-gradient-to-br from-primary/20 to-secondary/20 flex items-center justify-center">
                                        <i data-feather="image" class="text-primary/50" width="48" height="48"></i>
                                    </div>
                                @endif
                            </div>
                            <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/40 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex flex-col items-start justify-end p-6">
                                <h3 class="text-white font-bold text-lg mb-1">{{ $gallery['title'] }}</h3>
                                <p class="text-white/80 text-sm">{{ Str::limit($gallery['description'], 50) }}</p>
                                @if($gallery['event_date'])
                                    <p class="text-white/60 text-xs mt-1">{{ \Carbon\Carbon::parse($gallery['event_date'])->format('M d, Y') }}</p>
                                @endif
                            </div>
                        </a>
                    @empty
                        <!-- Fallback Gallery Items if no database images -->
                        <a href="/activities" class="group relative overflow-hidden rounded-2xl border-2 border-border hover:border-primary/50 transition-all duration-300 hover:shadow-2xl hover:shadow-primary/20 hover:-translate-y-2 block">
                            <div class="aspect-video bg-gradient-to-br from-slate-100 to-slate-50">
                                <img src="https://images.unsplash.com/photo-1558494949-ef010cbdcc31?w=800&q=80" alt="Cybersecurity Lab Equipment" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500" loading="lazy"/>
                            </div>
                            <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/40 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex flex-col items-start justify-end p-6">
                                <h3 class="text-white font-bold text-lg mb-1">Cybersecurity Lab Equipment</h3>
                                <p class="text-white/80 text-sm">Advanced networking and security hardware</p>
                            </div>
                        </a>
                        <a href="/activities" class="group relative overflow-hidden rounded-2xl border-2 border-border hover:border-primary/50 transition-all duration-300 hover:shadow-2xl hover:shadow-primary/20 hover:-translate-y-2 block">
                            <div class="aspect-video bg-gradient-to-br from-slate-100 to-slate-50">
                                <img src="https://images.unsplash.com/photo-1573164713988-8665fc963095?w=800&q=80" alt="Research & Development" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500" loading="lazy"/>
                            </div>
                            <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/40 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex flex-col items-start justify-end p-6">
                                <h3 class="text-white font-bold text-lg mb-1">Research & Development</h3>
                                <p class="text-white/80 text-sm">Innovative cybersecurity research projects</p>
                            </div>
                        </a>
                        <a href="/activities" class="group relative overflow-hidden rounded-2xl border-2 border-border hover:border-primary/50 transition-all duration-300 hover:shadow-2xl hover:shadow-primary/20 hover:-translate-y-2 block">
                            <div class="aspect-video bg-gradient-to-br from-slate-100 to-slate-50">
                                <img src="https://images.unsplash.com/photo-1552664730-d307ca884978?w=800&q=80" alt="Team Collaboration" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500" loading="lazy"/>
                            </div>
                            <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/40 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex flex-col items-start justify-end p-6">
                                <h3 class="text-white font-bold text-lg mb-1">Team Collaboration</h3>
                                <p class="text-white/80 text-sm">Students working on security projects</p>
                            </div>
                        </a>
                    @endforelse
                </div>

                <!-- View More Button -->
                <div class="text-center">
                    <a href="/activities" class="group inline-flex items-center gap-3 px-8 py-4 bg-primary text-white font-bold rounded-xl hover:bg-secondary transition-all duration-300 hover:shadow-lg hover:shadow-primary/30 hover:scale-105">
                        View Complete Gallery
                        <span class="group-hover:translate-x-1 transition-transform">→</span>
                    </a>
                </div>
            </div>
        </section>

        <!-- Team Section -->
        <section id="team" class="relative py-24 px-4 sm:px-6 lg:px-8 bg-white overflow-hidden">
            <div class="max-w-7xl mx-auto relative z-10">
                <div class="text-center mb-16 animate-fade-in-up">
                    <div class="inline-flex items-center gap-2 mb-6 text-primary font-bold">
                        <div class="h-1 w-8 bg-primary rounded-full"></div>
                        <span class="text-sm uppercase tracking-widest">Meet The Team</span>
                    </div>
                    <h2 class="text-4xl md:text-5xl font-bold bg-gradient-to-r from-primary via-secondary to-accent bg-clip-text text-transparent mb-4">Our Team Members</h2>
                    <p class="text-lg text-muted-foreground max-w-2xl mx-auto">Expert researchers and educators dedicated to cybersecurity excellence</p>
                </div>

                <!-- Lab Head - Featured Card -->
                <div class="max-w-4xl mx-auto mb-16">
                    <a href="/member/erfan-rohadi" class="group relative block bg-gradient-to-br from-white to-blue-50/30 rounded-3xl border-2 border-primary/20 hover:border-primary transition-all duration-300 overflow-hidden hover:shadow-2xl hover:shadow-primary/20 hover:-translate-y-2">
                        <div class="absolute top-0 right-0 w-40 h-40 bg-gradient-to-bl from-primary/10 to-transparent rounded-bl-full opacity-0 group-hover:opacity-100 transition-opacity"></div>
                        <div class="grid md:grid-cols-3 gap-8 items-center p-8">
                            <div class="md:col-span-1">
                                <div class="aspect-square rounded-2xl overflow-hidden border-4 border-primary/20 group-hover:border-primary transition-colors">
                                    <img src="{{ asset('img/lab-member/erfan.png') }}" alt="Erfan Rohadi" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500" loading="lazy"/>
                                </div>
                            </div>
                            <div class="md:col-span-2 text-center md:text-left">
                                <div class="inline-flex items-center gap-2 px-4 py-2 bg-primary/10 text-primary font-bold text-sm rounded-full mb-4">
                                    <i data-feather="star" class="w-4 h-4"></i>
                                    <span>Laboratory Head</span>
                                </div>
                                <h3 class="text-3xl font-bold text-foreground mb-2 group-hover:text-primary transition-colors">Erfan Rohadi, ST., M.Eng., Ph.D.</h3>
                                <p class="text-muted-foreground text-lg mb-4">Head of Laboratory</p>
                                <p class="text-sm text-muted-foreground leading-relaxed">Leading cybersecurity research and education initiatives, specializing in network security and advanced threat detection systems.</p>
                            </div>
                        </div>
                    </a>
                </div>

                <!-- Research Team - Grid Cards -->
                <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
                    <!-- Researcher 1 -->
                    <a href="/member/ade-ismail" class="group block bg-white rounded-2xl border-2 border-border hover:border-primary/50 transition-all duration-300 overflow-hidden hover:shadow-xl hover:-translate-y-2">
                        <div class="aspect-square bg-gradient-to-br from-slate-100 to-slate-50 overflow-hidden">
                            <img src="{{ asset('img/lab-member/ade_ismail.png') }}" alt="Ade Ismail" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500" loading="lazy"/>
                        </div>
                        <div class="p-6 text-center">
                            <div class="inline-flex items-center gap-1 px-3 py-1 bg-primary/10 text-primary text-xs font-bold rounded-full mb-3">
                                <i data-feather="user" class="w-3 h-3"></i>
                                <span>Researcher</span>
                            </div>
                            <h3 class="text-lg font-bold text-foreground mb-1 group-hover:text-primary transition-colors">Ade Ismail, S.Kom., M.TI</h3>
                            <p class="text-sm text-muted-foreground">Researcher</p>
                        </div>
                    </a>

                    <!-- Researcher 2 -->
                    <a href="/member/vipkas-al-hadid-firdaus" class="group block bg-white rounded-2xl border-2 border-border hover:border-primary/50 transition-all duration-300 overflow-hidden hover:shadow-xl hover:-translate-y-2">
                        <div class="aspect-square bg-gradient-to-br from-slate-100 to-slate-50 overflow-hidden">
                            <img src="{{ asset('img/lab-member/vipkas.png') }}" alt="Vipkas Al Hadid Firdaus" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500" loading="lazy"/>
                        </div>
                        <div class="p-6 text-center">
                            <div class="inline-flex items-center gap-1 px-3 py-1 bg-primary/10 text-primary text-xs font-bold rounded-full mb-3">
                                <i data-feather="user" class="w-3 h-3"></i>
                                <span>Researcher</span>
                            </div>
                            <h3 class="text-lg font-bold text-foreground mb-1 group-hover:text-primary transition-colors">Vipkas Al Hadid Firdaus, ST., MT</h3>
                            <p class="text-sm text-muted-foreground">Researcher</p>
                        </div>
                    </a>

                    <!-- Researcher 3 -->
                    <a href="/member/sofyan-noor-arief" class="group block bg-white rounded-2xl border-2 border-border hover:border-primary/50 transition-all duration-300 overflow-hidden hover:shadow-xl hover:-translate-y-2">
                        <div class="aspect-square bg-gradient-to-br from-slate-100 to-slate-50 overflow-hidden">
                            <img src="{{ asset('img/lab-member/sofyan.png') }}" alt="Sofyan Noor Arief" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500" loading="lazy"/>
                        </div>
                        <div class="p-6 text-center">
                            <div class="inline-flex items-center gap-1 px-3 py-1 bg-primary/10 text-primary text-xs font-bold rounded-full mb-3">
                                <i data-feather="user" class="w-3 h-3"></i>
                                <span>Researcher</span>
                            </div>
                            <h3 class="text-lg font-bold text-foreground mb-1 group-hover:text-primary transition-colors">Sofyan Noor Arief, S.ST., M.Kom.</h3>
                            <p class="text-sm text-muted-foreground">Researcher</p>
                        </div>
                    </a>

                    <!-- Researcher 4 -->
                    <a href="/member/meyti-eka-apriyani" class="group block bg-white rounded-2xl border-2 border-border hover:border-primary/50 transition-all duration-300 overflow-hidden hover:shadow-xl hover:-translate-y-2">
                        <div class="aspect-square bg-gradient-to-br from-slate-100 to-slate-50 overflow-hidden">
                            <img src="{{ asset('img/lab-member/meyti.png') }}" alt="Meyti Eka Apriyani" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500" loading="lazy"/>
                        </div>
                        <div class="p-6 text-center">
                            <div class="inline-flex items-center gap-1 px-3 py-1 bg-primary/10 text-primary text-xs font-bold rounded-full mb-3">
                                <i data-feather="user" class="w-3 h-3"></i>
                                <span>Researcher</span>
                            </div>
                            <h3 class="text-lg font-bold text-foreground mb-1 group-hover:text-primary transition-colors">Meyti Eka Apriyani ST., MT.</h3>
                            <p class="text-sm text-muted-foreground">Researcher</p>
                        </div>
                    </a>
                </div>
            </div>
        </section>

        <!-- Footer -->
        @include('partials.footer')

        <!-- Back to Top (shared partial) -->
        @include('partials.back-to-top')
    </div>

    <script>
        // Scroll Progress Bar handled by partial (partials/scroll-progress.blade.php)
        // Back to Top handled by shared partial (partials/back-to-top.blade.php)
        // Mobile Menu Toggle handled by shared partial (partials/shared-scripts.blade.php)

        // Intersection Observer for fade-in animations (for hover/floating elements)
        const hoverObserverOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -100px 0px'
        };

        const hoverObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('animate-fade-in-up');
                    hoverObserver.unobserve(entry.target);
                }
            });
        }, hoverObserverOptions);

        // Observe all hover/floating elements
        document.querySelectorAll('.hover-lift, .hover-glow').forEach(el => {
            hoverObserver.observe(el);
        });

        // Smooth scroll for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({ behavior: 'smooth', block: 'start' });
                }
            });
        });

        // Add parallax effect to hero section
        window.addEventListener('scroll', () => {
            const scrolled = window.pageYOffset;
            const parallaxElements = document.querySelectorAll('.animate-float');
            parallaxElements.forEach(el => {
                el.style.transform = `translateY(${scrolled * 0.3}px)`;
            });
        });

        // Counter animation for statistics
        const animateCounters = () => {
            const counters = document.querySelectorAll('.text-2xl.font-bold');
            counters.forEach(counter => {
                const target = parseInt(counter.textContent);
                if (isNaN(target)) return;
                
                const hasPercent = counter.textContent.includes('%');
                const hasPlus = counter.textContent.includes('+');
                let count = 0;
                const increment = target / 60;
                const duration = 2000;
                const stepTime = duration / 60;
                
                const timer = setInterval(() => {
                    count += increment;
                    if (count >= target) {
                        counter.textContent = target + (hasPercent ? '%' : hasPlus ? '+' : '');
                        clearInterval(timer);
                    } else {
                        counter.textContent = Math.floor(count) + (hasPercent ? '%' : hasPlus ? '+' : '');
                    }
                }, stepTime);
            });
        };

        // Trigger counter animation when stats section is visible
        const statsObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    animateCounters();
                    statsObserver.unobserve(entry.target);
                }
            });
        }, { threshold: 0.5 });

        const statsSection = document.querySelector('.grid.grid-cols-3.gap-4');
        if (statsSection) {
            statsObserver.observe(statsSection);
        }

        // Image Slider
        let currentSlide = 0;
        const slides = document.querySelectorAll('.slider-item');
        const dots = document.querySelectorAll('.slider-dot');
        const totalSlides = slides.length;

        function showSlide(index) {
            // Wrap around
            if (index >= totalSlides) currentSlide = 0;
            else if (index < 0) currentSlide = totalSlides - 1;
            else currentSlide = index;

            // Hide all slides
            slides.forEach(slide => slide.classList.remove('opacity-100'));
            slides.forEach(slide => slide.classList.add('opacity-0'));

            // Show current slide
            slides[currentSlide].classList.remove('opacity-0');
            slides[currentSlide].classList.add('opacity-100');

            // Update dots
            dots.forEach((dot, i) => {
                if (i === currentSlide) {
                    dot.classList.remove('bg-white/40');
                    dot.classList.add('bg-white');
                } else {
                    dot.classList.remove('bg-white');
                    dot.classList.add('bg-white/40');
                }
            });
        }

        // Navigation buttons
        const prevBtn = document.getElementById('prev-slide');
        const nextBtn = document.getElementById('next-slide');

        if (prevBtn) {
            prevBtn.addEventListener('click', () => showSlide(currentSlide - 1));
        }

        if (nextBtn) {
            nextBtn.addEventListener('click', () => showSlide(currentSlide + 1));
        }

        // Dot navigation
        dots.forEach((dot, index) => {
            dot.addEventListener('click', () => showSlide(index));
        });

        // Auto-play slider every 5 seconds
        setInterval(() => {
            showSlide(currentSlide + 1);
        }, 5000);

        // Scroll reveal animation for sections
        const sectionObserverOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        const sectionObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.style.opacity = '1';
                    entry.target.style.transform = 'translateY(0)';
                }
            });
        }, sectionObserverOptions);

        // Observe all sections and initialize feather icons when DOM ready
        document.addEventListener('DOMContentLoaded', () => {
            // Initialize Feather Icons first
            if (typeof feather !== 'undefined' && feather.replace) {
                try {
                    feather.replace();
                } catch (e) {
                    console.error('Feather icons initialization failed:', e);
                }
            }

            const sections = document.querySelectorAll('section, .fade-in-section');
            sections.forEach((section, index) => {
                section.style.opacity = '0';
                section.style.transform = 'translateY(30px)';
                section.style.transition = `all 0.8s cubic-bezier(0.4, 0, 0.2, 1) ${index * 0.1}s`;
                sectionObserver.observe(section);
            });
        });
    </script>

    <!-- Shared Scripts -->
    @include('partials.shared-scripts')
</body>
</html>