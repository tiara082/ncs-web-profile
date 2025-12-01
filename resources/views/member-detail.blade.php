<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $member['name'] ?? 'Member' }} - NCS Lab</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/feather-icons"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    
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
                        sans: ['Poppins', 'sans-serif'],
                    },
                }
            }
        }
    </script>
    
    <style>
        .member-card {
            background: linear-gradient(135deg, rgba(102, 187, 242, 0.05) 0%, rgba(34, 47, 127, 0.05) 100%);
            border: 1px solid rgba(102, 187, 242, 0.2);
            transition: all 0.3s ease;
        }
        
        .member-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 12px 28px rgba(102, 187, 242, 0.15);
        }
        
        .section-title {
            background: linear-gradient(90deg, #222f7f 0%, #66bbf2 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
    </style>
</head>
<body class="font-sans antialiased bg-gradient-to-br from-gray-50 to-blue-50">
    <!-- Include Shared Components -->
    @include('partials.scroll-progress')
    @include('partials.navbar')
    @include('partials.custom-scrollbar-styles')
    
    <!-- Member Detail Content -->
    <main class="pt-20 pb-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
            <!-- Back Button -->
            <a href="/organization" class="inline-flex items-center gap-2 text-secondary hover:text-primary transition-colors mb-8 group">
                <i data-feather="arrow-left" class="w-5 h-5 group-hover:-translate-x-1 transition-transform"></i>
                <span class="font-semibold">Back to Organization</span>
            </a>
            
            <div class="grid lg:grid-cols-3 gap-8">
                <!-- Left Sidebar - Member Card -->
                <div class="lg:col-span-1">
                    <div class="member-card rounded-2xl p-6 sticky top-24">
                        <!-- Profile Photo -->
                        <div class="relative mb-6">
                            <div class="w-full aspect-square rounded-2xl overflow-hidden bg-gradient-to-br from-primary to-secondary">
                                @if(isset($member['photo']))
                                    <img src="{{ asset($member['photo']) }}" alt="{{ $member['name'] }}" class="w-full h-full object-cover">
                                @else
                                    <div class="w-full h-full flex items-center justify-center">
                                        <i data-feather="user" class="w-24 h-24 text-white"></i>
                                    </div>
                                @endif
                            </div>
                        </div>
                        
                        <!-- Member Info -->
                        <div class="text-center mb-6">
                            <h1 class="text-2xl font-bold text-secondary mb-2">{{ $member['name'] ?? 'Member Name' }}</h1>
                            <p class="text-primary font-semibold mb-1">{{ $member['position'] ?? 'Position' }}</p>
                            <p class="text-gray-600 text-sm">{{ $member['nim'] ?? 'NIM' }}</p>
                        </div>
                        
                        <!-- Contact Info -->
                        <div class="space-y-3 border-t pt-4">
                            @if(isset($member['email']))
                            <div class="flex items-center gap-3 text-sm">
                                <div class="w-8 h-8 rounded-lg bg-primary/10 flex items-center justify-center flex-shrink-0">
                                    <i data-feather="mail" class="w-4 h-4 text-primary"></i>
                                </div>
                                <a href="mailto:{{ $member['email'] }}" class="text-gray-700 hover:text-primary transition-colors break-all">
                                    {{ $member['email'] }}
                                </a>
                            </div>
                            @endif
                            
                            @if(isset($member['phone']))
                            <div class="flex items-center gap-3 text-sm">
                                <div class="w-8 h-8 rounded-lg bg-primary/10 flex items-center justify-center flex-shrink-0">
                                    <i data-feather="phone" class="w-4 h-4 text-primary"></i>
                                </div>
                                <a href="tel:{{ $member['phone'] }}" class="text-gray-700 hover:text-primary transition-colors">
                                    {{ $member['phone'] }}
                                </a>
                            </div>
                            @endif
                            
                            @if(isset($member['linkedin']))
                            <div class="flex items-center gap-3 text-sm">
                                <div class="w-8 h-8 rounded-lg bg-primary/10 flex items-center justify-center flex-shrink-0">
                                    <i data-feather="linkedin" class="w-4 h-4 text-primary"></i>
                                </div>
                                <a href="{{ $member['linkedin'] }}" target="_blank" class="text-gray-700 hover:text-primary transition-colors">
                                    LinkedIn Profile
                                </a>
                            </div>
                            @endif
                            
                            @if(isset($member['github']))
                            <div class="flex items-center gap-3 text-sm">
                                <div class="w-8 h-8 rounded-lg bg-primary/10 flex items-center justify-center flex-shrink-0">
                                    <i data-feather="github" class="w-4 h-4 text-primary"></i>
                                </div>
                                <a href="{{ $member['github'] }}" target="_blank" class="text-gray-700 hover:text-primary transition-colors">
                                    GitHub Profile
                                </a>
                            </div>
                            @endif
                        </div>
                        
                        <!-- Skills/Expertise -->
                        @if(isset($member['skills']))
                        <div class="mt-6 pt-4 border-t">
                            <h3 class="font-semibold text-secondary mb-3 text-sm uppercase tracking-wide">Expertise</h3>
                            <div class="flex flex-wrap gap-2">
                                @foreach($member['skills'] as $skill)
                                <span class="px-3 py-1 bg-gradient-to-r from-primary/10 to-secondary/10 text-secondary text-xs font-medium rounded-full border border-primary/20">
                                    {{ $skill }}
                                </span>
                                @endforeach
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
                
                <!-- Right Content -->
                <div class="lg:col-span-2 space-y-8">
                    <!-- Biography Section -->
                    <section class="bg-white rounded-2xl p-8 shadow-sm border border-gray-100">
                        <h2 class="text-2xl font-bold section-title mb-6">
                            <i data-feather="user" class="w-6 h-6 inline-block mr-2 text-primary"></i>
                            Biography
                        </h2>
                        <div class="prose prose-lg max-w-none text-gray-700 leading-relaxed">
                            {!! $member['biography'] ?? '<p>Biography information will be available soon.</p>' !!}
                        </div>
                    </section>
                    
                    <!-- Education Section -->
                    @if(isset($member['education']))
                    <section class="bg-white rounded-2xl p-8 shadow-sm border border-gray-100">
                        <h2 class="text-2xl font-bold section-title mb-6">
                            <i data-feather="book" class="w-6 h-6 inline-block mr-2 text-primary"></i>
                            Education
                        </h2>
                        <div class="space-y-6">
                            @foreach($member['education'] as $edu)
                            <div class="relative pl-8 border-l-2 border-primary/30">
                                <div class="absolute -left-2 top-0 w-4 h-4 rounded-full bg-primary"></div>
                                <h3 class="font-bold text-secondary text-lg">{{ $edu['degree'] }}</h3>
                                <p class="text-primary font-semibold">{{ $edu['institution'] }}</p>
                                <p class="text-gray-600 text-sm">{{ $edu['year'] }}</p>
                            </div>
                            @endforeach
                        </div>
                    </section>
                    @endif
                    
                    <!-- Research & Publications -->
                    @if(isset($member['research']))
                    <section class="bg-white rounded-2xl p-8 shadow-sm border border-gray-100">
                        <h2 class="text-2xl font-bold section-title mb-6">
                            <i data-feather="file-text" class="w-6 h-6 inline-block mr-2 text-primary"></i>
                            Research & Publications
                        </h2>
                        <div class="space-y-4">
                            @foreach($member['research'] as $research)
                            <div class="p-4 bg-gradient-to-r from-gray-50 to-blue-50 rounded-xl border border-gray-200 hover:border-primary transition-colors">
                                <h3 class="font-semibold text-secondary mb-2">{{ $research['title'] }}</h3>
                                <p class="text-sm text-gray-600 mb-2">{{ $research['publication'] ?? '' }}</p>
                                <p class="text-xs text-gray-500">{{ $research['year'] ?? '' }}</p>
                            </div>
                            @endforeach
                        </div>
                    </section>
                    @endif
                    
                    <!-- Projects -->
                    @if(isset($member['projects']))
                    <section class="bg-white rounded-2xl p-8 shadow-sm border border-gray-100">
                        <h2 class="text-2xl font-bold section-title mb-6">
                            <i data-feather="code" class="w-6 h-6 inline-block mr-2 text-primary"></i>
                            Projects
                        </h2>
                        <div class="grid md:grid-cols-2 gap-4">
                            @foreach($member['projects'] as $project)
                            <div class="member-card rounded-xl p-5">
                                <h3 class="font-bold text-secondary mb-2">{{ $project['name'] }}</h3>
                                <p class="text-sm text-gray-600 mb-3">{{ $project['description'] }}</p>
                                @if(isset($project['link']))
                                <a href="{{ $project['link'] }}" target="_blank" class="text-primary text-sm font-semibold hover:underline inline-flex items-center gap-1">
                                    View Project
                                    <i data-feather="external-link" class="w-3 h-3"></i>
                                </a>
                                @endif
                            </div>
                            @endforeach
                        </div>
                    </section>
                    @endif
                </div>
            </div>
        </div>
    </main>
    
    @include('partials.footer')
    @include('partials.back-to-top')
    @include('partials.shared-scripts')
    
    <script>
        // Initialize Feather Icons
        feather.replace();
    </script>
</body>
</html>
