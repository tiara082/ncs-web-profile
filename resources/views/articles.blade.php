<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Articles - Network & Cyber Security Lab</title>
    <meta name="description" content="Expert insights and educational content on cybersecurity topics from Network and Cyber Security Laboratory"/>
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
                }
            }
        }
    </script>
</head>
<body class="bg-background text-foreground">
    @include('partials.scroll-progress')
    
    <!-- Navigation -->
    @include('partials.navbar')

    <!-- Hero Section -->
    <section class="relative pt-32 pb-16 px-4 sm:px-6 lg:px-8 overflow-hidden">
        <!-- Background -->
        <div class="absolute inset-0 z-0">
            <img src="https://images.unsplash.com/photo-1504639725590-34d0984388bd?q=80&w=2000" alt="Articles Background" class="w-full h-full object-cover"/>
            <div class="absolute inset-0 bg-gradient-to-br from-slate-900/90 via-blue-950/85 to-indigo-950/90"></div>
        </div>
        <!-- Grid Pattern -->
        <div class="absolute inset-0 z-0 opacity-10">
            <div class="absolute inset-0 bg-[linear-gradient(rgba(255,255,255,0.05)_1px,transparent_1px),linear-gradient(90deg,rgba(255,255,255,0.05)_1px,transparent_1px)] bg-[size:64px_64px]"></div>
        </div>
        <div class="max-w-7xl mx-auto relative z-10 text-center">
            <div class="animate-fade-in-up">
                <div class="inline-flex items-center gap-2 mb-6 text-primary font-bold">
                    <div class="h-1 w-8 bg-primary rounded-full"></div>
                    <span class="text-sm uppercase tracking-widest">Knowledge Hub</span>
                </div>
                <h1 class="text-4xl md:text-6xl font-bold text-white mb-6">
                    Cybersecurity Articles
                </h1>
                <p class="text-lg md:text-xl text-white/80 max-w-3xl mx-auto mb-8">
                    Expert insights, best practices, and educational content on network security and cybersecurity
                </p>
            </div>
        </div>
    </section>

    <!-- Filters Section -->
    <section class="relative py-8 px-4 sm:px-6 lg:px-8 bg-gradient-to-br from-background via-cyan-50/30 to-blue-50/20">
        <div class="max-w-7xl mx-auto">
            <div class="flex flex-wrap gap-3 items-center justify-center">
                <button class="px-4 py-2 bg-primary text-white font-semibold rounded-lg hover:bg-secondary transition-colors">
                    All Articles
                </button>
                <button class="px-4 py-2 bg-white text-foreground font-semibold rounded-lg border border-border hover:border-primary hover:text-primary transition-colors">
                    Best Practices
                </button>
                <button class="px-4 py-2 bg-white text-foreground font-semibold rounded-lg border border-border hover:border-primary hover:text-primary transition-colors">
                    Strategy
                </button>
                <button class="px-4 py-2 bg-white text-foreground font-semibold rounded-lg border border-border hover:border-primary hover:text-primary transition-colors">
                    Incident Response
                </button>
                <button class="px-4 py-2 bg-white text-foreground font-semibold rounded-lg border border-border hover:border-primary hover:text-primary transition-colors">
                    Threats
                </button>
                <button class="px-4 py-2 bg-white text-foreground font-semibold rounded-lg border border-border hover:border-primary hover:text-primary transition-colors">
                    Security Tools
                </button>
            </div>
        </div>
    </section>

    <!-- Articles Grid -->
    <section class="relative py-16 px-4 sm:px-6 lg:px-8 bg-gradient-to-br from-background via-cyan-50/30 to-blue-50/20">
        <div class="max-w-7xl mx-auto">
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($articles as $article)
                <!-- Article Card -->
                <div class="group bg-white rounded-2xl border-2 border-border hover:border-primary/50 transition-all duration-300 overflow-hidden hover:shadow-xl hover:-translate-y-2">
                    <div class="relative h-56 overflow-hidden">
                        <img src="{{ $article['image'] }}" alt="{{ $article['title'] }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500"/>
                        <div class="absolute top-4 left-4">
                            <span class="px-3 py-1.5 bg-white/90 backdrop-blur-sm text-primary text-xs font-bold rounded-full">{{ $article['category'] }}</span>
                        </div>
                    </div>
                    <div class="p-6 flex flex-col">
                        <div class="flex items-center gap-4 mb-4 text-xs text-muted-foreground">
                            <div class="flex items-center gap-1.5">
                                <i data-feather="clock" class="w-3.5 h-3.5"></i>
                                <span>{{ $article['read_time'] }}</span>
                            </div>
                            <div class="flex items-center gap-1.5">
                                <i data-feather="calendar" class="w-3.5 h-3.5"></i>
                                <span>{{ $article['date'] }}</span>
                            </div>
                        </div>
                        <h3 class="text-xl font-bold text-foreground mb-3 group-hover:text-primary transition-colors line-clamp-2">
                            {{ $article['title'] }}
                        </h3>
                        <p class="text-sm text-muted-foreground mb-4 line-clamp-3 flex-grow">
                            {{ $article['excerpt'] }}
                        </p>
                        <div class="flex items-center justify-between pt-4 border-t border-border mt-auto">
                            <div class="flex items-center gap-3">
                                <img src="{{ $article['author_photo'] }}" alt="{{ $article['author'] }}" class="w-10 h-10 rounded-full object-cover border-2 border-primary/20"/>
                                <div>
                                    <div class="font-semibold text-sm text-foreground">{{ $article['author'] }}</div>
                                    <div class="text-xs text-muted-foreground">{{ $article['author_position'] }}</div>
                                </div>
                            </div>
                            <a href="/article/{{ $article['slug'] }}" class="text-primary font-bold text-sm group-hover:translate-x-1 transition-transform inline-flex items-center">
                                Read <i data-feather="arrow-right" class="w-4 h-4 ml-1"></i>
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            <!-- Pagination -->
            <div class="mt-16 flex justify-center">
                <div class="flex items-center gap-2">
                    <button class="px-4 py-2 bg-white border-2 border-border rounded-lg font-semibold text-muted-foreground hover:border-primary hover:text-primary transition-colors">
                        <i data-feather="chevron-left" class="w-5 h-5"></i>
                    </button>
                    <button class="px-4 py-2 bg-primary text-white border-2 border-primary rounded-lg font-semibold">1</button>
                    <button class="px-4 py-2 bg-white border-2 border-border rounded-lg font-semibold text-foreground hover:border-primary hover:text-primary transition-colors">2</button>
                    <button class="px-4 py-2 bg-white border-2 border-border rounded-lg font-semibold text-foreground hover:border-primary hover:text-primary transition-colors">3</button>
                    <button class="px-4 py-2 bg-white border-2 border-border rounded-lg font-semibold text-muted-foreground">...</button>
                    <button class="px-4 py-2 bg-white border-2 border-border rounded-lg font-semibold text-foreground hover:border-primary hover:text-primary transition-colors">10</button>
                    <button class="px-4 py-2 bg-white border-2 border-border rounded-lg font-semibold text-muted-foreground hover:border-primary hover:text-primary transition-colors">
                        <i data-feather="chevron-right" class="w-5 h-5"></i>
                    </button>
                </div>
            </div>
        </div>
    </section>

    <!-- Newsletter Section -->
    <section class="relative py-20 px-4 sm:px-6 lg:px-8 bg-gradient-to-br from-slate-900 via-blue-950 to-indigo-950 overflow-hidden">
        <div class="absolute top-0 left-0 w-96 h-96 bg-primary/10 rounded-full blur-3xl"></div>
        <div class="absolute bottom-0 right-0 w-96 h-96 bg-blue-500/10 rounded-full blur-3xl"></div>
        
        <div class="max-w-4xl mx-auto relative z-10 text-center">
            <div class="inline-flex items-center justify-center w-16 h-16 bg-primary/20 rounded-2xl mb-6">
                <i data-feather="mail" class="text-primary" width="32" height="32"></i>
            </div>
            <h2 class="text-3xl md:text-4xl font-bold text-white mb-4">
                Subscribe to Our Newsletter
            </h2>
            <p class="text-lg text-white/70 mb-8 max-w-2xl mx-auto">
                Stay updated with the latest cybersecurity insights, research findings, and industry trends directly in your inbox
            </p>
            <form class="flex flex-col sm:flex-row gap-3 max-w-xl mx-auto">
                <input type="email" placeholder="Enter your email address" class="flex-1 px-6 py-4 rounded-xl border-2 border-white/20 bg-white/10 backdrop-blur-sm text-white placeholder-white/60 focus:outline-none focus:border-primary transition-colors"/>
                <button type="submit" class="px-8 py-4 bg-primary text-white font-bold rounded-xl hover:bg-secondary transition-colors whitespace-nowrap">
                    Subscribe Now
                </button>
            </form>
            <p class="text-xs text-white/50 mt-4">
                We respect your privacy. Unsubscribe at any time.
            </p>
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
