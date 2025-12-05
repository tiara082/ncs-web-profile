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
                @forelse($activities as $activity)
                <!-- Activity -->
                <div class="group relative overflow-hidden rounded-2xl border-2 border-gray-200 hover:border-primary/50 transition-all duration-300 hover:shadow-2xl hover:shadow-primary/20 hover-lift bg-white">
                    <div class="aspect-video bg-gradient-to-br from-slate-100 to-slate-50">
                        <img src="{{ asset('storage/' . $activity->file_path) }}" alt="{{ $activity->title }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500" loading="lazy"/>
                    </div>
                    <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/40 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex flex-col items-start justify-end p-6">
                        @if($activity->event_date)
                        <span class="text-primary text-xs font-bold mb-2">{{ $activity->event_date->format('F Y') }}</span>
                        @endif
                        <h3 class="text-white font-bold text-lg mb-1">{{ $activity->title }}</h3>
                        <p class="text-white/80 text-sm">{{ Str::limit($activity->description, 60) }}</p>
                    </div>
                </div>
                @empty
                <div class="col-span-full text-center py-12">
                    <i data-feather="image" class="w-16 h-16 mx-auto text-gray-300 mb-4"></i>
                    <p class="text-gray-500 text-lg">No past activities to display</p>
                </div>
                @endforelse
            </div>
        </div>
    </section>
    
    @include('partials.footer')
    @include('partials.back-to-top')
    @include('partials.shared-scripts')
</body>
</html>
