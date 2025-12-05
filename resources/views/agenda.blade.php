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
                @forelse($agendas as $agenda)
                <!-- Event Card -->
                <div class="event-card bg-white rounded-2xl overflow-hidden border border-gray-200">
                    <div class="relative">
                        <img src="{{ asset('storage/' . $agenda->file_path) }}" alt="{{ $agenda->title }}" class="w-full h-48 object-cover"/>
                        @if($agenda->event_mode)
                        <div class="absolute top-3 left-3">
                            <span class="badge-{{ $agenda->event_mode }} px-3 py-1.5 rounded-full text-white text-xs font-bold shadow-lg">
                                {{ strtoupper($agenda->event_mode) }}
                            </span>
                        </div>
                        @endif
                        @if($agenda->event_date)
                        <div class="absolute top-3 right-3 bg-white/95 backdrop-blur-sm rounded-xl px-3 py-2 text-center shadow-lg">
                            <div class="text-2xl font-bold text-secondary">{{ $agenda->event_date->format('d') }}</div>
                            <div class="text-xs text-gray-600 font-semibold">{{ strtoupper($agenda->event_date->format('M')) }}</div>
                        </div>
                        @endif
                    </div>
                    <div class="p-5">
                        <div class="flex items-center gap-2 text-xs text-gray-500 mb-3">
                            @if($agenda->event_mode == 'online' || $agenda->event_mode == 'hybrid')
                                <i data-feather="clock" class="w-4 h-4"></i>
                                <span>{{ $agenda->event_time ? \Carbon\Carbon::parse($agenda->event_time)->format('H:i') : 'TBA' }} WIB</span>
                            @else
                                <i data-feather="map-pin" class="w-4 h-4"></i>
                                <span>{{ $agenda->location ?? 'TBA' }}</span>
                            @endif
                        </div>
                        <h3 class="text-lg font-bold text-gray-900 mb-2 line-clamp-2">
                            {{ $agenda->title }}
                        </h3>
                        <p class="text-sm text-gray-600 mb-4 line-clamp-2">
                            {{ $agenda->description ?? 'No description available' }}
                        </p>
                        <div class="flex items-center justify-between">
                            <div class="flex items-center gap-2">
                                <i data-feather="users" class="w-4 h-4 text-gray-400"></i>
                                <span class="text-sm text-gray-600">
                                    @if($agenda->max_slots)
                                        {{ $agenda->registered_count }}/{{ $agenda->max_slots }} slots
                                    @else
                                        Unlimited
                                    @endif
                                </span>
                            </div>
                            <a href="#footer" class="px-4 py-2 bg-primary text-white rounded-lg text-sm font-semibold hover:bg-secondary transition-colors">
                                Register
                            </a>
                        </div>
                    </div>
                </div>
                @empty
                <div class="col-span-full text-center py-12">
                    <i data-feather="calendar" class="w-16 h-16 mx-auto text-gray-300 mb-4"></i>
                    <p class="text-gray-500 text-lg">No upcoming events at the moment</p>
                </div>
                @endforelse
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
