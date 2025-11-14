<!-- Navbar Partial (shared navigation + mobile menu) -->
<nav class="sticky top-0 z-50 bg-background/95 backdrop-blur supports-[backdrop-filter]:bg-background/60 border-b border-border">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-16">
            <div class="flex-shrink-0 flex items-center gap-3">
                <div class="flex items-center gap-2">
                    <div class="relative group logo-polinema hover:scale-105 transition-transform">
                        <img src="https://avatars.githubusercontent.com/u/63681676?s=280&v=4" alt="Polinema Logo"/>
                    </div>
                    <div class="relative group">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/6/64/Jti_polinema.svg/328px-Jti_polinema.svg.png?20240606144137" alt="JTI Logo" class="w-10 h-10 object-contain group-hover:scale-105 transition-transform"/>
                    </div>
                </div>
                <div class="hidden sm:block border-l-2 border-primary/30 pl-3">
                    <p class="text-base font-bold text-foreground bg-gradient-to-r from-primary to-secondary bg-clip-text text-transparent">Network & Cyber Security</p>
                    <p class="text-xs font-medium text-muted-foreground"> Jurusan Teknologi Informasi  Politeknik Negeri Malang</p>
                </div>
            </div>
            <div class="hidden md:flex items-center gap-8">
                <!-- 1. HOME -->
                <div class="relative group">
                    <a href="/" class="text-sm font-medium text-foreground hover:text-primary transition-colors flex items-center gap-1">Home</a>
                </div>
                
                <!-- 2. PROFILE -->
                <div class="relative group">
                    <a href="#" class="text-sm font-medium text-foreground hover:text-primary transition-colors flex items-center gap-1">
                        Profile
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-4 w-4"><path d="m6 9 6 6 6-6"></path></svg>
                    </a>
                    <div class="absolute left-0 mt-0 w-56 bg-background border border-border rounded-md shadow-lg opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200">
                        <a href="/vision-mission" class="block px-4 py-2 text-sm text-foreground hover:text-primary hover:bg-muted transition-colors first:rounded-t-md">Vision & Mission</a>
                        <a href="/profile" class="block px-4 py-2 text-sm text-foreground hover:text-primary hover:bg-muted transition-colors">Laboratory Profile</a>
                        <a href="/logo" class="block px-4 py-2 text-sm text-foreground hover:text-primary hover:bg-muted transition-colors">Logo</a>
                        <a href="/organization" class="block px-4 py-2 text-sm text-foreground hover:text-primary hover:bg-muted transition-colors last:rounded-b-md">Organizational Structure</a>
                    </div>
                </div>
                
                <!-- 3. GALLERY -->
                <div class="relative group">
                    <a href="#" class="text-sm font-medium text-foreground hover:text-primary transition-colors flex items-center gap-1">
                        Gallery
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-4 w-4"><path d="m6 9 6 6 6-6"></path></svg>
                    </a>
                    <div class="absolute left-0 mt-0 w-48 bg-background border border-border rounded-md shadow-lg opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200">
                        <a href="/agenda" class="block px-4 py-2 text-sm text-foreground hover:text-primary hover:bg-muted transition-colors first:rounded-t-md">Agenda</a>
                        <a href="/activities" class="block px-4 py-2 text-sm text-foreground hover:text-primary hover:bg-muted transition-colors last:rounded-b-md">Past Activities</a>
                    </div>
                </div>
                
                <!-- 4. ARCHIVE -->
                <div class="relative group">
                    <a href="#" class="text-sm font-medium text-foreground hover:text-primary transition-colors flex items-center gap-1">
                        Archive
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-4 w-4"><path d="m6 9 6 6 6-6"></path></svg>
                    </a>
                    <div class="absolute left-0 mt-0 w-56 bg-background border border-border rounded-md shadow-lg opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200">
                        <a href="/research-documents" class="block px-4 py-2 text-sm text-foreground hover:text-primary hover:bg-muted transition-colors first:rounded-t-md">Research Documents</a>
                        <a href="/community-service" class="block px-4 py-2 text-sm text-foreground hover:text-primary hover:bg-muted transition-colors last:rounded-b-md">Community Service</a>
                    </div>
                </div>
                
                <!-- 5. SERVICES -->
                <div class="relative group">
                    <a href="#" class="text-sm font-medium text-foreground hover:text-primary transition-colors flex items-center gap-1">
                        Services
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-4 w-4"><path d="m6 9 6 6 6-6"></path></svg>
                    </a>
                    <div class="absolute left-0 mt-0 w-64 bg-background border border-border rounded-md shadow-lg opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200">
                        <a href="/infrastructure" class="block px-4 py-2 text-sm text-foreground hover:text-primary hover:bg-muted transition-colors first:rounded-t-md">Infrastructure & Facilities</a>
                        <a href="/consulting" class="block px-4 py-2 text-sm text-foreground hover:text-primary hover:bg-muted transition-colors last:rounded-b-md">Consulting Services</a>
                    </div>
                </div>
                
                <!-- 6. LINKS -->
                <div class="relative group">
                    <a href="/links" class="text-sm font-medium text-foreground hover:text-primary transition-colors flex items-center gap-1">Links</a>
                </div>
            </div>
            <button id="mobile-menu-btn" class="md:hidden inline-flex items-center justify-center p-2 rounded-md hover:bg-muted transition-colors">
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
    <!-- Mobile Menu -->
    <div id="mobile-menu" class="mobile-menu fixed top-16 right-0 w-full h-[calc(100vh-4rem)] bg-background/98 backdrop-blur-lg border-t border-border shadow-2xl z-40 md:hidden overflow-y-auto">
        <div class="px-4 py-6 space-y-3">
            <a href="/" class="block px-4 py-3 text-foreground hover:text-primary hover:bg-muted rounded-lg transition-all font-medium">Home</a>
            
            <div class="space-y-1">
                <div class="px-4 py-2 text-xs font-bold text-muted-foreground uppercase tracking-wider">Profile</div>
                <a href="/vision-mission" class="block px-4 py-2 text-sm text-foreground hover:text-primary hover:bg-muted rounded-lg transition-all ml-2">Vision & Mission</a>
                <a href="/profile" class="block px-4 py-2 text-sm text-foreground hover:text-primary hover:bg-muted rounded-lg transition-all ml-2">Laboratory Profile</a>
                <a href="/logo" class="block px-4 py-2 text-sm text-foreground hover:text-primary hover:bg-muted rounded-lg transition-all ml-2">Logo</a>
                <a href="/organization" class="block px-4 py-2 text-sm text-foreground hover:text-primary hover:bg-muted rounded-lg transition-all ml-2">Organizational Structure</a>
            </div>
            
            <div class="space-y-1">
                <div class="px-4 py-2 text-xs font-bold text-muted-foreground uppercase tracking-wider">Gallery</div>
                <a href="/agenda" class="block px-4 py-2 text-sm text-foreground hover:text-primary hover:bg-muted rounded-lg transition-all ml-2">Agenda</a>
                <a href="/activities" class="block px-4 py-2 text-sm text-foreground hover:text-primary hover:bg-muted rounded-lg transition-all ml-2">Past Activities</a>
            </div>
            
            <div class="space-y-1">
                <div class="px-4 py-2 text-xs font-bold text-muted-foreground uppercase tracking-wider">Archive</div>
                <a href="/research-documents" class="block px-4 py-2 text-sm text-foreground hover:text-primary hover:bg-muted rounded-lg transition-all ml-2">Research Documents</a>
                <a href="/community-service" class="block px-4 py-2 text-sm text-foreground hover:text-primary hover:bg-muted rounded-lg transition-all ml-2">Community Service</a>
            </div>
            
            <div class="space-y-1">
                <div class="px-4 py-2 text-xs font-bold text-muted-foreground uppercase tracking-wider">Services</div>
                <a href="/infrastructure" class="block px-4 py-2 text-sm text-foreground hover:text-primary hover:bg-muted rounded-lg transition-all ml-2">Infrastructure & Facilities</a>
                <a href="/consulting" class="block px-4 py-2 text-sm text-foreground hover:text-primary hover:bg-muted rounded-lg transition-all ml-2">Consulting Services</a>
            </div>
            
            <a href="/links" class="block px-4 py-3 text-foreground hover:text-primary hover:bg-muted rounded-lg transition-all font-medium">Links</a>
        </div>
    </div>
</nav>

