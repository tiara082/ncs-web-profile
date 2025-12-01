<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Our Activities - Network & Cyber Security Lab</title>
    <meta name="description" content="Past activities and events from Network and Cyber Security Laboratory at Malang State Polytechnic"/>
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
                    },
                    fontFamily: {
                        sans: ['Poppins', 'sans-serif'],
                    },
                    animation: {
                        'float': 'float 6s ease-in-out infinite',
                        'fade-in-up': 'fadeInUp 0.6s ease-out',
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
    <style>
        .hover-lift {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .hover-lift:hover {
            transform: translateY(-8px);
        }
    </style>
</head>
<body class="font-sans antialiased bg-background text-foreground">
    @include('partials.scroll-progress')
    @include('partials.navbar')
    @include('partials.hero-activities')
    
    <!-- Activities Gallery Section -->
    <section class="relative py-24 px-4 sm:px-6 lg:px-8 bg-gradient-to-br from-background via-cyan-50/30 to-blue-50/20 overflow-hidden">
        <!-- Animated Background Elements -->
        <div class="absolute top-0 right-0 w-96 h-96 bg-primary/5 rounded-full blur-3xl animate-float"></div>
        <div class="absolute bottom-0 left-0 w-96 h-96 bg-blue-500/5 rounded-full blur-3xl animate-float" style="animation-delay: 2s"></div>
        
        <div class="max-w-7xl mx-auto relative z-10">
            
            <!-- Gallery Grid -->
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6 mb-10">
                <!-- Activity 1 -->
                <div class="group relative overflow-hidden rounded-2xl border-2 border-gray-200 hover:border-primary/50 transition-all duration-300 hover:shadow-2xl hover:shadow-primary/20 hover-lift bg-white">
                    <div class="aspect-video bg-gradient-to-br from-slate-100 to-slate-50">
                        <img src="https://images.unsplash.com/photo-1540575467063-178a50c2df87?w=800&q=80" alt="Cybersecurity Workshop 2024" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500" loading="lazy"/>
                    </div>
                    <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/40 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex flex-col items-start justify-end p-6">
                        <span class="text-primary text-xs font-bold mb-2">January 2024</span>
                        <h3 class="text-white font-bold text-lg mb-1">Cybersecurity Workshop 2024</h3>
                        <p class="text-white/80 text-sm">Advanced penetration testing techniques</p>
                    </div>
                </div>

                <!-- Activity 2 -->
                <div class="group relative overflow-hidden rounded-2xl border-2 border-gray-200 hover:border-primary/50 transition-all duration-300 hover:shadow-2xl hover:shadow-primary/20 hover-lift bg-white">
                    <div class="aspect-video bg-gradient-to-br from-slate-100 to-slate-50">
                        <img src="https://images.unsplash.com/photo-1591115765373-5207764f72e7?w=800&q=80" alt="CTF Competition 2024" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500" loading="lazy"/>
                    </div>
                    <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/40 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex flex-col items-start justify-end p-6">
                        <span class="text-primary text-xs font-bold mb-2">February 2024</span>
                        <h3 class="text-white font-bold text-lg mb-1">CTF Competition 2024</h3>
                        <p class="text-white/80 text-sm">Regional capture the flag championship</p>
                    </div>
                </div>

                <!-- Activity 3 -->
                <div class="group relative overflow-hidden rounded-2xl border-2 border-gray-200 hover:border-primary/50 transition-all duration-300 hover:shadow-2xl hover:shadow-primary/20 hover-lift bg-white">
                    <div class="aspect-video bg-gradient-to-br from-slate-100 to-slate-50">
                        <img src="https://images.unsplash.com/photo-1552664730-d307ca884978?w=800&q=80" alt="Network Security Seminar" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500" loading="lazy"/>
                    </div>
                    <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/40 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex flex-col items-start justify-end p-6">
                        <span class="text-primary text-xs font-bold mb-2">March 2024</span>
                        <h3 class="text-white font-bold text-lg mb-1">Network Security Seminar</h3>
                        <p class="text-white/80 text-sm">Industry experts sharing latest insights</p>
                    </div>
                </div>

                <!-- Activity 4 -->
                <div class="group relative overflow-hidden rounded-2xl border-2 border-gray-200 hover:border-primary/50 transition-all duration-300 hover:shadow-2xl hover:shadow-primary/20 hover-lift bg-white">
                    <div class="aspect-video bg-gradient-to-br from-slate-100 to-slate-50">
                        <img src="https://images.unsplash.com/photo-1504384308090-c894fdcc538d?w=800&q=80" alt="Ethical Hacking Training" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500" loading="lazy"/>
                    </div>
                    <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/40 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex flex-col items-start justify-end p-6">
                        <span class="text-primary text-xs font-bold mb-2">April 2024</span>
                        <h3 class="text-white font-bold text-lg mb-1">Ethical Hacking Training</h3>
                        <p class="text-white/80 text-sm">Hands-on ethical hacking certification prep</p>
                    </div>
                </div>

                <!-- Activity 5 -->
                <div class="group relative overflow-hidden rounded-2xl border-2 border-gray-200 hover:border-primary/50 transition-all duration-300 hover:shadow-2xl hover:shadow-primary/20 hover-lift bg-white">
                    <div class="aspect-video bg-gradient-to-br from-slate-100 to-slate-50">
                        <img src="https://images.unsplash.com/photo-1531482615713-2afd69097998?w=800&q=80" alt="Industry Collaboration" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500" loading="lazy"/>
                    </div>
                    <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/40 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex flex-col items-start justify-end p-6">
                        <span class="text-primary text-xs font-bold mb-2">May 2024</span>
                        <h3 class="text-white font-bold text-lg mb-1">Industry Collaboration</h3>
                        <p class="text-white/80 text-sm">Partnership with leading tech companies</p>
                    </div>
                </div>

                <!-- Activity 6 -->
                <div class="group relative overflow-hidden rounded-2xl border-2 border-gray-200 hover:border-primary/50 transition-all duration-300 hover:shadow-2xl hover:shadow-primary/20 hover-lift bg-white">
                    <div class="aspect-video bg-gradient-to-br from-slate-100 to-slate-50">
                        <img src="https://images.unsplash.com/photo-1522071820081-009f0129c71c?w=800&q=80" alt="Student Hackathon" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500" loading="lazy"/>
                    </div>
                    <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/40 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex flex-col items-start justify-end p-6">
                        <span class="text-primary text-xs font-bold mb-2">June 2024</span>
                        <h3 class="text-white font-bold text-lg mb-1">Student Hackathon</h3>
                        <p class="text-white/80 text-sm">24-hour coding competition</p>
                    </div>
                </div>

                <!-- Activity 7 -->
                <div class="group relative overflow-hidden rounded-2xl border-2 border-gray-200 hover:border-primary/50 transition-all duration-300 hover:shadow-2xl hover:shadow-primary/20 hover-lift bg-white">
                    <div class="aspect-video bg-gradient-to-br from-slate-100 to-slate-50">
                        <img src="https://images.unsplash.com/photo-1560439514-4e9645039924?w=800&q=80" alt="IoT Security Workshop" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500" loading="lazy"/>
                    </div>
                    <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/40 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex flex-col items-start justify-end p-6">
                        <span class="text-primary text-xs font-bold mb-2">July 2024</span>
                        <h3 class="text-white font-bold text-lg mb-1">IoT Security Workshop</h3>
                        <p class="text-white/80 text-sm">Securing Internet of Things devices</p>
                    </div>
                </div>

                <!-- Activity 8 -->
                <div class="group relative overflow-hidden rounded-2xl border-2 border-gray-200 hover:border-primary/50 transition-all duration-300 hover:shadow-2xl hover:shadow-primary/20 hover-lift bg-white">
                    <div class="aspect-video bg-gradient-to-br from-slate-100 to-slate-50">
                        <img src="https://images.unsplash.com/photo-1558494949-ef010cbdcc31?w=800&q=80" alt="Lab Equipment Upgrade" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500" loading="lazy"/>
                    </div>
                    <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/40 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex flex-col items-start justify-end p-6">
                        <span class="text-primary text-xs font-bold mb-2">August 2024</span>
                        <h3 class="text-white font-bold text-lg mb-1">Lab Equipment Upgrade</h3>
                        <p class="text-white/80 text-sm">New state-of-the-art security infrastructure</p>
                    </div>
                </div>

                <!-- Activity 9 -->
                <div class="group relative overflow-hidden rounded-2xl border-2 border-gray-200 hover:border-primary/50 transition-all duration-300 hover:shadow-2xl hover:shadow-primary/20 hover-lift bg-white">
                    <div class="aspect-video bg-gradient-to-br from-slate-100 to-slate-50">
                        <img src="https://images.unsplash.com/photo-1517245386807-bb43f82c33c4?w=800&q=80" alt="Alumni Gathering" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500" loading="lazy"/>
                    </div>
                    <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/40 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex flex-col items-start justify-end p-6">
                        <span class="text-primary text-xs font-bold mb-2">September 2024</span>
                        <h3 class="text-white font-bold text-lg mb-1">Alumni Gathering</h3>
                        <p class="text-white/80 text-sm">Networking with cybersecurity professionals</p>
                    </div>
                </div>

                <!-- Activity 10 -->
                <div class="group relative overflow-hidden rounded-2xl border-2 border-gray-200 hover:border-primary/50 transition-all duration-300 hover:shadow-2xl hover:shadow-primary/20 hover-lift bg-white">
                    <div class="aspect-video bg-gradient-to-br from-slate-100 to-slate-50">
                        <img src="https://images.unsplash.com/photo-1573164713988-8665fc963095?w=800&q=80" alt="Research Presentation" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500" loading="lazy"/>
                    </div>
                    <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/40 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex flex-col items-start justify-end p-6">
                        <span class="text-primary text-xs font-bold mb-2">October 2024</span>
                        <h3 class="text-white font-bold text-lg mb-1">Research Presentation</h3>
                        <p class="text-white/80 text-sm">Students presenting latest research findings</p>
                    </div>
                </div>

                <!-- Activity 11 -->
                <div class="group relative overflow-hidden rounded-2xl border-2 border-gray-200 hover:border-primary/50 transition-all duration-300 hover:shadow-2xl hover:shadow-primary/20 hover-lift bg-white">
                    <div class="aspect-video bg-gradient-to-br from-slate-100 to-slate-50">
                        <img src="https://images.unsplash.com/photo-1531497865144-0464ef8fb9a9?w=800&q=80" alt="Cloud Security Training" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500" loading="lazy"/>
                    </div>
                    <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/40 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex flex-col items-start justify-end p-6">
                        <span class="text-primary text-xs font-bold mb-2">November 2024</span>
                        <h3 class="text-white font-bold text-lg mb-1">Cloud Security Training</h3>
                        <p class="text-white/80 text-sm">AWS and Azure security best practices</p>
                    </div>
                </div>

                <!-- Activity 12 -->
                <div class="group relative overflow-hidden rounded-2xl border-2 border-gray-200 hover:border-primary/50 transition-all duration-300 hover:shadow-2xl hover:shadow-primary/20 hover-lift bg-white">
                    <div class="aspect-video bg-gradient-to-br from-slate-100 to-slate-50">
                        <img src="https://images.unsplash.com/photo-1523240795612-9a054b0db644?w=800&q=80" alt="Year End Ceremony" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500" loading="lazy"/>
                    </div>
                    <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/40 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex flex-col items-start justify-end p-6">
                        <span class="text-primary text-xs font-bold mb-2">December 2024</span>
                        <h3 class="text-white font-bold text-lg mb-1">Year End Ceremony</h3>
                        <p class="text-white/80 text-sm">Celebrating achievements and milestones</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    @include('partials.footer')
    @include('partials.back-to-top')
    @include('partials.shared-scripts')
</body>
</html>
