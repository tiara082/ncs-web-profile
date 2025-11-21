<!-- Hero Section (Organization/Logo) - Shorter -->
<section class="relative pt-32 pb-16 px-4 sm:px-6 lg:px-8 overflow-hidden">
    <!-- Background Video/Image -->
    <div class="absolute inset-0 z-0">
        <img src="https://images.unsplash.com/photo-1639322537228-f710d846310a?q=80&w=2000" alt="Cybersecurity Background" class="w-full h-full object-cover"/>
        <div class="absolute inset-0 bg-gradient-to-br from-slate-900/90 via-blue-950/85 to-indigo-950/90"></div>
    </div>
    <!-- Animated Grid Pattern -->
    <div class="absolute inset-0 z-0 opacity-10">
        <div class="absolute inset-0 bg-[linear-gradient(rgba(255,255,255,0.05)_1px,transparent_1px),linear-gradient(90deg,rgba(255,255,255,0.05)_1px,transparent_1px)] bg-[size:64px_64px]"></div>
    </div>
    <div class="max-w-7xl mx-auto relative z-10 text-center">
        <div class="animate-fade-in-up">
            @php
                $currentPath = request()->path();
                $isLogoPage = $currentPath === 'logo';
            @endphp
            
            @if($isLogoPage)
                <h1 class="text-4xl md:text-5xl font-bold text-white mb-4">
                    Logo
                </h1>
                <p class="text-lg text-white/80 max-w-2xl mx-auto">
                    Official logos and branding assets of Politeknik Negeri Malang and Jurusan Teknologi Informasi
                </p>
            @else
                <h1 class="text-4xl md:text-5xl font-bold text-white mb-4">
                    Organization Structure
                </h1>
                <p class="text-lg text-white/80 max-w-2xl mx-auto">
                    Network & Cyber Security Laboratory organizational hierarchy and team structure
                </p>
            @endif
        </div>
    </div>
</section>
