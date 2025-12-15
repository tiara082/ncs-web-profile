<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <title>Research Publications | NCS Lab</title>
    <meta name="description" content="Research publications and academic papers from the Network & Cyber Security Lab"/>
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
                    },
                    fontFamily: {
                        sans: ['Poppins', 'sans-serif']
                    }
                }
            }
        }
    </script>
</head>
<body class="font-sans antialiased bg-slate-50">
    @include('partials.scroll-progress')
    @include('partials.sub-header')

    <!-- Main Content -->
    <main class="py-20 px-4 sm:px-6 lg:px-8">
        <div class="max-w-7xl mx-auto">
            <!-- Stats Bar -->
            <div class="mb-12 grid grid-cols-2 md:grid-cols-4 gap-6">
                <div class="bg-gradient-to-br from-primary/10 to-primary/5 rounded-2xl p-6 border border-primary/20">
                    <div class="flex items-center gap-4">
                        <div class="w-12 h-12 bg-primary/20 rounded-xl flex items-center justify-center">
                            <i data-feather="book" class="text-primary" width="24" height="24"></i>
                        </div>
                        <div>
                            <div class="text-3xl font-bold text-slate-900">{{ count($publications) }}</div>
                            <p class="text-sm text-slate-600">Total Publications</p>
                        </div>
                    </div>
                </div>
                <div class="bg-gradient-to-br from-secondary/10 to-secondary/5 rounded-2xl p-6 border border-secondary/20">
                    <div class="flex items-center gap-4">
                        <div class="w-12 h-12 bg-secondary/20 rounded-xl flex items-center justify-center">
                            <i data-feather="users" class="text-secondary" width="24" height="24"></i>
                        </div>
                        <div>
                            <div class="text-3xl font-bold text-slate-900">{{ count(array_unique(array_column($publications, 'author_name'))) }}</div>
                            <p class="text-sm text-slate-600">Authors</p>
                        </div>
                    </div>
                </div>
                <div class="bg-gradient-to-br from-accent/10 to-accent/5 rounded-2xl p-6 border border-accent/20">
                    <div class="flex items-center gap-4">
                        <div class="w-12 h-12 bg-accent/20 rounded-xl flex items-center justify-center">
                            <i data-feather="calendar" class="text-accent" width="24" height="24"></i>
                        </div>
                        <div>
                            <div class="text-3xl font-bold text-slate-900">{{ count(array_filter($publications, fn($p) => $p['year'] == '2024')) }}</div>
                            <p class="text-sm text-slate-600">This Year</p>
                        </div>
                    </div>
                </div>
                <div class="bg-gradient-to-br from-primary/10 to-secondary/10 rounded-2xl p-6 border border-primary/20">
                    <div class="flex items-center gap-4">
                        <div class="w-12 h-12 bg-gradient-to-br from-primary/20 to-secondary/20 rounded-xl flex items-center justify-center">
                            <i data-feather="award" class="text-primary" width="24" height="24"></i>
                        </div>
                        <div>
                            <div class="text-3xl font-bold text-slate-900">{{ count(array_unique(array_column($publications, 'publication'))) }}</div>
                            <p class="text-sm text-slate-600">Journals</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="flex flex-col lg:flex-row gap-8">
                <!-- Sidebar Filter -->
                <aside class="lg:w-80 flex-shrink-0">
                    <div class="sticky top-24 space-y-4">
                        <!-- Search Box -->
                        <div class="bg-white rounded-2xl shadow-sm border border-slate-200 p-5 hover:shadow-md transition-shadow">
                            <label class="text-sm font-semibold text-slate-700 mb-3 flex items-center gap-2">
                                <i data-feather="search" class="text-primary" width="18" height="18"></i>
                                Search Publications
                            </label>
                            <div class="relative">
                                <input type="text" id="searchInput" placeholder="Type title, author, or keyword..." class="w-full pl-10 pr-10 py-2.5 text-sm border border-slate-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary/50 focus:border-primary transition-all" onkeyup="filterPublications()">
                                <i data-feather="search" class="absolute left-3 top-1/2 -translate-y-1/2 text-slate-400" width="16" height="16"></i>
                                <button id="clearSearch" class="hidden absolute right-3 top-1/2 -translate-y-1/2 text-slate-400 hover:text-slate-600" onclick="document.getElementById('searchInput').value=''; filterPublications(); this.classList.add('hidden')">
                                    <i data-feather="x" width="16" height="16"></i>
                                </button>
                            </div>
                        </div>

                        <!-- Quick Filters -->
                        <div class="bg-white rounded-2xl shadow-sm border border-slate-200 p-5 hover:shadow-md transition-shadow">
                            <label class="text-sm font-semibold text-slate-700 mb-3 flex items-center gap-2">
                                <i data-feather="zap" class="text-primary" width="18" height="18"></i>
                                Quick Filters
                            </label>
                            <div class="flex flex-wrap gap-2">
                                <button onclick="quickFilter('2024')" class="quick-filter-btn px-3 py-1.5 text-xs font-medium bg-slate-100 hover:bg-primary hover:text-white rounded-lg transition-all">
                                    Latest 2024
                                </button>
                                <button onclick="quickFilter('2023')" class="quick-filter-btn px-3 py-1.5 text-xs font-medium bg-slate-100 hover:bg-primary hover:text-white rounded-lg transition-all">
                                    2023
                                </button>
                                <button onclick="clearAllFilters()" class="quick-filter-btn px-3 py-1.5 text-xs font-medium bg-slate-100 hover:bg-red-500 hover:text-white rounded-lg transition-all">
                                    <i data-feather="x" width="12" height="12" class="inline"></i> Clear All
                                </button>
                            </div>
                        </div>

                        <!-- Filter by Year -->
                        <div class="bg-white rounded-2xl shadow-sm border border-slate-200 hover:shadow-md transition-shadow">
                            <button onclick="toggleSection('yearFilter')" class="w-full p-5 flex items-center justify-between text-left">
                                <span class="text-sm font-semibold text-slate-700 flex items-center gap-2">
                                    <i data-feather="calendar" class="text-primary" width="18" height="18"></i>
                                    Publication Year
                                </span>
                                <i data-feather="chevron-down" id="yearFilterIcon" class="text-slate-400 transition-transform" width="18" height="18"></i>
                            </button>
                            <div id="yearFilter" class="px-5 pb-5 space-y-2">
                                <label class="flex items-center justify-between p-2.5 cursor-pointer group hover:bg-slate-50 rounded-lg transition-colors">
                                    <div class="flex items-center gap-3">
                                        <input type="radio" name="year" value="all" checked onchange="filterPublications()" class="w-4 h-4 text-primary focus:ring-primary">
                                        <span class="text-sm text-slate-700 group-hover:text-primary transition-colors font-medium">All Years</span>
                                    </div>
                                    <span class="text-xs text-slate-500 bg-slate-100 px-2.5 py-1 rounded-full font-semibold">{{ count($publications) }}</span>
                                </label>
                                <label class="flex items-center justify-between p-2.5 cursor-pointer group hover:bg-slate-50 rounded-lg transition-colors">
                                    <div class="flex items-center gap-3">
                                        <input type="radio" name="year" value="2024" onchange="filterPublications()" class="w-4 h-4 text-primary focus:ring-primary">
                                        <span class="text-sm text-slate-700 group-hover:text-primary transition-colors">2024</span>
                                    </div>
                                    <span class="text-xs text-slate-500 bg-slate-100 px-2.5 py-1 rounded-full font-semibold">{{ count(array_filter($publications, fn($p) => $p['year'] == '2024')) }}</span>
                                </label>
                                <label class="flex items-center justify-between p-2.5 cursor-pointer group hover:bg-slate-50 rounded-lg transition-colors">
                                    <div class="flex items-center gap-3">
                                        <input type="radio" name="year" value="2023" onchange="filterPublications()" class="w-4 h-4 text-primary focus:ring-primary">
                                        <span class="text-sm text-slate-700 group-hover:text-primary transition-colors">2023</span>
                                    </div>
                                    <span class="text-xs text-slate-500 bg-slate-100 px-2.5 py-1 rounded-full font-semibold">{{ count(array_filter($publications, fn($p) => $p['year'] == '2023')) }}</span>
                                </label>
                                <label class="flex items-center justify-between p-2.5 cursor-pointer group hover:bg-slate-50 rounded-lg transition-colors">
                                    <div class="flex items-center gap-3">
                                        <input type="radio" name="year" value="2022" onchange="filterPublications()" class="w-4 h-4 text-primary focus:ring-primary">
                                        <span class="text-sm text-slate-700 group-hover:text-primary transition-colors">2022</span>
                                    </div>
                                    <span class="text-xs text-slate-500 bg-slate-100 px-2.5 py-1 rounded-full font-semibold">{{ count(array_filter($publications, fn($p) => $p['year'] == '2022')) }}</span>
                                </label>
                                <label class="flex items-center justify-between p-2.5 cursor-pointer group hover:bg-slate-50 rounded-lg transition-colors">
                                    <div class="flex items-center gap-3">
                                        <input type="radio" name="year" value="2021" onchange="filterPublications()" class="w-4 h-4 text-primary focus:ring-primary">
                                        <span class="text-sm text-slate-700 group-hover:text-primary transition-colors">2021</span>
                                    </div>
                                    <span class="text-xs text-slate-500 bg-slate-100 px-2.5 py-1 rounded-full font-semibold">{{ count(array_filter($publications, fn($p) => $p['year'] == '2021')) }}</span>
                                </label>
                            </div>
                        </div>

                        <!-- Filter by Author -->
                        <div class="bg-white rounded-2xl shadow-sm border border-slate-200 hover:shadow-md transition-shadow">
                            <button onclick="toggleSection('authorFilter')" class="w-full p-5 flex items-center justify-between text-left">
                                <span class="text-sm font-semibold text-slate-700 flex items-center gap-2">
                                    <i data-feather="users" class="text-primary" width="18" height="18"></i>
                                    Filter by Author
                                </span>
                                <i data-feather="chevron-down" id="authorFilterIcon" class="text-slate-400 transition-transform" width="18" height="18"></i>
                            </button>
                            <div id="authorFilter" class="px-5 pb-5 space-y-2 max-h-72 overflow-y-auto custom-scrollbar">
                                @foreach(array_unique(array_column($publications, 'author_name')) as $author)
                                <label class="flex items-center gap-3 p-2.5 cursor-pointer group hover:bg-slate-50 rounded-lg transition-colors">
                                    <input type="checkbox" value="{{ $author }}" onchange="filterPublications()" class="author-filter w-4 h-4 text-primary focus:ring-primary rounded">
                                    <span class="text-sm text-slate-700 group-hover:text-primary transition-colors">{{ explode(',', $author)[0] }}</span>
                                </label>
                                @endforeach
                            </div>
                        </div>

                        <!-- Active Filters -->
                        <div id="activeFilters" class="hidden bg-gradient-to-br from-primary/5 to-secondary/5 rounded-2xl p-5 border border-primary/20">
                            <div class="text-sm font-semibold text-slate-700 mb-3 flex items-center gap-2">
                                <i data-feather="check-circle" class="text-primary" width="16" height="16"></i>
                                Active Filters
                            </div>
                            <div id="activeFiltersList" class="space-y-2"></div>
                        </div>
                    </div>
                </aside>

                <!-- Publications List -->
                <div class="flex-1">
                    <!-- Toolbar -->
                    <div class="mb-6 bg-white rounded-2xl shadow-sm border border-slate-200 p-4">
                        <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4">
                            <div class="flex items-center gap-3">
                                <div class="flex items-center gap-2 text-slate-600">
                                    <i data-feather="file-text" class="text-primary" width="18" height="18"></i>
                                    <span class="text-sm">Showing <span id="resultCount" class="font-bold text-slate-900">{{ count($publications) }}</span> of <span class="font-bold text-slate-900">{{ count($publications) }}</span></span>
                                </div>
                            </div>
                            <div class="flex items-center gap-3">
                                <label class="text-sm text-slate-600 flex items-center gap-2">
                                    <i data-feather="sliders" width="16" height="16"></i>
                                    Sort:
                                </label>
                                <select id="sortSelect" onchange="sortPublications()" class="px-3 py-2 text-sm border border-slate-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary/50 focus:border-primary bg-white">
                                    <option value="year-desc">Newest First</option>
                                    <option value="year-asc">Oldest First</option>
                                    <option value="title-asc">Title A-Z</option>
                                    <option value="title-desc">Title Z-A</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div id="publicationsList" class="space-y-6">
                        @foreach($publications as $pub)
                        <article class="publication-card bg-white rounded-2xl shadow-sm border border-slate-200 hover:shadow-lg hover:border-primary/30 transition-all duration-300 group overflow-hidden" 
                                 data-year="{{ $pub['year'] }}" 
                                 data-author="{{ $pub['author_name'] }}"
                                 data-title="{{ strtolower($pub['title']) }}">
                            <!-- Colored Top Border -->
                            <div class="h-1 bg-gradient-to-r from-primary to-secondary"></div>
                            
                            <div class="p-6">
                                <div class="flex items-start gap-5">
                                    <!-- Journal Cover Thumbnail -->
                                    <div class="flex-shrink-0">
                                        <div class="relative w-24 h-32 bg-gradient-to-br from-slate-100 to-slate-200 rounded-lg overflow-hidden shadow-md group-hover:shadow-xl transition-all">
                                            <img src="{{ $pub['cover'] }}" 
                                                 alt="{{ $pub['title'] }} Cover" 
                                                 class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300"
                                                 onerror="this.src='https://images.unsplash.com/photo-1550751827-4bd374c3f58b?w=400&q=80'"/>
                                            <!-- Year Badge Overlay -->
                                            <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black/80 to-transparent p-2">
                                                <span class="text-white text-xs font-bold">{{ $pub['year'] }}</span>
                                            </div>
                                            <!-- PDF Badge -->
                                            <div class="absolute top-2 right-2 bg-red-500 text-white text-[10px] font-bold px-1.5 py-0.5 rounded">
                                                PDF
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Content -->
                                    <div class="flex-1 min-w-0">
                                        <!-- Author -->
                                        <div class="flex items-center gap-3 mb-3">
                                            <img src="{{ $pub['author_photo'] }}" alt="{{ $pub['author_name'] }}" class="w-10 h-10 rounded-full object-cover border-2 border-primary/20 group-hover:border-primary/40 transition-all"/>
                                            <div>
                                                <p class="text-sm font-semibold text-slate-900">{{ $pub['author_name'] }}</p>
                                                <p class="text-xs text-slate-500">{{ $pub['author_position'] }}</p>
                                            </div>
                                            <div class="ml-auto flex items-center gap-1 text-xs text-slate-500">
                                                <i data-feather="calendar" width="14" height="14"></i>
                                                <span>{{ $pub['year'] }}</span>
                                            </div>
                                        </div>

                                        <!-- Title -->
                                        <h3 class="text-lg font-bold text-slate-900 mb-2 group-hover:text-primary transition-colors leading-snug">
                                            {{ $pub['title'] }}
                                        </h3>

                                        <!-- Publication Details -->
                                        <div class="flex items-start gap-2 mb-4 bg-slate-50 rounded-lg p-3">
                                            <i data-feather="book-open" class="text-primary flex-shrink-0 mt-0.5" width="16" height="16"></i>
                                            <div class="flex-1">
                                                <p class="text-sm text-slate-600 leading-relaxed">{{ $pub['publication'] }}</p>
                                                @if(!empty($pub['issn_journal']))
                                                <p class="text-xs text-slate-500 mt-1">ISSN: {{ $pub['issn_journal'] }}</p>
                                                @endif
                                            </div>
                                        </div>

                                        <!-- Keywords -->
                                        @if(!empty($pub['keywords']))
                                        <div class="mb-4">
                                            <div class="flex items-center gap-2 mb-2">
                                                <i data-feather="tag" class="text-primary" width="16" height="16"></i>
                                                <span class="text-xs font-semibold text-slate-700 uppercase tracking-wide">Keywords</span>
                                            </div>
                                            <div class="flex flex-wrap gap-1.5">
                                                @php
                                                    $keywords = explode(',', $pub['keywords']);
                                                    foreach($keywords as $keyword) {
                                                        $keyword = trim($keyword);
                                                        if(!empty($keyword)) {
                                                            echo '<span class="inline-flex items-center px-2 py-1 bg-primary/10 text-primary text-xs font-medium rounded-full border border-primary/20">' . e($keyword) . '</span>';
                                                        }
                                                    }
                                                @endphp
                                            </div>
                                        </div>
                                        @endif

                                        <!-- DOI -->
                                        @if(!empty($pub['doi']))
                                        <div class="mb-4">
                                            <div class="flex items-center gap-2 bg-blue-50 rounded-lg p-3 border border-blue-200">
                                                <i data-feather="link" class="text-blue-600 flex-shrink-0" width="16" height="16"></i>
                                                <div class="flex-1 min-w-0">
                                                    <p class="text-xs font-semibold text-blue-900 uppercase tracking-wide">DOI</p>
                                                    <a href="https://doi.org/{{ $pub['doi'] }}" target="_blank" class="text-sm text-blue-700 hover:text-blue-900 break-all">
                                                        https://doi.org/{{ $pub['doi'] }}
                                                    </a>
                                                </div>
                                                <button onclick="copyToClipboard('https://doi.org/{{ $pub['doi'] }}')" class="flex-shrink-0 p-1.5 text-blue-600 hover:bg-blue-100 rounded transition-colors" title="Copy DOI">
                                                    <i data-feather="copy" width="14" height="14"></i>
                                                </button>
                                            </div>
                                        </div>
                                        @endif

                                        <!-- Actions -->
                                        <div class="flex items-center gap-2 flex-wrap">
                                            @if($pub['file_path'])
                                            <a href="{{ $pub['file_path'] }}" target="_blank" class="inline-flex items-center gap-2 px-4 py-2 bg-gradient-to-r from-primary to-secondary text-white rounded-lg text-sm font-medium hover:shadow-lg hover:scale-105 transition-all">
                                                <i data-feather="eye" width="16" height="16"></i>
                                                View Paper
                                            </a>
                                            <a href="{{ $pub['file_path'] }}" download class="inline-flex items-center gap-2 px-3 py-2 bg-slate-100 text-slate-700 rounded-lg text-sm font-medium hover:bg-slate-200 transition-all" title="Download PDF">
                                                <i data-feather="download" width="16" height="16"></i>
                                                Download
                                            </a>
                                            <button onclick="sharePublication('{{ $pub['title'] }}', '{{ $pub['file_path'] }}')" class="inline-flex items-center gap-2 px-3 py-2 bg-slate-100 text-slate-700 rounded-lg text-sm font-medium hover:bg-slate-200 transition-all" title="Share">
                                                <i data-feather="share-2" width="16" height="16"></i>
                                            </button>
                                            @else
                                            <span class="text-sm text-slate-500 italic">No file available</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </article>
                        @endforeach
                    </div>

                    <!-- No Results Message -->
                    <div id="noResults" class="hidden bg-white rounded-2xl border-2 border-dashed border-slate-200 p-12 text-center">
                        <div class="inline-flex items-center justify-center w-20 h-20 bg-slate-100 rounded-full mb-6">
                            <i data-feather="search" class="text-slate-400" width="40" height="40"></i>
                        </div>
                        <h3 class="text-xl font-bold text-slate-900 mb-2">No publications found</h3>
                        <p class="text-slate-600 mb-6">Try adjusting your filters or search terms</p>
                        <button onclick="clearAllFilters()" class="inline-flex items-center gap-2 px-4 py-2 bg-primary text-white rounded-lg text-sm font-medium hover:shadow-lg transition-all">
                            <i data-feather="refresh-cw" width="16" height="16"></i>
                            Clear All Filters
                        </button>
                    </div>

                    <!-- Loading State -->
                    <div id="loadingState" class="hidden space-y-6">
                        @for($i = 0; $i < 3; $i++)
                        <div class="bg-white rounded-2xl p-6 shadow-sm border border-slate-200 animate-pulse">
                            <div class="flex items-start gap-5">
                                <div class="w-14 h-14 bg-slate-200 rounded-xl"></div>
                                <div class="flex-1 space-y-3">
                                    <div class="h-4 bg-slate-200 rounded w-3/4"></div>
                                    <div class="h-3 bg-slate-200 rounded w-1/2"></div>
                                    <div class="h-3 bg-slate-200 rounded w-full"></div>
                                </div>
                            </div>
                        </div>
                        @endfor
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- Share Modal -->
    <div id="shareModal" class="fixed inset-0 bg-black/50 backdrop-blur-sm z-50 hidden items-center justify-center p-4">
        <div class="bg-white rounded-2xl shadow-2xl max-w-md w-full transform transition-all" onclick="event.stopPropagation()">
            <div class="p-6 border-b border-slate-200">
                <div class="flex items-center justify-between">
                    <h3 class="text-xl font-bold text-slate-900 flex items-center gap-2">
                        <i data-feather="share-2" class="text-primary" width="24" height="24"></i>
                        Share Publication
                    </h3>
                    <button onclick="closeShareModal()" class="text-slate-400 hover:text-slate-600 transition-colors">
                        <i data-feather="x" width="24" height="24"></i>
                    </button>
                </div>
            </div>
            <div class="p-6 space-y-4">
                <div>
                    <label class="text-sm font-semibold text-slate-700 mb-2 block">Publication Title</label>
                    <p id="shareTitle" class="text-sm text-slate-600 bg-slate-50 p-3 rounded-lg"></p>
                </div>
                <div>
                    <label class="text-sm font-semibold text-slate-700 mb-2 block">Share Link</label>
                    <div class="flex items-center gap-2">
                        <input type="text" id="shareLink" readonly class="flex-1 px-3 py-2 text-sm border border-slate-200 rounded-lg bg-slate-50 focus:outline-none focus:ring-2 focus:ring-primary/50">
                        <button onclick="copyShareLink()" class="px-4 py-2 bg-primary text-white rounded-lg text-sm font-medium hover:bg-primary/90 transition-all flex items-center gap-2">
                            <i data-feather="copy" width="16" height="16"></i>
                            Copy
                        </button>
                    </div>
                    <p id="copyFeedback" class="text-xs text-green-600 mt-2 hidden flex items-center gap-1">
                        <i data-feather="check-circle" width="14" height="14"></i>
                        Link copied to clipboard!
                    </p>
                </div>
                <div class="pt-4 border-t border-slate-200">
                    <p class="text-xs text-slate-500 mb-3">Share via:</p>
                    <div class="grid grid-cols-4 gap-2">
                        <button onclick="shareVia('email')" class="flex flex-col items-center gap-2 p-3 bg-slate-50 hover:bg-slate-100 rounded-lg transition-all group">
                            <i data-feather="mail" class="text-slate-600 group-hover:text-primary" width="20" height="20"></i>
                            <span class="text-xs text-slate-600">Email</span>
                        </button>
                        <button onclick="shareVia('whatsapp')" class="flex flex-col items-center gap-2 p-3 bg-slate-50 hover:bg-slate-100 rounded-lg transition-all group">
                            <svg class="w-5 h-5 text-slate-600 group-hover:text-green-500" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
                            <span class="text-xs text-slate-600">WhatsApp</span>
                        </button>
                        <button onclick="shareVia('twitter')" class="flex flex-col items-center gap-2 p-3 bg-slate-50 hover:bg-slate-100 rounded-lg transition-all group">
                            <svg class="w-5 h-5 text-slate-600 group-hover:text-blue-400" fill="currentColor" viewBox="0 0 24 24"><path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z"/></svg>
                            <span class="text-xs text-slate-600">Twitter</span>
                        </button>
                        <button onclick="shareVia('linkedin')" class="flex flex-col items-center gap-2 p-3 bg-slate-50 hover:bg-slate-100 rounded-lg transition-all group">
                            <svg class="w-5 h-5 text-slate-600 group-hover:text-blue-600" fill="currentColor" viewBox="0 0 24 24"><path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/></svg>
                            <span class="text-xs text-slate-600">LinkedIn</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('partials.footer')
    @include('partials.back-to-top')
    @include('partials.shared-scripts')

    <style>
        .custom-scrollbar::-webkit-scrollbar { width: 6px; }
        .custom-scrollbar::-webkit-scrollbar-track { background: #f1f5f9; border-radius: 10px; }
        .custom-scrollbar::-webkit-scrollbar-thumb { background: #cbd5e1; border-radius: 10px; }
        .custom-scrollbar::-webkit-scrollbar-thumb:hover { background: #94a3b8; }
    </style>

    <script>
        // Initialize Feather Icons
        feather.replace();

        // Search input clear button
        document.getElementById('searchInput').addEventListener('input', function() {
            const clearBtn = document.getElementById('clearSearch');
            if (this.value.length > 0) {
                clearBtn.classList.remove('hidden');
            } else {
                clearBtn.classList.add('hidden');
            }
        });

        // Toggle collapsible sections
        function toggleSection(sectionId) {
            const section = document.getElementById(sectionId);
            const icon = document.getElementById(sectionId + 'Icon');
            section.classList.toggle('hidden');
            icon.style.transform = section.classList.contains('hidden') ? 'rotate(0deg)' : 'rotate(180deg)';
        }

        // Quick filter buttons
        function quickFilter(year) {
            document.querySelector(`input[name="year"][value="${year}"]`).checked = true;
            filterPublications();
        }

        // Clear all filters
        function clearAllFilters() {
            document.getElementById('searchInput').value = '';
            document.getElementById('clearSearch').classList.add('hidden');
            document.querySelector('input[name="year"][value="all"]').checked = true;
            document.querySelectorAll('.author-filter').forEach(cb => cb.checked = false);
            filterPublications();
        }

        // Filter and Search Publications with animation
        function filterPublications() {
            const cards = document.querySelectorAll('.publication-card');
            const searchInput = document.getElementById('searchInput').value.toLowerCase();
            const selectedYear = document.querySelector('input[name="year"]:checked').value;
            const selectedAuthors = Array.from(document.querySelectorAll('.author-filter:checked')).map(cb => cb.value);
            
            let visibleCount = 0;
            const totalCount = cards.length;
            
            cards.forEach((card, index) => {
                const year = card.getAttribute('data-year');
                const author = card.getAttribute('data-author');
                const title = card.getAttribute('data-title');
                
                const matchesYear = selectedYear === 'all' || year === selectedYear;
                const matchesAuthor = selectedAuthors.length === 0 || selectedAuthors.includes(author);
                const matchesSearch = searchInput === '' || title.includes(searchInput) || author.toLowerCase().includes(searchInput);
                
                if (matchesYear && matchesAuthor && matchesSearch) {
                    setTimeout(() => {
                        card.style.display = 'block';
                        card.style.animation = 'fade-in-up 0.3s ease-out forwards';
                    }, index * 30);
                    visibleCount++;
                } else {
                    card.style.display = 'none';
                }
            });
            
            // Update result count
            document.getElementById('resultCount').textContent = visibleCount;
            
            // Show/hide no results message
            document.getElementById('noResults').classList.toggle('hidden', visibleCount > 0);
            
            // Update active filters display
            updateActiveFilters(selectedYear, selectedAuthors, searchInput);
            
            // Reinitialize icons
            setTimeout(() => feather.replace(), 100);
        }

        // Update active filters display
        function updateActiveFilters(year, authors, search) {
            const container = document.getElementById('activeFilters');
            const list = document.getElementById('activeFiltersList');
            list.innerHTML = '';
            
            let hasFilters = false;
            
            if (year !== 'all') {
                hasFilters = true;
                list.innerHTML += `
                    <div class="flex items-center justify-between p-2 bg-white rounded-lg">
                        <span class="text-xs text-slate-600">Year: <strong>${year}</strong></span>
                        <button onclick="document.querySelector('input[name=year][value=all]').checked=true; filterPublications()" class="text-slate-400 hover:text-red-500">
                            <i data-feather="x" width="14" height="14"></i>
                        </button>
                    </div>
                `;
            }
            
            if (authors.length > 0) {
                hasFilters = true;
                authors.forEach(author => {
                    const shortName = author.split(',')[0];
                    list.innerHTML += `
                        <div class="flex items-center justify-between p-2 bg-white rounded-lg">
                            <span class="text-xs text-slate-600">Author: <strong>${shortName}</strong></span>
                            <button onclick="document.querySelector('.author-filter[value=\\'${author}\\']').checked=false; filterPublications()" class="text-slate-400 hover:text-red-500">
                                <i data-feather="x" width="14" height="14"></i>
                            </button>
                        </div>
                    `;
                });
            }
            
            if (search) {
                hasFilters = true;
                list.innerHTML += `
                    <div class="flex items-center justify-between p-2 bg-white rounded-lg">
                        <span class="text-xs text-slate-600">Search: <strong>${search}</strong></span>
                        <button onclick="document.getElementById('searchInput').value=''; document.getElementById('clearSearch').classList.add('hidden'); filterPublications()" class="text-slate-400 hover:text-red-500">
                            <i data-feather="x" width="14" height="14"></i>
                        </button>
                    </div>
                `;
            }
            
            container.classList.toggle('hidden', !hasFilters);
            feather.replace();
        }

        // Sort Publications
        function sortPublications() {
            const sortValue = document.getElementById('sortSelect').value;
            const container = document.getElementById('publicationsList');
            const cards = Array.from(document.querySelectorAll('.publication-card'));
            
            cards.sort((a, b) => {
                if (sortValue === 'year-desc') {
                    return parseInt(b.getAttribute('data-year')) - parseInt(a.getAttribute('data-year'));
                } else if (sortValue === 'year-asc') {
                    return parseInt(a.getAttribute('data-year')) - parseInt(b.getAttribute('data-year'));
                } else if (sortValue === 'title-asc') {
                    return a.getAttribute('data-title').localeCompare(b.getAttribute('data-title'));
                } else if (sortValue === 'title-desc') {
                    return b.getAttribute('data-title').localeCompare(a.getAttribute('data-title'));
                }
                return 0; // Default case
            });
            
            cards.forEach(card => container.appendChild(card));
            feather.replace();
        }



        // Share Publication Functions
        let currentShareTitle = '';
        let currentShareLink = '';

        function sharePublication(title, fileUrl) {
            currentShareTitle = title;
            currentShareLink = fileUrl;
            
            document.getElementById('shareTitle').textContent = title;
            document.getElementById('shareLink').value = fileUrl;
            document.getElementById('copyFeedback').classList.add('hidden');
            
            const modal = document.getElementById('shareModal');
            modal.classList.remove('hidden');
            modal.classList.add('flex');
            
            // Reinitialize feather icons in modal
            setTimeout(() => feather.replace(), 50);
        }

        function closeShareModal() {
            const modal = document.getElementById('shareModal');
            modal.classList.add('hidden');
            modal.classList.remove('flex');
        }

        // Close modal when clicking outside
        document.getElementById('shareModal').addEventListener('click', function(e) {
            if (e.target === this) {
                closeShareModal();
            }
        });

        // Close modal with Escape key
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                closeShareModal();
            }
        });

        function copyShareLink() {
            const linkInput = document.getElementById('shareLink');
            linkInput.select();
            linkInput.setSelectionRange(0, 99999); // For mobile devices
            
            // Copy to clipboard
            navigator.clipboard.writeText(linkInput.value).then(() => {
                // Show success feedback
                const feedback = document.getElementById('copyFeedback');
                feedback.classList.remove('hidden');
                feather.replace();
                
                // Hide feedback after 3 seconds
                setTimeout(() => {
                    feedback.classList.add('hidden');
                }, 3000);
            }).catch(err => {
                console.error('Failed to copy:', err);
                alert('Failed to copy link. Please copy manually.');
            });
        }

        function shareVia(platform) {
            const title = encodeURIComponent(currentShareTitle);
            const url = encodeURIComponent(currentShareLink);
            let shareUrl = '';
            
            switch(platform) {
                case 'email':
                    shareUrl = `mailto:?subject=${title}&body=Check out this research publication: ${url}`;
                    break;
                case 'whatsapp':
                    shareUrl = `https://wa.me/?text=${title} - ${url}`;
                    break;
                case 'twitter':
                    shareUrl = `https://twitter.com/intent/tweet?text=${title}&url=${url}`;
                    break;
                case 'linkedin':
                    shareUrl = `https://www.linkedin.com/sharing/share-offsite/?url=${url}`;
                    break;
            }
            
            if (shareUrl) {
                window.open(shareUrl, '_blank', 'width=600,height=400');
            }
        }
    </script>
</body>
</html>
