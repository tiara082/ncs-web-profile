<!-- Footer Partial -->
<footer class="relative bg-gradient-to-br from-slate-900 via-indigo-950 to-blue-950 text-white overflow-hidden">
    <!-- Decorative Background -->
    <div class="absolute top-0 right-0 w-[500px] h-[500px] bg-gradient-to-br from-primary/20 to-secondary/20 rounded-full blur-3xl opacity-20 animate-float"></div>
    <div class="absolute bottom-0 left-0 w-[500px] h-[500px] bg-gradient-to-tl from-accent/20 to-primary/20 rounded-full blur-3xl opacity-20 animate-float" style="animation-delay: 2s"></div>
    <div class="absolute inset-0 bg-[linear-gradient(rgba(255,255,255,0.03)_1px,transparent_1px),linear-gradient(90deg,rgba(255,255,255,0.03)_1px,transparent_1px)] bg-[size:64px_64px] opacity-20"></div>
    
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 relative z-10">
        <!-- Main Footer Content - Better Proportions -->
        <div class="grid lg:grid-cols-12 md:grid-cols-2 gap-8 mb-10">
            <!-- Lab Info - Takes More Space (40%) -->
            <div class="lg:col-span-5 md:col-span-2">
                <div class="flex items-center gap-3 mb-4">
                    <div class="flex items-center gap-2 p-2 bg-white/5 rounded-lg border border-white/10">
                        <div class="logo-polinema">
                            <img src="https://avatars.githubusercontent.com/u/63681676?s=280&v=4" alt="Polinema Logo" class="w-10 h-10"/>
                        </div>
                        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/6/64/Jti_polinema.svg/328px-Jti_polinema.svg.png?20240606144137" alt="JTI Logo" class="w-10 h-10 object-contain"/>
                        <!-- Divider -->
                        <div class="w-px h-8 bg-gradient-to-b from-transparent via-white/20 to-transparent"></div>
                        <!-- Logo NCS -->
                        <div class="relative group">
                            <img src="{{ asset('img/logo.png') }}" alt="NCS Lab Logo" class="w-10 h-10 object-contain group-hover:scale-105 transition-transform"/>
                        </div>
                    </div>
                    <div>
                        <h4 class="text-lg font-bold bg-gradient-to-r from-primary via-secondary to-accent bg-clip-text text-transparent">NCS Lab</h4>
                        <p class="text-xs text-white/60">Politeknik Negeri Malang</p>
                    </div>
                </div>
                <p class="text-white/70 text-sm leading-relaxed mb-4 max-w-md">Leading innovation in cybersecurity education and research. Empowering the next generation of security professionals.</p>
                <!-- Contact Info -->
                <div class="space-y-2 text-sm">
                    <div class="flex items-start gap-2 text-white/60">
                        <i data-feather="map-pin" width="16" height="16" class="text-primary mt-0.5 flex-shrink-0"></i>
                        <span>Jl. Soekarno Hatta No.9, Malang, East Java</span>
                    </div>
                    <div class="flex items-center gap-2 text-white/60">
                        <i data-feather="phone" width="16" height="16" class="text-primary flex-shrink-0"></i>
                        <span>+62 341 404424</span>
                    </div>
                    <div class="flex items-center gap-2 text-white/60">
                        <i data-feather="mail" width="16" height="16" class="text-primary flex-shrink-0"></i>
                        <span>ncs-lab@polinema.ac.id</span>
                    </div>
                </div>
            </div>
            
            <!-- Quick Links (20%) -->
            <div class="lg:col-span-2">
                <h4 class="text-white font-semibold mb-4 text-sm uppercase tracking-wider">Quick Links</h4>
                <ul class="space-y-2.5">
                    <li><a href="/profile" class="text-white/60 hover:text-primary transition-colors flex items-center gap-2 group text-sm"><i data-feather="chevron-right" width="12" height="12" class="text-primary/60 group-hover:translate-x-1 transition-transform"></i>About Lab</a></li>
                    <li><a href="/vision-mission" class="text-white/60 hover:text-primary transition-colors flex items-center gap-2 group text-sm"><i data-feather="chevron-right" width="12" height="12" class="text-primary/60 group-hover:translate-x-1 transition-transform"></i>Vision Mission</a></li>
                    <li><a href="/services" class="text-white/60 hover:text-primary transition-colors flex items-center gap-2 group text-sm"><i data-feather="chevron-right" width="12" height="12" class="text-primary/60 group-hover:translate-x-1 transition-transform"></i>Services</a></li>
                    <li><a href="/gallery" class="text-white/60 hover:text-primary transition-colors flex items-center gap-2 group text-sm"><i data-feather="chevron-right" width="12" height="12" class="text-primary/60 group-hover:translate-x-1 transition-transform"></i>Gallery</a></li>
                    <li><a href="/admin" class="text-white/60 hover:text-primary transition-colors flex items-center gap-2 group text-sm"><i data-feather="chevron-right" width="12" height="12" class="text-primary/60 group-hover:translate-x-1 transition-transform"></i>Admin Portal</a></li>
                </ul>
            </div>
            
            <!-- Resources (20%) -->
            <div class="lg:col-span-2">
                <h4 class="text-white font-semibold mb-4 text-sm uppercase tracking-wider">Resources</h4>
                <ul class="space-y-2.5">
                    <li><a href="/archive" class="text-white/60 hover:text-primary transition-colors flex items-center gap-2 group text-sm"><i data-feather="chevron-right" width="12" height="12" class="text-primary/60 group-hover:translate-x-1 transition-transform"></i>Research Archive</a></li>
                    <li><a href="/publications" class="text-white/60 hover:text-primary transition-colors flex items-center gap-2 group text-sm"><i data-feather="chevron-right" width="12" height="12" class="text-primary/60 group-hover:translate-x-1 transition-transform"></i>Publications</a></li>
                    <li><a href="/events" class="text-white/60 hover:text-primary transition-colors flex items-center gap-2 group text-sm"><i data-feather="chevron-right" width="12" height="12" class="text-primary/60 group-hover:translate-x-1 transition-transform"></i>Events</a></li>
                    <li><a href="/organization" class="text-white/60 hover:text-primary transition-colors flex items-center gap-2 group text-sm"><i data-feather="chevron-right" width="12" height="12" class="text-primary/60 group-hover:translate-x-1 transition-transform"></i>Our Team</a></li>
                </ul>
            </div>
            
            <!-- Related Links (20%) -->
            <div class="lg:col-span-3">
                <h4 class="text-white font-semibold mb-4 text-sm uppercase tracking-wider">Related Links</h4>
                <ul class="space-y-2.5">
                    <li>
                        <a href="https://www.polinema.ac.id" target="_blank" class="group flex items-center gap-2 text-white/60 hover:text-primary transition-colors text-sm">
                            <i data-feather="external-link" width="12" height="12" class="text-primary/60"></i>
                            Polinema
                        </a>
                    </li>
                    <li>
                        <a href="https://jti.polinema.ac.id" target="_blank" class="group flex items-center gap-2 text-white/60 hover:text-primary transition-colors text-sm">
                            <i data-feather="external-link" width="12" height="12" class="text-primary/60"></i>
                            JTI Polinema
                        </a>
                    </li>
                    <li>
                        <a href="https://simta.polinema.ac.id" target="_blank" class="group flex items-center gap-2 text-white/60 hover:text-primary transition-colors text-sm">
                            <i data-feather="external-link" width="12" height="12" class="text-primary/60"></i>
                            SIMTA
                        </a>
                    </li>
                    <li>
                        <a href="https://sinta.kemdiktisaintek.go.id/journals/profile/5102" target="_blank" class="group flex items-center gap-2 text-white/60 hover:text-primary transition-colors text-sm">
                            <i data-feather="external-link" width="12" height="12" class="text-primary/60"></i>
                            SINTA
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        <!-- Team Credits -->
        <div class="py-8 border-t border-white/10">
            <div class="text-center mb-6">
                <h4 class="text-white font-semibold mb-2 flex items-center justify-center gap-2 text-sm uppercase tracking-wider">
                    <i data-feather="users" width="18" height="18" class="text-primary"></i>
                    Created by Group 3 - Network and Cyber Security
                </h4>
                <p class="text-white/50 text-xs">Final Project Team Members</p>
            </div>
            
            <!-- Member Photos Only -->
            <div class="flex items-center justify-center gap-4 flex-wrap">
                <!-- Brian - Project Manager -->
                <div class="group relative">
                    <img src="{{ asset('img/group-member/brian.png') }}" alt="Brian Serafino Donovan" class="w-16 h-16 rounded-full object-cover ring-2 ring-primary/50 hover:ring-4 hover:ring-primary transition-all hover:scale-110 cursor-pointer"/>
                    <div class="absolute -bottom-1 -right-1 w-5 h-5 bg-gradient-to-br from-primary to-secondary rounded-full border-2 border-slate-900 flex items-center justify-center">
                        <i data-feather="briefcase" width="10" height="10" class="text-white"></i>
                    </div>
                    <!-- Tooltip -->
                    <div class="absolute bottom-full left-1/2 -translate-x-1/2 mb-2 px-3 py-2 bg-slate-800/95 backdrop-blur-sm rounded-lg border border-primary/30 opacity-0 group-hover:opacity-100 transition-all duration-300 pointer-events-none whitespace-nowrap shadow-xl z-20 text-center">
                        <div class="text-xs font-semibold text-white mb-0.5">Brian Serafino Donovan</div>
                        <div class="text-xs text-primary/80 font-mono">244107020035</div>
                        <div class="text-xs text-white/60 mt-1">Project Manager</div>
                        <div class="absolute top-full left-1/2 -translate-x-1/2 w-0 h-0 border-l-4 border-r-4 border-t-4 border-transparent border-t-slate-800/95"></div>
                    </div>
                </div>
                
                <!-- Joseph - UI/UX Designer -->
                <div class="group relative">
                    <img src="{{ asset('img/group-member/joseph.jpg') }}" alt="Joseph Atem Deng Aruei" class="w-16 h-16 rounded-full object-cover ring-2 ring-primary/50 hover:ring-4 hover:ring-primary transition-all hover:scale-110 cursor-pointer"/>
                    <div class="absolute -bottom-1 -right-1 w-5 h-5 bg-gradient-to-br from-secondary to-accent rounded-full border-2 border-slate-900 flex items-center justify-center">
                        <i data-feather="figma" width="10" height="10" class="text-white"></i>
                    </div>
                    <!-- Tooltip -->
                    <div class="absolute bottom-full left-1/2 -translate-x-1/2 mb-2 px-3 py-2 bg-slate-800/95 backdrop-blur-sm rounded-lg border border-primary/30 opacity-0 group-hover:opacity-100 transition-all duration-300 pointer-events-none whitespace-nowrap shadow-xl z-20 text-center">
                        <div class="text-xs font-semibold text-white mb-0.5">Joseph Atem Deng Aruei</div>
                        <div class="text-xs text-primary/80 font-mono">244107020242</div>
                        <div class="text-xs text-white/60 mt-1">UI/UX Designer</div>
                        <div class="absolute top-full left-1/2 -translate-x-1/2 w-0 h-0 border-l-4 border-r-4 border-t-4 border-transparent border-t-slate-800/95"></div>
                    </div>
                </div>
                
                <!-- Bima - UI/UX Designer -->
                <div class="group relative">
                    <img src="{{ asset('img/group-member/bima.png') }}" alt="Bima Arya Prasetyo" class="w-16 h-16 rounded-full object-cover ring-2 ring-primary/50 hover:ring-4 hover:ring-primary transition-all hover:scale-110 cursor-pointer"/>
                    <div class="absolute -bottom-1 -right-1 w-5 h-5 bg-gradient-to-br from-accent to-primary rounded-full border-2 border-slate-900 flex items-center justify-center">
                        <i data-feather="figma" width="10" height="10" class="text-white"></i>
                    </div>
                    <!-- Tooltip -->
                    <div class="absolute bottom-full left-1/2 -translate-x-1/2 mb-2 px-3 py-2 bg-slate-800/95 backdrop-blur-sm rounded-lg border border-primary/30 opacity-0 group-hover:opacity-100 transition-all duration-300 pointer-events-none whitespace-nowrap shadow-xl z-20 text-center">
                        <div class="text-xs font-semibold text-white mb-0.5">Bima Arya Prasetyo</div>
                        <div class="text-xs text-primary/80 font-mono">244107020226</div>
                        <div class="text-xs text-white/60 mt-1">UI/UX Designer</div>
                        <div class="absolute top-full left-1/2 -translate-x-1/2 w-0 h-0 border-l-4 border-r-4 border-t-4 border-transparent border-t-slate-800/95"></div>
                    </div>
                </div>
                
                <!-- Tiara - Frontend & Database -->
                <div class="group relative">
                    <img src="{{ asset('img/group-member/tiara.jpeg') }}" alt="Tiara Febrianie" class="w-16 h-16 rounded-full object-cover ring-2 ring-primary/50 hover:ring-4 hover:ring-primary transition-all hover:scale-110 cursor-pointer"/>
                    <div class="absolute -bottom-1 -right-1 w-5 h-5 bg-gradient-to-br from-primary to-accent rounded-full border-2 border-slate-900 flex items-center justify-center">
                        <i data-feather="code" width="10" height="10" class="text-white"></i>
                    </div>
                    <!-- Tooltip -->
                    <div class="absolute bottom-full left-1/2 -translate-x-1/2 mb-2 px-3 py-2 bg-slate-800/95 backdrop-blur-sm rounded-lg border border-primary/30 opacity-0 group-hover:opacity-100 transition-all duration-300 pointer-events-none whitespace-nowrap shadow-xl z-20 text-center">
                        <div class="text-xs font-semibold text-white mb-0.5">Tiara Febrianie</div>
                        <div class="text-xs text-primary/80 font-mono">244107020097</div>
                        <div class="text-xs text-white/60 mt-1">Frontend & Database</div>
                        <div class="absolute top-full left-1/2 -translate-x-1/2 w-0 h-0 border-l-4 border-r-4 border-t-4 border-transparent border-t-slate-800/95"></div>
                    </div>
                </div>
                
                <!-- Hanzel - Backend & Database -->
                <div class="group relative">
                    <img src="{{ asset('img/group-member/hanzel.jpg') }}" alt="Hanzel Putra Wollwage" class="w-16 h-16 rounded-full object-cover ring-2 ring-primary/50 hover:ring-4 hover:ring-primary transition-all hover:scale-110 cursor-pointer"/>
                    <div class="absolute -bottom-1 -right-1 w-5 h-5 bg-gradient-to-br from-secondary to-primary rounded-full border-2 border-slate-900 flex items-center justify-center">
                        <i data-feather="database" width="10" height="10" class="text-white"></i>
                    </div>
                    <!-- Tooltip -->
                    <div class="absolute bottom-full left-1/2 -translate-x-1/2 mb-2 px-3 py-2 bg-slate-800/95 backdrop-blur-sm rounded-lg border border-primary/30 opacity-0 group-hover:opacity-100 transition-all duration-300 pointer-events-none whitespace-nowrap shadow-xl z-20 text-center">
                        <div class="text-xs font-semibold text-white mb-0.5">Hanzel Putra Wollwage</div>
                        <div class="text-xs text-primary/80 font-mono">244107020157</div>
                        <div class="text-xs text-white/60 mt-1">Backend & Database</div>
                        <div class="absolute top-full left-1/2 -translate-x-1/2 w-0 h-0 border-l-4 border-r-4 border-t-4 border-transparent border-t-slate-800/95"></div>
                    </div>
                </div>
                
                <!-- Devin - Quality Assurance -->
                <div class="group relative">
                    <img src="{{ asset('img/group-member/devin.png') }}" alt="Devin Rianto" class="w-16 h-16 rounded-full object-cover ring-2 ring-primary/50 hover:ring-4 hover:ring-primary transition-all hover:scale-110 cursor-pointer"/>
                    <div class="absolute -bottom-1 -right-1 w-5 h-5 bg-gradient-to-br from-accent to-secondary rounded-full border-2 border-slate-900 flex items-center justify-center">
                        <i data-feather="check-circle" width="10" height="10" class="text-white"></i>
                    </div>
                    <!-- Tooltip -->
                    <div class="absolute bottom-full left-1/2 -translate-x-1/2 mb-2 px-3 py-2 bg-slate-800/95 backdrop-blur-sm rounded-lg border border-primary/30 opacity-0 group-hover:opacity-100 transition-all duration-300 pointer-events-none whitespace-nowrap shadow-xl z-20 text-center">
                        <div class="text-xs font-semibold text-white mb-0.5">Devin Rianto</div>
                        <div class="text-xs text-primary/80 font-mono">244107020138</div>
                        <div class="text-xs text-white/60 mt-1">Quality Assurance</div>
                        <div class="absolute top-full left-1/2 -translate-x-1/2 w-0 h-0 border-l-4 border-r-4 border-t-4 border-transparent border-t-slate-800/95"></div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Bottom Bar -->
        <div class="flex flex-col md:flex-row justify-between items-center gap-3">
            <div class="flex items-center gap-2 text-xs text-white/50">
                <i data-feather="shield" width="14" height="14" class="text-primary/70"></i>
                <span>© 2025 NCS Lab. All rights reserved.</span>
            </div>
            <div class="flex items-center gap-4 text-xs">
                <a href="#" class="text-white/50 hover:text-primary transition-colors flex items-center gap-1.5">
                    <i data-feather="lock" width="12" height="12"></i>
                    Privacy
                </a>
                <span class="text-white/20">•</span>
                <a href="#" class="text-white/50 hover:text-primary transition-colors flex items-center gap-1.5">
                    <i data-feather="file-text" width="12" height="12"></i>
                    Terms
                </a>
                <span class="text-white/20">•</span>
                <a href="#" class="text-white/50 hover:text-primary transition-colors flex items-center gap-1.5">
                    <i data-feather="map" width="12" height="12"></i>
                    Sitemap
                </a>
            </div>
        </div>
    </div>
</footer>
