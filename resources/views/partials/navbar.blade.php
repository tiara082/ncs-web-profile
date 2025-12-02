<!-- Navbar Partial (shared navigation + mobile menu) -->
<nav id="main-navbar" class="sticky top-0 z-[90] bg-white shadow-sm transition-all duration-300 border-b border-border">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-16">
            <!-- Logo & Branding -->
            <a href="/" class="flex items-center gap-3">
                <div class="flex items-center gap-2">
                    <div class="relative group">
                        <img src="{{ asset('img/polinema.png') }}" alt="Polinema Logo" class="w-10 h-10 object-contain hover:scale-105 transition-transform mix-blend-multiply"/>
                    </div>
                    <div class="relative group">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/6/64/Jti_polinema.svg/328px-Jti_polinema.svg.png?20240606144137" alt="JTI Logo" class="w-10 h-10 object-contain hover:scale-105 transition-transform mix-blend-multiply"/>
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
            <button id="mobile-menu-btn" class="md:hidden inline-flex items-center justify-center p-2 rounded-lg hover:bg-primary/10 transition-colors">
                <svg id="menu-icon" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-6 w-6">
                    <line x1="4" x2="20" y1="12" y2="12"></line>
                    <line x1="4" x2="20" y1="6" y2="6"></line>
                    <line x1="4" x2="20" y1="18" y2="18"></line>
                </svg>
                <svg id="close-icon" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-6 w-6 hidden">
                    <line x1="18" x2="6" y1="6" y2="18"></line>
                    <line x1="6" x2="18" y1="6" y2="18"></line>
                </svg>
            </button>
        </div>
    </div>
    <!-- Mobile Menu Overlay -->
    <div id="mobile-menu-overlay" class="mobile-menu-overlay fixed inset-0 bg-black/50 backdrop-blur-sm z-[95] md:hidden"></div>
    
    <!-- Mobile Menu -->
    <div id="mobile-menu" class="mobile-menu fixed top-0 right-0 w-80 h-full bg-gradient-to-br from-[#66bbf2] via-[#4a9fd8] to-[#222f7f] shadow-2xl z-[98] md:hidden overflow-y-auto">
        <!-- Mobile Menu Header -->
        <div class="sticky top-0 bg-white/10 backdrop-blur-sm p-4 flex items-center justify-between border-b border-white/20">
            <div class="flex items-center gap-2">
                <div class="w-10 h-10 bg-white rounded-lg flex items-center justify-center shadow-lg">
                    <img src="{{ asset('img/polinema.png') }}" alt="Logo" class="w-8 h-8"/>
                </div>
                <div>
                    <h3 class="text-white font-bold text-sm">NCS Lab</h3>
                    <p class="text-white/90 text-xs">Menu</p>
                </div>
            </div>
            <button id="mobile-menu-close" class="w-8 h-8 flex items-center justify-center rounded-full bg-white/20 hover:bg-white/30 transition-colors">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <line x1="18" x2="6" y1="6" y2="18"></line>
                    <line x1="6" x2="18" y1="6" y2="18"></line>
                </svg>
            </button>
        </div>

        <!-- Mobile Menu Content -->
        <div class="p-5 space-y-3">
            <!-- Home -->
            <a href="/" class="flex items-center gap-3 px-4 py-3.5 rounded-xl bg-white/15 hover:bg-white/25 text-white transition-all group shadow-sm">
                <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="m3 9 9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                    <polyline points="9 22 9 12 15 12 15 22"></polyline>
                </svg>
                <span class="font-semibold text-[15px]">Home</span>
            </a>

            <!-- Profile Section -->
            <div class="space-y-2">
                <div class="flex items-center gap-2.5 px-3 py-2 text-[11px] font-extrabold text-white/80 uppercase tracking-wider">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2"></path>
                        <circle cx="12" cy="7" r="4"></circle>
                    </svg>
                    PROFILE
                </div>
                <div class="space-y-1 pl-3">
                    <a href="/vision-mission" class="flex items-center gap-3 px-4 py-2.5 rounded-lg hover:bg-white/15 text-white/90 hover:text-white transition-all text-[14px]">
                        <div class="w-1.5 h-1.5 rounded-full bg-white/70"></div>
                        Vision & Mission
                    </a>
                    <a href="/profile" class="flex items-center gap-3 px-4 py-2.5 rounded-lg hover:bg-white/15 text-white/90 hover:text-white transition-all text-[14px]">
                        <div class="w-1.5 h-1.5 rounded-full bg-white/70"></div>
                        Laboratory Profile
                    </a>
                    <a href="/logo" class="flex items-center gap-3 px-4 py-2.5 rounded-lg hover:bg-white/15 text-white/90 hover:text-white transition-all text-[14px]">
                        <div class="w-1.5 h-1.5 rounded-full bg-white/70"></div>
                        Logo
                    </a>
                    <a href="/organization" class="flex items-center gap-3 px-4 py-2.5 rounded-lg hover:bg-white/15 text-white/90 hover:text-white transition-all text-[14px]">
                        <div class="w-1.5 h-1.5 rounded-full bg-white/70"></div>
                        Organizational Structure
                    </a>
                </div>
            </div>

            <!-- Gallery Section -->
            <div class="space-y-2">
                <div class="flex items-center gap-2.5 px-3 py-2 text-[11px] font-extrabold text-white/80 uppercase tracking-wider">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                        <rect width="18" height="18" x="3" y="3" rx="2" ry="2"></rect>
                        <circle cx="9" cy="9" r="2"></circle>
                        <path d="m21 15-3.086-3.086a2 2 0 0 0-2.828 0L6 21"></path>
                    </svg>
                    GALLERY
                </div>
                <div class="space-y-1 pl-3">
                    <a href="/agenda" class="flex items-center gap-3 px-4 py-2.5 rounded-lg hover:bg-white/15 text-white/90 hover:text-white transition-all text-[14px]">
                        <div class="w-1.5 h-1.5 rounded-full bg-white/70"></div>
                        Agenda
                    </a>
                    <a href="/activities" class="flex items-center gap-3 px-4 py-2.5 rounded-lg hover:bg-white/15 text-white/90 hover:text-white transition-all text-[14px]">
                        <div class="w-1.5 h-1.5 rounded-full bg-white/70"></div>
                        Past Activities
                    </a>
                </div>
            </div>

            <!-- Archive Section -->
            <div class="space-y-2">
                <div class="flex items-center gap-2.5 px-3 py-2 text-[11px] font-extrabold text-white/80 uppercase tracking-wider">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                        <rect width="20" height="5" x="2" y="3" rx="1"></rect>
                        <path d="M4 8v11a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8"></path>
                        <path d="M10 12h4"></path>
                    </svg>
                    ARCHIVE
                </div>
                <div class="space-y-1 pl-3">
                    <a href="/research-documents" class="flex items-center gap-3 px-4 py-2.5 rounded-lg hover:bg-white/15 text-white/90 hover:text-white transition-all text-[14px]">
                        <div class="w-1.5 h-1.5 rounded-full bg-white/70"></div>
                        Research Documents
                    </a>
                    <a href="/community-service" class="flex items-center gap-3 px-4 py-2.5 rounded-lg hover:bg-white/15 text-white/90 hover:text-white transition-all text-[14px]">
                        <div class="w-1.5 h-1.5 rounded-full bg-white/70"></div>
                        Community Service
                    </a>
                </div>
            </div>

            <!-- Services Section -->
            <div class="space-y-2">
                <div class="flex items-center gap-2.5 px-3 py-2 text-[11px] font-extrabold text-white/80 uppercase tracking-wider">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M12.22 2h-.44a2 2 0 0 0-2 2v.18a2 2 0 0 1-1 1.73l-.43.25a2 2 0 0 1-2 0l-.15-.08a2 2 0 0 0-2.73.73l-.22.38a2 2 0 0 0 .73 2.73l.15.1a2 2 0 0 1 1 1.72v.51a2 2 0 0 1-1 1.74l-.15.09a2 2 0 0 0-.73 2.73l.22.38a2 2 0 0 0 2.73.73l.15-.08a2 2 0 0 1 2 0l.43.25a2 2 0 0 1 1 1.73V20a2 2 0 0 0 2 2h.44a2 2 0 0 0 2-2v-.18a2 2 0 0 1 1-1.73l.43-.25a2 2 0 0 1 2 0l.15.08a2 2 0 0 0 2.73-.73l.22-.39a2 2 0 0 0-.73-2.73l-.15-.08a2 2 0 0 1-1-1.74v-.5a2 2 0 0 1 1-1.74l.15-.09a2 2 0 0 0 .73-2.73l-.22-.38a2 2 0 0 0-2.73-.73l-.15.08a2 2 0 0 1-2 0l-.43-.25a2 2 0 0 1-1-1.73V4a2 2 0 0 0-2-2z"></path>
                        <circle cx="12" cy="12" r="3"></circle>
                    </svg>
                    SERVICES
                </div>
                <div class="space-y-1 pl-3">
                    <a href="/infrastructure" class="flex items-center gap-3 px-4 py-2.5 rounded-lg hover:bg-white/15 text-white/90 hover:text-white transition-all text-[14px]">
                        <div class="w-1.5 h-1.5 rounded-full bg-white/70"></div>
                        Infrastructure & Facilities
                    </a>
                    <a href="/consulting" class="flex items-center gap-3 px-4 py-2.5 rounded-lg hover:bg-white/15 text-white/90 hover:text-white transition-all text-[14px]">
                        <div class="w-1.5 h-1.5 rounded-full bg-white/70"></div>
                        Consulting Services
                    </a>
                    <a href="/certification" class="flex items-center gap-3 px-4 py-2.5 rounded-lg hover:bg-white/15 text-white/90 hover:text-white transition-all text-[14px]">
                        <div class="w-1.5 h-1.5 rounded-full bg-white/70"></div>
                        Training & Certification
                    </a>
                </div>
            </div>

            <!-- Links -->
            <a href="#footer" onclick="event.preventDefault(); document.querySelector('#footer').scrollIntoView({behavior: 'smooth'});" class="flex items-center gap-3 px-4 py-3.5 rounded-xl bg-white/15 hover:bg-white/25 text-white transition-all group shadow-sm">
                <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M10 13a5 5 0 0 0 7.54.54l3-3a5 5 0 0 0-7.07-7.07l-1.72 1.71"></path>
                    <path d="M14 11a5 5 0 0 0-7.54-.54l-3 3a5 5 0 0 0 7.07 7.07l1.71-1.71"></path>
                </svg>
                <span class="font-semibold text-[15px]">Links</span>
            </a>
        </div>

        <!-- Mobile Menu Footer -->
        <div class="sticky bottom-0 bg-[#222f7f] p-4 mt-4 border-t border-white/20">
            <div class="text-center">
                <p class="text-white/70 text-xs">Network & Cyber Security Lab</p>
                <p class="text-white text-xs font-semibold">Politeknik Negeri Malang</p>
            </div>
        </div>
    </div>
</nav>

