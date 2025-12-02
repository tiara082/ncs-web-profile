<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Community Service - NCS Lab</title>
    <link rel="icon" type="image/png" href="{{ asset('assets/polinema.png') }}">
    <script src="https://cdn.tailwindcss.com/3.4.17"></script>
    <script src="https://unpkg.com/feather-icons"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#66bbf2',
                        secondary: '#222f7f',
                        foreground: '#334155',
                    }
                }
            }
        }
    </script>
</head>
<body class="bg-slate-50">
    <div class="min-h-screen flex flex-col">
        <!-- Sub Header -->
        @include('partials.sub-header')
        
        <!-- Main Content -->
        <main class="flex-1">
            <div class="container mx-auto px-4 py-16 max-w-7xl">
                
                <!-- Filter Section -->
                <div class="mb-8">
                    <div class="bg-white rounded-2xl shadow-md border border-slate-200 p-6">
                        <div class="grid md:grid-cols-4 gap-4">
                            <!-- Year Filter -->
                            <div>
                                <label class="block text-sm font-semibold text-slate-700 mb-2">Year</label>
                                <select id="yearFilter" class="w-full px-4 py-2.5 border border-slate-300 rounded-xl focus:ring-2 focus:ring-primary focus:border-transparent transition-all">
                                    <option value="">All Years</option>
                                    @foreach(range(date('Y'), 2020) as $year)
                                    <option value="{{ $year }}">{{ $year }}</option>
                                    @endforeach
                                </select>
                            </div>
                            
                            <!-- Month Filter -->
                            <div>
                                <label class="block text-sm font-semibold text-slate-700 mb-2">Month</label>
                                <select id="monthFilter" class="w-full px-4 py-2.5 border border-slate-300 rounded-xl focus:ring-2 focus:ring-primary focus:border-transparent transition-all">
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
                                <label class="block text-sm font-semibold text-slate-700 mb-2">Category</label>
                                <select id="categoryFilter" class="w-full px-4 py-2.5 border border-slate-300 rounded-xl focus:ring-2 focus:ring-primary focus:border-transparent transition-all">
                                    <option value="">All Categories</option>
                                    <option value="workshop">Workshop</option>
                                    <option value="training">Training</option>
                                    <option value="seminar">Seminar</option>
                                    <option value="webinar">Webinar</option>
                                    <option value="consultation">Consultation</option>
                                </select>
                            </div>
                            
                            <!-- Search -->
                            <div>
                                <label class="block text-sm font-semibold text-slate-700 mb-2">Search</label>
                                <div class="relative">
                                    <input type="text" id="searchInput" placeholder="Search activities..." class="w-full px-4 py-2.5 pl-10 border border-slate-300 rounded-xl focus:ring-2 focus:ring-primary focus:border-transparent transition-all">
                                    <i data-feather="search" class="absolute left-3 top-1/2 -translate-y-1/2 w-4 h-4 text-slate-400"></i>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Active Filters & Reset -->
                        <div class="flex items-center justify-between mt-4 pt-4 border-t border-slate-200">
                            <div id="activeFilters" class="flex flex-wrap gap-2"></div>
                            <button onclick="resetFilters()" class="px-4 py-2 text-sm font-semibold text-slate-600 hover:text-primary transition-colors">
                                <i data-feather="refresh-cw" class="w-4 h-4 inline mr-1"></i>
                                Reset Filter
                            </button>
                        </div>
                    </div>
                </div>
                
                <!-- Events Grid -->
                <div id="eventsGrid" class="grid md:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
                    @foreach($events as $event)
                    <div class="event-card bg-white rounded-2xl overflow-hidden shadow-md border border-slate-200 hover:shadow-xl transition-all duration-300 group" 
                         data-year="{{ $event['year'] }}" 
                         data-month="{{ $event['month'] }}" 
                         data-category="{{ $event['category'] }}"
                         data-title="{{ strtolower($event['title']) }}"
                         data-location="{{ strtolower($event['location']) }}">
                        
                        <!-- Image -->
                        <div class="relative h-48 overflow-hidden bg-gradient-to-br from-primary/10 to-secondary/10">
                            <img src="{{ $event['image'] }}" alt="{{ $event['title'] }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500"/>
                            <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent"></div>
                            
                            <!-- Category Badge -->
                            <div class="absolute top-3 right-3">
                                <span class="px-3 py-1 bg-white/95 backdrop-blur-sm text-xs font-bold text-{{ $event['category_color'] }}-600 rounded-full shadow-lg">
                                    {{ ucfirst($event['category']) }}
                                </span>
                            </div>
                            
                            <!-- Date Badge -->
                            <div class="absolute bottom-3 left-3 bg-white/95 backdrop-blur-sm rounded-xl px-4 py-2 shadow-lg">
                                <div class="text-center">
                                    <div class="text-2xl font-bold text-slate-800">{{ $event['day'] }}</div>
                                    <div class="text-xs font-semibold text-slate-600">{{ $event['month_name'] }}</div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Content -->
                        <div class="p-6">
                            <h3 class="font-bold text-lg text-slate-800 mb-2 group-hover:text-primary transition-colors line-clamp-2">
                                {{ $event['title'] }}
                            </h3>
                            
                            <p class="text-sm text-slate-600 mb-4 line-clamp-2">
                                {{ $event['description'] }}
                            </p>
                            
                            <div class="space-y-2 mb-4">
                                <div class="flex items-center gap-2 text-sm text-slate-600">
                                    <i data-feather="map-pin" class="w-4 h-4 text-primary flex-shrink-0"></i>
                                    <span class="line-clamp-1">{{ $event['location'] }}</span>
                                </div>
                                <div class="flex items-center gap-2 text-sm text-slate-600">
                                    <i data-feather="users" class="w-4 h-4 text-primary flex-shrink-0"></i>
                                    <span>{{ $event['participants'] }} Peserta</span>
                                </div>
                            </div>
                            
                            <!-- Status Badge -->
                            @if($event['status'] == 'completed')
                            <div class="inline-flex items-center gap-1.5 px-3 py-1.5 bg-green-100 text-green-700 rounded-lg text-xs font-semibold">
                                <i data-feather="check-circle" class="w-3.5 h-3.5"></i>
                                Completed
                            </div>
                            @elseif($event['status'] == 'upcoming')
                            <div class="inline-flex items-center gap-1.5 px-3 py-1.5 bg-blue-100 text-blue-700 rounded-lg text-xs font-semibold">
                                <i data-feather="clock" class="w-3.5 h-3.5"></i>
                                Upcoming
                            </div>
                            @else
                            <div class="inline-flex items-center gap-1.5 px-3 py-1.5 bg-orange-100 text-orange-700 rounded-lg text-xs font-semibold">
                                <i data-feather="radio" class="w-3.5 h-3.5"></i>
                                Ongoing
                            </div>
                            @endif
                        </div>
                    </div>
                    @endforeach
                </div>
                
                <!-- No Results -->
                <div id="noResults" class="hidden text-center py-16">
                    <div class="w-24 h-24 mx-auto mb-6 bg-slate-100 rounded-full flex items-center justify-center">
                        <i data-feather="calendar" class="w-12 h-12 text-slate-400"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-slate-800 mb-2">No Activities Found</h3>
                    <p class="text-slate-600">No activities match the selected filters</p>
                </div>
                
            </div>
        </main>
        
        <!-- Footer -->
        @include('partials.footer')
        
        <!-- Back to Top -->
        @include('partials.back-to-top')
    </div>
    
    <!-- Initialize Feather Icons -->
    <script>
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
    
    <!-- Shared Scripts -->
    @include('partials.shared-scripts')
</body>
</html>
