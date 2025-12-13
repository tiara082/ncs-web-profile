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
            <!-- Filter Section -->
            <div class="mb-8">
                <div class="bg-white rounded-2xl shadow-md border border-gray-200 p-6">
                    <div class="grid md:grid-cols-4 gap-4">
                        <!-- Year Filter -->
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Year</label>
                            <select id="yearFilter" class="w-full px-4 py-2.5 border border-gray-300 rounded-xl focus:ring-2 focus:ring-primary focus:border-transparent transition-all">
                                <option value="">All Years</option>
                                @foreach(range(date('Y'), 2020) as $year)
                                <option value="{{ $year }}">{{ $year }}</option>
                                @endforeach
                            </select>
                        </div>
                        
                        <!-- Month Filter -->
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Month</label>
                            <select id="monthFilter" class="w-full px-4 py-2.5 border border-gray-300 rounded-xl focus:ring-2 focus:ring-primary focus:border-transparent transition-all">
                                <option value="">All Months</option>
                                <option value="01">January</option>
                                <option value="02">February</option>
                                <option value="03">March</option>
                                <option value="04">April</option>
                                <option value="05">May</option>
                                <option value="06">June</option>
                                <option value="07">July</option>
                                <option value="08">August</option>
                                <option value="09">September</option>
                                <option value="10">October</option>
                                <option value="11">November</option>
                                <option value="12">December</option>
                            </select>
                        </div>
                        
                        <!-- Category Filter -->
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Category</label>
                            <select id="categoryFilter" class="w-full px-4 py-2.5 border border-gray-300 rounded-xl focus:ring-2 focus:ring-primary focus:border-transparent transition-all">
                                <option value="">All Categories</option>
                                <option value="workshop">Workshop</option>
                                <option value="seminar">Seminar</option>
                                <option value="training">Training</option>
                                <option value="competition">Competition</option>
                                <option value="webinar">Webinar</option>
                            </select>
                        </div>
                        
                        <!-- Search -->
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Search</label>
                            <div class="relative">
                                <input type="text" id="searchInput" placeholder="Search events..." class="w-full px-4 py-2.5 pl-10 border border-gray-300 rounded-xl focus:ring-2 focus:ring-primary focus:border-transparent transition-all">
                                <i data-feather="search" class="absolute left-3 top-1/2 -translate-y-1/2 w-4 h-4 text-gray-400"></i>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Active Filters & Reset -->
                    <div class="flex items-center justify-between mt-4 pt-4 border-t border-gray-200">
                        <div id="activeFilters" class="flex flex-wrap gap-2"></div>
                        <button onclick="resetFilters()" class="px-4 py-2 text-sm font-semibold text-gray-600 hover:text-primary transition-colors">
                            <i data-feather="refresh-cw" class="w-4 h-4 inline mr-1"></i>
                            Reset Filter
                        </button>
                    </div>
                </div>
            </div>

            <!-- Events Grid -->
            <div id="eventsGrid" class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
                @forelse($agendas as $agenda)
                <!-- Event Card -->
                <div class="event-card bg-white rounded-2xl overflow-hidden border border-gray-200"
                     data-year="{{ $agenda->event_date ? $agenda->event_date->format('Y') : '' }}"
                     data-month="{{ $agenda->event_date ? $agenda->event_date->format('m') : '' }}"
                     data-category="{{ strtolower($agenda->event_category ?? '') }}"
                     data-title="{{ strtolower($agenda->title) }}"
                     data-location="{{ strtolower($agenda->location ?? '') }}">
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
            
            <!-- No Results -->
            <div id="noResults" class="hidden text-center py-16">
                <div class="w-24 h-24 mx-auto mb-6 bg-gray-100 rounded-full flex items-center justify-center">
                    <i data-feather="calendar" class="w-12 h-12 text-gray-400"></i>
                </div>
                <h3 class="text-2xl font-bold text-gray-800 mb-2">No Events Found</h3>
                <p class="text-gray-600">No events match the selected filters</p>
            </div>
        </div>
    </section>
    
    @include('partials.footer')
    @include('partials.back-to-top')
    @include('partials.shared-scripts')
    
    <script>
        // Initialize Feather Icons
        feather.replace();
        
        // Filter Functions
        function filterEvents() {
            const yearFilter = document.getElementById('yearFilter').value;
            const monthFilter = document.getElementById('monthFilter').value;
            const categoryFilter = document.getElementById('categoryFilter').value;
            const searchInput = document.getElementById('searchInput').value.toLowerCase();
            
            const eventCards = document.querySelectorAll('.event-card');
            let visibleCount = 0;
            
            eventCards.forEach(card => {
                const year = card.dataset.year;
                const month = card.dataset.month;
                const category = card.dataset.category;
                const title = card.dataset.title;
                const location = card.dataset.location;
                
                const yearMatch = !yearFilter || year === yearFilter;
                const monthMatch = !monthFilter || month === monthFilter;
                const categoryMatch = !categoryFilter || category === categoryFilter;
                const searchMatch = !searchInput || title.includes(searchInput) || location.includes(searchInput);
                
                if (yearMatch && monthMatch && categoryMatch && searchMatch) {
                    card.classList.remove('hidden');
                    visibleCount++;
                } else {
                    card.classList.add('hidden');
                }
            });
            
            // Show/hide no results message
            document.getElementById('noResults').classList.toggle('hidden', visibleCount > 0);
            document.getElementById('eventsGrid').classList.toggle('hidden', visibleCount === 0);
            
            // Update active filters
            updateActiveFilters();
        }
        
        function updateActiveFilters() {
            const yearFilter = document.getElementById('yearFilter');
            const monthFilter = document.getElementById('monthFilter');
            const categoryFilter = document.getElementById('categoryFilter');
            const searchInput = document.getElementById('searchInput');
            const activeFiltersDiv = document.getElementById('activeFilters');
            
            let filtersHTML = '';
            
            if (yearFilter.value) {
                filtersHTML += `<span class="inline-flex items-center gap-1 px-3 py-1 bg-primary/10 text-primary rounded-lg text-sm font-semibold">
                    ${yearFilter.options[yearFilter.selectedIndex].text}
                    <button onclick="clearFilter('yearFilter')" class="ml-1 hover:bg-primary/20 rounded-full p-0.5">
                        <i data-feather="x" class="w-3 h-3"></i>
                    </button>
                </span>`;
            }
            
            if (monthFilter.value) {
                filtersHTML += `<span class="inline-flex items-center gap-1 px-3 py-1 bg-primary/10 text-primary rounded-lg text-sm font-semibold">
                    ${monthFilter.options[monthFilter.selectedIndex].text}
                    <button onclick="clearFilter('monthFilter')" class="ml-1 hover:bg-primary/20 rounded-full p-0.5">
                        <i data-feather="x" class="w-3 h-3"></i>
                    </button>
                </span>`;
            }
            
            if (categoryFilter.value) {
                filtersHTML += `<span class="inline-flex items-center gap-1 px-3 py-1 bg-primary/10 text-primary rounded-lg text-sm font-semibold">
                    ${categoryFilter.options[categoryFilter.selectedIndex].text}
                    <button onclick="clearFilter('categoryFilter')" class="ml-1 hover:bg-primary/20 rounded-full p-0.5">
                        <i data-feather="x" class="w-3 h-3"></i>
                    </button>
                </span>`;
            }
            
            if (searchInput.value) {
                filtersHTML += `<span class="inline-flex items-center gap-1 px-3 py-1 bg-primary/10 text-primary rounded-lg text-sm font-semibold">
                    "${searchInput.value}"
                    <button onclick="clearFilter('searchInput')" class="ml-1 hover:bg-primary/20 rounded-full p-0.5">
                        <i data-feather="x" class="w-3 h-3"></i>
                    </button>
                </span>`;
            }
            
            activeFiltersDiv.innerHTML = filtersHTML;
            feather.replace();
        }
        
        function clearFilter(filterId) {
            document.getElementById(filterId).value = '';
            filterEvents();
        }
        
        function resetFilters() {
            document.getElementById('yearFilter').value = '';
            document.getElementById('monthFilter').value = '';
            document.getElementById('categoryFilter').value = '';
            document.getElementById('searchInput').value = '';
            filterEvents();
        }
        
        // Event listeners
        document.getElementById('yearFilter').addEventListener('change', filterEvents);
        document.getElementById('monthFilter').addEventListener('change', filterEvents);
        document.getElementById('categoryFilter').addEventListener('change', filterEvents);
        document.getElementById('searchInput').addEventListener('input', filterEvents);
        
        // Initialize
        updateActiveFilters();
    </script>
</body>
</html>
