<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Events & Agenda - Network & Cyber Security Lab</title>
    <meta name="description" content="Upcoming events, workshops, and activities from Network and Cyber Security Laboratory"/>
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
                }
            }
        }
    </script>
    <style>
        .event-card {
            transition: all 0.3s ease;
        }
        .event-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 12px 24px rgba(0, 0, 0, 0.1);
        }
        .badge-online {
            background: linear-gradient(135deg, #10b981 0%, #059669 100%);
        }
        .badge-offline {
            background: linear-gradient(135deg, #3b82f6 0%, #2563eb 100%);
        }
        .badge-hybrid {
            background: linear-gradient(135deg, #8b5cf6 0%, #7c3aed 100%);
        }
    </style>
</head>
<body class="font-sans antialiased bg-gray-50 text-foreground">
    @include('partials.scroll-progress')
    @include('partials.navbar')
    @include('partials.hero-agenda')
    
    <!-- Events Section -->
    <section class="relative py-16 px-4 sm:px-6 lg:px-8">
        <div class="max-w-7xl mx-auto">
            <!-- Filter Tabs -->
            <div class="mb-8">
                <div class="flex flex-wrap gap-3">
                    <button class="filter-btn active px-6 py-2.5 rounded-full font-semibold text-sm transition-all bg-primary text-white shadow-md hover:shadow-lg">
                        All Events
                    </button>
                    <button class="filter-btn px-6 py-2.5 rounded-full font-semibold text-sm transition-all bg-white text-gray-700 hover:bg-gray-100 border border-gray-200">
                        Upcoming
                    </button>
                    <button class="filter-btn px-6 py-2.5 rounded-full font-semibold text-sm transition-all bg-white text-gray-700 hover:bg-gray-100 border border-gray-200">
                        Workshops
                    </button>
                    <button class="filter-btn px-6 py-2.5 rounded-full font-semibold text-sm transition-all bg-white text-gray-700 hover:bg-gray-100 border border-gray-200">
                        Competitions
                    </button>
                    <button class="filter-btn px-6 py-2.5 rounded-full font-semibold text-sm transition-all bg-white text-gray-700 hover:bg-gray-100 border border-gray-200">
                        Seminars
                    </button>
                </div>
            </div>

            <!-- Events Grid -->
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
                <!-- Event Card 1 -->
                <div class="event-card bg-white rounded-2xl overflow-hidden border border-gray-200">
                    <div class="relative">
                        <img src="https://images.unsplash.com/photo-1540575467063-178a50c2df87?w=800&q=80" alt="Event" class="w-full h-48 object-cover"/>
                        <div class="absolute top-3 left-3">
                            <span class="badge-online px-3 py-1.5 rounded-full text-white text-xs font-bold shadow-lg">
                                ONLINE
                            </span>
                        </div>
                        <div class="absolute top-3 right-3 bg-white/95 backdrop-blur-sm rounded-xl px-3 py-2 text-center shadow-lg">
                            <div class="text-2xl font-bold text-secondary">15</div>
                            <div class="text-xs text-gray-600 font-semibold">DEC</div>
                        </div>
                    </div>
                    <div class="p-5">
                        <div class="flex items-center gap-2 text-xs text-gray-500 mb-3">
                            <i data-feather="clock" class="w-4 h-4"></i>
                            <span>09:00 - 16:00 WIB</span>
                        </div>
                        <h3 class="text-lg font-bold text-gray-900 mb-2 line-clamp-2">
                            Advanced Penetration Testing Workshop 2024
                        </h3>
                        <p class="text-sm text-gray-600 mb-4 line-clamp-2">
                            Learn advanced techniques in penetration testing and ethical hacking from industry experts.
                        </p>
                        <div class="flex items-center justify-between">
                            <div class="flex items-center gap-2">
                                <i data-feather="users" class="w-4 h-4 text-gray-400"></i>
                                <span class="text-sm text-gray-600">50 slots</span>
                            </div>
                            <button class="px-4 py-2 bg-primary text-white rounded-lg text-sm font-semibold hover:bg-secondary transition-colors">
                                Register
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Event Card 2 -->
                <div class="event-card bg-white rounded-2xl overflow-hidden border border-gray-200">
                    <div class="relative">
                        <img src="https://images.unsplash.com/photo-1591115765373-5207764f72e7?w=800&q=80" alt="Event" class="w-full h-48 object-cover"/>
                        <div class="absolute top-3 left-3">
                            <span class="badge-offline px-3 py-1.5 rounded-full text-white text-xs font-bold shadow-lg">
                                OFFLINE
                            </span>
                        </div>
                        <div class="absolute top-3 right-3 bg-white/95 backdrop-blur-sm rounded-xl px-3 py-2 text-center shadow-lg">
                            <div class="text-2xl font-bold text-secondary">20</div>
                            <div class="text-xs text-gray-600 font-semibold">DEC</div>
                        </div>
                    </div>
                    <div class="p-5">
                        <div class="flex items-center gap-2 text-xs text-gray-500 mb-3">
                            <i data-feather="map-pin" class="w-4 h-4"></i>
                            <span>NCS Lab, Politeknik Negeri Malang</span>
                        </div>
                        <h3 class="text-lg font-bold text-gray-900 mb-2 line-clamp-2">
                            Cyber Security CTF Competition 2024
                        </h3>
                        <p class="text-sm text-gray-600 mb-4 line-clamp-2">
                            Compete with the best teams in capture the flag challenges. Test your skills!
                        </p>
                        <div class="flex items-center justify-between">
                            <div class="flex items-center gap-2">
                                <i data-feather="users" class="w-4 h-4 text-gray-400"></i>
                                <span class="text-sm text-gray-600">20 teams</span>
                            </div>
                            <button class="px-4 py-2 bg-primary text-white rounded-lg text-sm font-semibold hover:bg-secondary transition-colors">
                                Register
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Event Card 3 -->
                <div class="event-card bg-white rounded-2xl overflow-hidden border border-gray-200">
                    <div class="relative">
                        <img src="https://images.unsplash.com/photo-1552664730-d307ca884978?w=800&q=80" alt="Event" class="w-full h-48 object-cover"/>
                        <div class="absolute top-3 left-3">
                            <span class="badge-hybrid px-3 py-1.5 rounded-full text-white text-xs font-bold shadow-lg">
                                HYBRID
                            </span>
                        </div>
                        <div class="absolute top-3 right-3 bg-white/95 backdrop-blur-sm rounded-xl px-3 py-2 text-center shadow-lg">
                            <div class="text-2xl font-bold text-secondary">22</div>
                            <div class="text-xs text-gray-600 font-semibold">DEC</div>
                        </div>
                    </div>
                    <div class="p-5">
                        <div class="flex items-center gap-2 text-xs text-gray-500 mb-3">
                            <i data-feather="clock" class="w-4 h-4"></i>
                            <span>13:00 - 17:00 WIB</span>
                        </div>
                        <h3 class="text-lg font-bold text-gray-900 mb-2 line-clamp-2">
                            Network Security Seminar: Latest Trends
                        </h3>
                        <p class="text-sm text-gray-600 mb-4 line-clamp-2">
                            Industry experts discuss the latest trends in network security and threat landscape.
                        </p>
                        <div class="flex items-center justify-between">
                            <div class="flex items-center gap-2">
                                <i data-feather="users" class="w-4 h-4 text-gray-400"></i>
                                <span class="text-sm text-gray-600">100 slots</span>
                            </div>
                            <button class="px-4 py-2 bg-primary text-white rounded-lg text-sm font-semibold hover:bg-secondary transition-colors">
                                Register
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Event Card 4 -->
                <div class="event-card bg-white rounded-2xl overflow-hidden border border-gray-200">
                    <div class="relative">
                        <img src="https://images.unsplash.com/photo-1504384308090-c894fdcc538d?w=800&q=80" alt="Event" class="w-full h-48 object-cover"/>
                        <div class="absolute top-3 left-3">
                            <span class="badge-online px-3 py-1.5 rounded-full text-white text-xs font-bold shadow-lg">
                                ONLINE
                            </span>
                        </div>
                        <div class="absolute top-3 right-3 bg-white/95 backdrop-blur-sm rounded-xl px-3 py-2 text-center shadow-lg">
                            <div class="text-2xl font-bold text-secondary">28</div>
                            <div class="text-xs text-gray-600 font-semibold">DEC</div>
                        </div>
                    </div>
                    <div class="p-5">
                        <div class="flex items-center gap-2 text-xs text-gray-500 mb-3">
                            <i data-feather="clock" class="w-4 h-4"></i>
                            <span>10:00 - 15:00 WIB</span>
                        </div>
                        <h3 class="text-lg font-bold text-gray-900 mb-2 line-clamp-2">
                            Ethical Hacking Certification Prep Course
                        </h3>
                        <p class="text-sm text-gray-600 mb-4 line-clamp-2">
                            Comprehensive preparation for CEH certification with hands-on labs and practice tests.
                        </p>
                        <div class="flex items-center justify-between">
                            <div class="flex items-center gap-2">
                                <i data-feather="users" class="w-4 h-4 text-gray-400"></i>
                                <span class="text-sm text-gray-600">30 slots</span>
                            </div>
                            <button class="px-4 py-2 bg-primary text-white rounded-lg text-sm font-semibold hover:bg-secondary transition-colors">
                                Register
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Event Card 5 -->
                <div class="event-card bg-white rounded-2xl overflow-hidden border border-gray-200">
                    <div class="relative">
                        <img src="https://images.unsplash.com/photo-1522071820081-009f0129c71c?w=800&q=80" alt="Event" class="w-full h-48 object-cover"/>
                        <div class="absolute top-3 left-3">
                            <span class="badge-offline px-3 py-1.5 rounded-full text-white text-xs font-bold shadow-lg">
                                OFFLINE
                            </span>
                        </div>
                        <div class="absolute top-3 right-3 bg-white/95 backdrop-blur-sm rounded-xl px-3 py-2 text-center shadow-lg">
                            <div class="text-2xl font-bold text-secondary">05</div>
                            <div class="text-xs text-gray-600 font-semibold">JAN</div>
                        </div>
                    </div>
                    <div class="p-5">
                        <div class="flex items-center gap-2 text-xs text-gray-500 mb-3">
                            <i data-feather="map-pin" class="w-4 h-4"></i>
                            <span>Main Auditorium, Polinema</span>
                        </div>
                        <h3 class="text-lg font-bold text-gray-900 mb-2 line-clamp-2">
                            Student Hackathon 2025 Kickoff
                        </h3>
                        <p class="text-sm text-gray-600 mb-4 line-clamp-2">
                            24-hour coding competition focused on cybersecurity solutions. Build, hack, win!
                        </p>
                        <div class="flex items-center justify-between">
                            <div class="flex items-center gap-2">
                                <i data-feather="users" class="w-4 h-4 text-gray-400"></i>
                                <span class="text-sm text-gray-600">40 teams</span>
                            </div>
                            <button class="px-4 py-2 bg-primary text-white rounded-lg text-sm font-semibold hover:bg-secondary transition-colors">
                                Register
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Event Card 6 -->
                <div class="event-card bg-white rounded-2xl overflow-hidden border border-gray-200">
                    <div class="relative">
                        <img src="https://images.unsplash.com/photo-1560439514-4e9645039924?w=800&q=80" alt="Event" class="w-full h-48 object-cover"/>
                        <div class="absolute top-3 left-3">
                            <span class="badge-online px-3 py-1.5 rounded-full text-white text-xs font-bold shadow-lg">
                                ONLINE
                            </span>
                        </div>
                        <div class="absolute top-3 right-3 bg-white/95 backdrop-blur-sm rounded-xl px-3 py-2 text-center shadow-lg">
                            <div class="text-2xl font-bold text-secondary">10</div>
                            <div class="text-xs text-gray-600 font-semibold">JAN</div>
                        </div>
                    </div>
                    <div class="p-5">
                        <div class="flex items-center gap-2 text-xs text-gray-500 mb-3">
                            <i data-feather="clock" class="w-4 h-4"></i>
                            <span>14:00 - 18:00 WIB</span>
                        </div>
                        <h3 class="text-lg font-bold text-gray-900 mb-2 line-clamp-2">
                            IoT Security Workshop: Protect Your Devices
                        </h3>
                        <p class="text-sm text-gray-600 mb-4 line-clamp-2">
                            Learn to secure IoT devices and networks from emerging threats and vulnerabilities.
                        </p>
                        <div class="flex items-center justify-between">
                            <div class="flex items-center gap-2">
                                <i data-feather="users" class="w-4 h-4 text-gray-400"></i>
                                <span class="text-sm text-gray-600">60 slots</span>
                            </div>
                            <button class="px-4 py-2 bg-primary text-white rounded-lg text-sm font-semibold hover:bg-secondary transition-colors">
                                Register
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Load More Button -->
            <div class="text-center mt-12">
                <button class="px-8 py-3 bg-white text-gray-700 border-2 border-gray-200 rounded-xl font-semibold hover:border-primary hover:text-primary transition-all">
                    Load More Events
                </button>
            </div>
        </div>
    </section>
    
    @include('partials.footer')
    @include('partials.back-to-top')
    @include('partials.shared-scripts')
    
    <script>
        // Initialize Feather Icons
        feather.replace();
        
        // Filter buttons
        const filterBtns = document.querySelectorAll('.filter-btn');
        filterBtns.forEach(btn => {
            btn.addEventListener('click', function() {
                filterBtns.forEach(b => {
                    b.classList.remove('active', 'bg-primary', 'text-white', 'shadow-md');
                    b.classList.add('bg-white', 'text-gray-700', 'border', 'border-gray-200');
                });
                this.classList.add('active', 'bg-primary', 'text-white', 'shadow-md');
                this.classList.remove('bg-white', 'text-gray-700', 'border', 'border-gray-200');
            });
        });
    </script>
</body>
</html>
