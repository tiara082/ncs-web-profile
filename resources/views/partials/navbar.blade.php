<!-- Navbar Partial (shared navigation + mobile menu) -->
<nav id="main-navbar" class="sticky top-0 z-[100] bg-white shadow-sm transition-all duration-300 border-b border-border">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-50">
        <div class="flex justify-between items-center h-16">
            <!-- Logo & Branding -->
            <a href="/" class="flex items-center gap-2 sm:gap-3">
                <div class="flex items-center gap-1.5 sm:gap-2">
                    <div class="relative group">
                        <img src="{{ asset('img/polinema.png') }}" alt="Polinema Logo" class="w-8 h-8 sm:w-10 sm:h-10 object-contain hover:scale-105 transition-transform mix-blend-multiply"/>
                    </div>
                    <div class="relative group">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/6/64/Jti_polinema.svg/328px-Jti_polinema.svg.png?20240606144137" alt="JTI Logo" class="w-8 h-8 sm:w-10 sm:h-10 object-contain hover:scale-105 transition-transform mix-blend-multiply"/>
                    </div>
                    <!-- Logo NCS di tengah -->
                    <div class="hidden md:block w-px h-8 bg-gradient-to-b from-transparent via-primary/40 to-transparent"></div>
                    <div class="hidden md:block relative group">
                        <img src="{{ asset('img/logo.png') }}" alt="NCS Lab Logo" class="w-10 h-10 object-contain hover:scale-105 transition-transform"/>
                    </div>
                </div>
                <div class="hidden lg:block border-l-2 border-primary/30 pl-3">
                    <p class="text-base font-bold bg-gradient-to-r from-primary to-secondary bg-clip-text text-transparent leading-tight drop-shadow-sm">Network & Cyber Security Lab</p>
                    <p class="text-[11px] text-foreground/80 leading-tight drop-shadow-sm">Politeknik Negeri Malang</p>
                </div>
            </a>
            
            <!-- Desktop Menu -->
            <div class="hidden md:flex items-center gap-6">
                <!-- 1. HOME -->
                <a href="/" class="text-sm font-semibold text-foreground hover:text-primary transition-colors px-3 py-2 rounded-lg hover:bg-primary/5">
                    Home
                </a>
                
                <!-- 2. PROFILE -->
                <div class="relative group">
                    <button class="text-sm font-semibold text-foreground hover:text-primary transition-colors px-3 py-2 rounded-lg hover:bg-primary/5 flex items-center gap-1">
                        Profile
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m6 9 6 6 6-6"></path></svg>
                    </button>
                    <div class="absolute left-0 mt-2 w-56 bg-white border border-border rounded-xl shadow-xl opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200 py-2">
                        <a href="/vision-mission" class="block px-4 py-2.5 text-sm text-foreground hover:text-primary hover:bg-primary/5 transition-colors">Vision & Mission</a>
                        <a href="/profile" class="block px-4 py-2.5 text-sm text-foreground hover:text-primary hover:bg-primary/5 transition-colors">Laboratory Profile</a>
                        <a href="/logo" class="block px-4 py-2.5 text-sm text-foreground hover:text-primary hover:bg-primary/5 transition-colors">Logo</a>
                        <a href="/organization" class="block px-4 py-2.5 text-sm text-foreground hover:text-primary hover:bg-primary/5 transition-colors">Organization</a>
                    </div>
                </div>
                
                <!-- 3. GALLERY -->
                <div class="relative group">
                    <button class="text-sm font-semibold text-foreground hover:text-primary transition-colors px-3 py-2 rounded-lg hover:bg-primary/5 flex items-center gap-1">
                        Gallery
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m6 9 6 6 6-6"></path></svg>
                    </button>
                    <div class="absolute left-0 mt-2 w-48 bg-white border border-border rounded-xl shadow-xl opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200 py-2">
                        <a href="/agenda" class="block px-4 py-2.5 text-sm text-foreground hover:text-primary hover:bg-primary/5 transition-colors">Agenda</a>
                        <a href="/activities" class="block px-4 py-2.5 text-sm text-foreground hover:text-primary hover:bg-primary/5 transition-colors">Past Activities</a>
                    </div>
                </div>
                
                <!-- 4. ARCHIVE -->
                <div class="relative group">
                    <button class="text-sm font-semibold text-foreground hover:text-primary transition-colors px-3 py-2 rounded-lg hover:bg-primary/5 flex items-center gap-1">
                        Archive
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m6 9 6 6 6-6"></path></svg>
                    </button>
                    <div class="absolute left-0 mt-2 w-56 bg-white border border-border rounded-xl shadow-xl opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200 py-2">
                        <a href="/research-documents" class="block px-4 py-2.5 text-sm text-foreground hover:text-primary hover:bg-primary/5 transition-colors">Research Documents</a>
                        <a href="/community-service" class="block px-4 py-2.5 text-sm text-foreground hover:text-primary hover:bg-primary/5 transition-colors">Community Service</a>
                    </div>
                </div>
                
                <!-- 5. SERVICES -->
                <div class="relative group">
                    <button class="text-sm font-semibold text-foreground hover:text-primary transition-colors px-3 py-2 rounded-lg hover:bg-primary/5 flex items-center gap-1">
                        Services
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m6 9 6 6 6-6"></path></svg>
                    </button>
                    <div class="absolute left-0 mt-2 w-64 bg-white border border-border rounded-xl shadow-xl opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200 py-2">
                        <a href="/infrastructure" class="block px-4 py-2.5 text-sm text-foreground hover:text-primary hover:bg-primary/5 transition-colors">Infrastructure & Facilities</a>
                        <a href="/consulting" class="block px-4 py-2.5 text-sm text-foreground hover:text-primary hover:bg-primary/5 transition-colors">Consulting Services</a>
                    </div>
                </div>
                
                <!-- 6. LINKS -->
                <a href="#footer" onclick="event.preventDefault(); document.querySelector('#footer').scrollIntoView({behavior: 'smooth'});" class="text-sm font-semibold text-foreground hover:text-primary transition-colors px-3 py-2 rounded-lg hover:bg-primary/5">
                    Links
                </a>
            </div>
            
            <!-- Mobile Menu Button -->
            <button id="mobile-menu-btn" class="md:hidden inline-flex items-center justify-center p-2 rounded-lg hover:bg-primary/10 transition-colors relative z-50" aria-label="Toggle navigation">
                <svg id="menu-icon" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-6 w-6 text-foreground">
                    <line x1="4" x2="20" y1="12" y2="12"></line>
                    <line x1="4" x2="20" y1="6" y2="6"></line>
                    <line x1="4" x2="20" y1="18" y2="18"></line>
                </svg>
                <svg id="close-icon" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-6 w-6 hidden text-foreground">
                    <line x1="18" x2="6" y1="6" y2="18"></line>
                    <line x1="6" x2="18" y1="6" y2="18"></line>
                </svg>
                <span class="sr-only">Toggle navigation</span>
            </button>
        </div>
    </div>
    <!-- Mobile Menu Overlay -->
    <!-- Mobile Menu -->
    <nav id="mobile-menu" class="mobile-menu fixed top-0 right-0 h-full w-[86vw] max-w-[340px] bg-white rounded-l-[32px] border border-white/30 shadow-[0_30px_80px_-35px_rgba(15,23,42,0.65)] z-[110] md:hidden flex flex-col overflow-hidden">
        <!-- Header -->
        <div class="px-6 pt-6 pb-5 bg-gradient-to-r from-[#4DA2FF] via-[#347CE1] to-[#1D2F8F] flex items-center justify-between">
            <div class="flex items-center gap-3">
                <div class="w-11 h-11 rounded-2xl bg-white flex items-center justify-center shadow-sm">
                    <img src="{{ asset('img/logo.png') }}" alt="NCS Lab Logo" class="w-9 h-9"/>
                </div>
                <div class="leading-tight">
                    <p class="text-white text-base font-semibold">NCS Lab</p>
                    <p class="text-white/85 text-[11px] uppercase tracking-[0.28em]">Menu</p>
                </div>
            </div>
            <button id="mobile-menu-close" class="w-10 h-10 flex items-center justify-center rounded-full bg-white/15 hover:bg-white/25 transition" aria-label="Close navigation">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                    <line x1="18" x2="6" y1="6" y2="18"></line>
                    <line x1="6" x2="18" y1="6" y2="18"></line>
                </svg>
            </button>
        </div>

        <!-- Content -->
        <div class="flex-1 bg-white px-6 py-7 overflow-y-auto">
            <a href="/" class="flex items-center gap-4 px-5 py-4 rounded-2xl bg-slate-100 text-slate-900 font-semibold border border-white shadow-[0_25px_45px_-35px_rgba(30,64,175,0.9)]">
                <span class="w-9 h-9 rounded-xl bg-gradient-to-br from-[#6EC5FF] to-[#2A7CFF] text-white flex items-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="m3 9 9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                        <polyline points="9 22 9 12 15 12 15 22"></polyline>
                    </svg>
                </span>
                Home
            </a>

            <div class="mt-7 space-y-6 text-sm text-slate-600">
                <div>
                    <div class="flex items-center gap-2 text-[11px] font-semibold uppercase tracking-[0.32em] text-slate-500 mb-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" class="text-slate-400">
                            <path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2"></path>
                            <circle cx="12" cy="7" r="4"></circle>
                        </svg>
                        Profile
                    </div>
                    <ul class="space-y-2 pl-5">
                        <li>
                            <a href="/vision-mission" class="flex items-center gap-3 text-slate-600 hover:text-primary transition">
                                <span class="inline-flex w-2 h-2 rounded-full bg-[#2D8DFF]"></span>
                                <span>Vision &amp; Mission</span>
                            </a>
                        </li>
                        <li>
                            <a href="/profile" class="flex items-center gap-3 text-slate-600 hover:text-primary transition">
                                <span class="inline-flex w-2 h-2 rounded-full bg-[#2D8DFF]"></span>
                                <span>Laboratory Profile</span>
                            </a>
                        </li>
                        <li>
                            <a href="/logo" class="flex items-center gap-3 text-slate-600 hover:text-primary transition">
                                <span class="inline-flex w-2 h-2 rounded-full bg-[#2D8DFF]"></span>
                                <span>Logo</span>
                            </a>
                        </li>
                        <li>
                            <a href="/organization" class="flex items-center gap-3 text-slate-600 hover:text-primary transition">
                                <span class="inline-flex w-2 h-2 rounded-full bg-[#2D8DFF]"></span>
                                <span>Organizational Structure</span>
                            </a>
                        </li>
                    </ul>
                </div>

                <div>
                    <div class="flex items-center gap-2 text-[11px] font-semibold uppercase tracking-[0.32em] text-slate-500 mb-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" class="text-slate-400">
                            <rect width="18" height="18" x="3" y="3" rx="2" ry="2"></rect>
                            <circle cx="9" cy="9" r="2"></circle>
                            <path d="m21 15-3.086-3.086a2 2 0 0 0-2.828 0L6 21"></path>
                        </svg>
                        Gallery
                    </div>
                    <ul class="space-y-2 pl-5">
                        <li>
                            <a href="/agenda" class="flex items-center gap-3 text-slate-600 hover:text-primary transition">
                                <span class="inline-flex w-2 h-2 rounded-full bg-[#2D8DFF]"></span>
                                <span>Agenda</span>
                            </a>
                        </li>
                        <li>
                            <a href="/activities" class="flex items-center gap-3 text-slate-600 hover:text-primary transition">
                                <span class="inline-flex w-2 h-2 rounded-full bg-[#2D8DFF]"></span>
                                <span>Past Activities</span>
                            </a>
                        </li>
                    </ul>
                </div>

                <div>
                    <div class="flex items-center gap-2 text-[11px] font-semibold uppercase tracking-[0.32em] text-slate-500 mb-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" class="text-slate-400">
                            <rect width="20" height="5" x="2" y="3" rx="1"></rect>
                            <path d="M4 8v11a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8"></path>
                            <path d="M10 12h4"></path>
                        </svg>
                        Archive
                    </div>
                    <ul class="space-y-2 pl-5">
                        <li>
                            <a href="/research-documents" class="flex items-center gap-3 text-slate-600 hover:text-primary transition">
                                <span class="inline-flex w-2 h-2 rounded-full bg-[#2D8DFF]"></span>
                                <span>Research Documents</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Footer -->
        <div class="px-6 py-6 bg-gradient-to-r from-[#1C2E90] to-[#152060] text-center text-white text-[11px] leading-relaxed">
            <p class="text-white/85 uppercase tracking-[0.24em]">Network &amp; Cyber Security Lab</p>
            <p class="text-white font-semibold text-sm">Politeknik Negeri Malang</p>
        </div>
    </nav>
</nav>

