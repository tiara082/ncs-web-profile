<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>{{ $article['title'] }} - Network & Cyber Security Lab</title>
    <meta name="description" content="{{ $article['excerpt'] }}"/>
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
    <style>
        .article-content h2 {
            font-size: 2rem;
            font-weight: 700;
            margin-top: 2.5rem;
            margin-bottom: 1.25rem;
            color: #0a0a0a;
        }
        .article-content h3 {
            font-size: 1.5rem;
            font-weight: 600;
            margin-top: 2rem;
            margin-bottom: 1rem;
            color: #0a0a0a;
        }
        .article-content p {
            margin-bottom: 1.5rem;
            line-height: 1.8;
            color: #4a5568;
        }
        .article-content ul, .article-content ol {
            margin-bottom: 1.5rem;
            padding-left: 1.5rem;
        }
        .article-content li {
            margin-bottom: 0.5rem;
            line-height: 1.8;
            color: #4a5568;
        }
        .article-content blockquote {
            border-left: 4px solid #66bbf2;
            padding-left: 1.5rem;
            margin: 2rem 0;
            font-style: italic;
            color: #64748b;
        }
        .article-content code {
            background: #f1f5f9;
            padding: 0.2rem 0.4rem;
            border-radius: 0.25rem;
            font-size: 0.875rem;
            color: #222f7f;
        }
        .article-content pre {
            background: #1e293b;
            color: #e2e8f0;
            padding: 1.5rem;
            border-radius: 0.5rem;
            overflow-x: auto;
            margin: 1.5rem 0;
        }
        .article-content img {
            border-radius: 0.75rem;
            margin: 2rem 0;
        }
    </style>
</head>
<body class="bg-background text-foreground">
    @include('partials.scroll-progress')
    
    <!-- Navigation -->
    @include('partials.navbar')

    <!-- Article Header -->
    <article class="relative pt-32 pb-16 px-4 sm:px-6 lg:px-8">
        <div class="max-w-4xl mx-auto">
            <!-- Breadcrumb -->
            <nav class="flex items-center gap-2 text-sm text-muted-foreground mb-8">
                <a href="/" class="hover:text-primary transition-colors">Home</a>
                <i data-feather="chevron-right" class="w-4 h-4"></i>
                <a href="/articles" class="hover:text-primary transition-colors">Articles</a>
                <i data-feather="chevron-right" class="w-4 h-4"></i>
                <span class="text-foreground">{{ $article['title'] }}</span>
            </nav>

            <!-- Category Badge -->
            <div class="mb-6">
                <span class="inline-block px-4 py-2 bg-primary/10 text-primary text-sm font-bold rounded-full">
                    {{ $article['category'] }}
                </span>
            </div>

            <!-- Title -->
            <h1 class="text-4xl md:text-5xl font-bold text-foreground mb-6 leading-tight">
                {{ $article['title'] }}
            </h1>

            <!-- Meta Info -->
            <div class="flex flex-wrap items-center gap-6 mb-8 pb-8 border-b border-border">
                <div class="flex items-center gap-3">
                    <img src="{{ $article['author_photo'] }}" alt="{{ $article['author'] }}" class="w-12 h-12 rounded-full object-cover border-2 border-primary/20"/>
                    <div>
                        <div class="font-semibold text-foreground">{{ $article['author'] }}</div>
                        <div class="text-sm text-muted-foreground">{{ $article['author_position'] }}</div>
                    </div>
                </div>
                <div class="flex items-center gap-6 text-sm text-muted-foreground">
                    <div class="flex items-center gap-2">
                        <i data-feather="calendar" class="w-4 h-4"></i>
                        <span>{{ $article['date'] }}</span>
                    </div>
                    <div class="flex items-center gap-2">
                        <i data-feather="clock" class="w-4 h-4"></i>
                        <span>{{ $article['read_time'] }}</span>
                    </div>
                </div>
            </div>

            <!-- Featured Image -->
            <div class="mb-12 rounded-2xl overflow-hidden">
                <img src="{{ $article['image'] }}" alt="{{ $article['title'] }}" class="w-full h-auto object-cover"/>
            </div>

            <!-- Article Content -->
            <div class="article-content prose prose-lg max-w-none">
                {!! $article['content'] !!}
            </div>

            <!-- Tags -->
            @if(isset($article['tags']) && count($article['tags']) > 0)
            <div class="mt-12 pt-8 border-t border-border">
                <h3 class="text-sm font-semibold text-muted-foreground uppercase tracking-wide mb-4">Tags</h3>
                <div class="flex flex-wrap gap-2">
                    @foreach($article['tags'] as $tag)
                    <a href="#" class="px-3 py-1.5 bg-muted text-foreground text-sm rounded-lg hover:bg-primary hover:text-white transition-colors">
                        {{ $tag }}
                    </a>
                    @endforeach
                </div>
            </div>
            @endif

            <!-- Share Section -->
            <div class="mt-12 pt-8 border-t border-border">
                <h3 class="text-sm font-semibold text-muted-foreground uppercase tracking-wide mb-4">Share This Article</h3>
                <div class="flex gap-3">
                    <a href="#" class="w-10 h-10 bg-primary/10 text-primary rounded-lg flex items-center justify-center hover:bg-primary hover:text-white transition-colors">
                        <i data-feather="twitter" class="w-5 h-5"></i>
                    </a>
                    <a href="#" class="w-10 h-10 bg-primary/10 text-primary rounded-lg flex items-center justify-center hover:bg-primary hover:text-white transition-colors">
                        <i data-feather="linkedin" class="w-5 h-5"></i>
                    </a>
                    <a href="#" class="w-10 h-10 bg-primary/10 text-primary rounded-lg flex items-center justify-center hover:bg-primary hover:text-white transition-colors">
                        <i data-feather="facebook" class="w-5 h-5"></i>
                    </a>
                    <a href="#" class="w-10 h-10 bg-primary/10 text-primary rounded-lg flex items-center justify-center hover:bg-primary hover:text-white transition-colors">
                        <i data-feather="link" class="w-5 h-5"></i>
                    </a>
                </div>
            </div>

            <!-- Author Bio -->
            <div class="mt-12 p-8 bg-gradient-to-br from-cyan-50/50 to-blue-50/50 rounded-2xl border border-border">
                <h3 class="text-sm font-semibold text-muted-foreground uppercase tracking-wide mb-4">About the Author</h3>
                <div class="flex items-start gap-4">
                    <img src="{{ $article['author_photo'] }}" alt="{{ $article['author'] }}" class="w-20 h-20 rounded-full object-cover border-2 border-primary/20"/>
                    <div class="flex-1">
                        <h4 class="text-xl font-bold text-foreground mb-1">{{ $article['author'] }}</h4>
                        <p class="text-sm text-primary font-semibold mb-3">{{ $article['author_position'] }}</p>
                        <p class="text-sm text-muted-foreground leading-relaxed">
                            {{ $article['author_bio'] ?? 'Expert in cybersecurity research and network security at Politeknik Negeri Malang.' }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </article>

    <!-- Related Articles -->
    @if(isset($relatedArticles) && count($relatedArticles) > 0)
    <section class="py-16 px-4 sm:px-6 lg:px-8 bg-gradient-to-br from-background via-cyan-50/30 to-blue-50/20">
        <div class="max-w-7xl mx-auto">
            <h2 class="text-3xl font-bold text-foreground mb-8">Related Articles</h2>
            <div class="grid md:grid-cols-3 gap-6">
                @foreach($relatedArticles as $related)
                <a href="/article/{{ $related['slug'] }}" class="group bg-white rounded-2xl border-2 border-border hover:border-primary/50 transition-all duration-300 overflow-hidden hover:shadow-xl hover:-translate-y-2">
                    <div class="relative h-48 overflow-hidden">
                        <img src="{{ $related['image'] }}" alt="{{ $related['title'] }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500"/>
                        <div class="absolute top-3 left-3">
                            <span class="px-3 py-1 bg-white/90 backdrop-blur-sm text-primary text-xs font-bold rounded-full">{{ $related['category'] }}</span>
                        </div>
                    </div>
                    <div class="p-6">
                        <div class="flex items-center gap-2 mb-3 text-xs text-muted-foreground">
                            <i data-feather="clock" class="w-3 h-3"></i>
                            <span>{{ $related['read_time'] }}</span>
                        </div>
                        <h3 class="text-lg font-bold text-foreground mb-2 group-hover:text-primary transition-colors line-clamp-2">
                            {{ $related['title'] }}
                        </h3>
                        <p class="text-sm text-muted-foreground line-clamp-2">
                            {{ $related['excerpt'] }}
                        </p>
                    </div>
                </a>
                @endforeach
            </div>
        </div>
    </section>
    @endif

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
