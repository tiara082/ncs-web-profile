<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <title>Infrastructure & Facilities - NCS Lab</title>
    <meta name="description" content="State-of-the-art infrastructure and facilities at Network & Cyber Security Lab"/>
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
                        background: '#ffffff',
                        foreground: '#000000',
                        muted: {
                            DEFAULT: '#f1f5f9',
                            foreground: '#64748b'
                        },
                        card: '#ffffff',
                        border: '#e2e8f0'
                    },
                    fontFamily: {
                        sans: ['Poppins', 'sans-serif']
                    }
                }
            }
        }
    </script>
</head>
<body class="font-sans antialiased scroll-smooth">
    @include('partials.scroll-progress')
    
    <div class="min-h-screen bg-gradient-to-br from-slate-50 via-blue-50 to-indigo-50">
        <!-- Sub Header (includes navbar + hero) -->
        @include('partials.sub-header')
        
        <!-- Main Content -->
        <main class="py-16">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                
                <!-- Main Facilities Overview -->
                <section class="mb-16">
                    <div class="text-center mb-12">
                        <h2 class="text-4xl font-bold text-slate-800 mb-4">Facilities & Infrastructure</h2>
                        <p class="text-lg text-slate-600 max-w-3xl mx-auto">
                            Laboratory facilities with the latest technology to support cybersecurity research, education and training.
                        </p>
                    </div>
                    
                    <!-- Main Facility Cards -->
                    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6 mb-12">
                        @php
                        $mainFacilities = [
                            ['icon' => 'monitor', 'name' => 'Computer Laboratory', 'location' => 'Main Lab', 'color' => 'from-blue-500 to-cyan-500'],
                            ['icon' => 'server', 'name' => 'Server Room', 'location' => 'Dedicated Space', 'color' => 'from-indigo-500 to-blue-500'],
                            ['icon' => 'cpu', 'name' => 'Research Area', 'location' => 'R&D Section', 'color' => 'from-purple-500 to-indigo-500'],
                            ['icon' => 'users', 'name' => 'Meeting Room', 'location' => 'Collaboration Space', 'color' => 'from-pink-500 to-purple-500'],
                            ['icon' => 'book', 'name' => 'Library & Resources', 'location' => 'Knowledge Center', 'color' => 'from-orange-500 to-pink-500'],
                            ['icon' => 'zap', 'name' => 'Network Lab', 'location' => 'Networking Zone', 'color' => 'from-yellow-500 to-orange-500'],
                        ];
                        @endphp
                        
                        @foreach($mainFacilities as $facility)
                        <div class="group relative bg-white rounded-2xl overflow-hidden border border-slate-200 shadow-md hover:shadow-2xl transition-all duration-500 cursor-pointer">
                            <!-- Gradient Header -->
                            <div class="h-32 bg-gradient-to-br {{ $facility['color'] }} relative">
                                <div class="absolute inset-0 bg-black/10"></div>
                                <div class="absolute inset-0 flex items-center justify-center">
                                    <div class="w-16 h-16 bg-white/20 backdrop-blur-sm rounded-2xl flex items-center justify-center group-hover:scale-110 transition-transform">
                                        <i data-feather="{{ $facility['icon'] }}" class="text-white" width="32" height="32"></i>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Content -->
                            <div class="p-6">
                                <h3 class="text-xl font-bold text-slate-800 mb-2 group-hover:text-primary transition-colors">{{ $facility['name'] }}</h3>
                                <div class="flex items-center gap-2 text-slate-600">
                                    <i data-feather="map-pin" width="16" height="16"></i>
                                    <span class="text-sm">{{ $facility['location'] }}</span>
                                </div>
                            </div>
                            

                        </div>
                        @endforeach
                    </div>
                </section>
                

                
                <!-- Equipment & Technology -->
                <section class="mb-20">
                    <div class="mb-12">
                        <h2 class="text-3xl font-bold text-slate-800 mb-4">Tools & Technology</h2>
                        <p class="text-slate-600">Advanced computing and networking hardware for research and training</p>
                    </div>
                    
                    <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-6">
                        @php
                        $equipments = [
                            ['icon' => 'monitor', 'name' => 'Workstations', 'desc' => '50+ High-Performance PCs', 'color' => 'from-cyan-500 to-blue-500'],
                            ['icon' => 'server', 'name' => 'Servers', 'desc' => 'Enterprise Server Infrastructure', 'color' => 'from-blue-500 to-indigo-500'],
                            ['icon' => 'cpu', 'name' => 'Network Equipment', 'desc' => 'Cisco & FortiGate Hardware', 'color' => 'from-indigo-500 to-purple-500'],
                            ['icon' => 'shield', 'name' => 'Security Tools', 'desc' => 'Penetration Testing Suite', 'color' => 'from-purple-500 to-pink-500'],
                        ];
                        @endphp
                        @foreach($equipments as $equipment)
                        <div class="bg-white rounded-xl p-6 border border-slate-200 hover:shadow-xl hover:-translate-y-1 transition-all duration-300">
                            <div class="flex items-center justify-center w-14 h-14 rounded-xl bg-gradient-to-br {{ $equipment['color'] }} text-white mb-4 mx-auto">
                                <i data-feather="{{ $equipment['icon'] }}" class="w-7 h-7"></i>
                            </div>
                            <h4 class="font-bold text-slate-800 text-center mb-2">{{ $equipment['name'] }}</h4>
                            <p class="text-sm text-slate-600 text-center">{{ $equipment['desc'] }}</p>
                        </div>
                        @endforeach
                    </div>
                </section>
                
                <!-- Software & Platforms -->
                <section class="mb-20">
                    <div class="mb-12">
                        <h2 class="text-3xl font-bold text-slate-800 mb-4">Software & Platforms</h2>
                        <p class="text-slate-600">Industry-standard tools and platforms for cybersecurity research and training</p>
                    </div>
                    
                    <div class="grid md:grid-cols-3 gap-6">
                        <!-- Security Tools -->
                        <div class="bg-white rounded-xl p-6 border border-slate-200 shadow-md hover:shadow-xl transition-all duration-300">
                            <div class="w-12 h-12 bg-gradient-to-br from-red-500/20 to-orange-500/20 rounded-lg flex items-center justify-center mb-4">
                                <i data-feather="tool" class="text-red-500" width="24" height="24"></i>
                            </div>
                            <h4 class="text-lg font-bold text-slate-800 mb-3">Security Tools</h4>
                            <ul class="space-y-2 text-sm text-slate-600">
                                <li>• Metasploit Framework</li>
                                <li>• Burp Suite Professional</li>
                                <li>• Nmap & Zenmap</li>
                                <li>• OWASP ZAP</li>
                                <li>• John the Ripper</li>
                            </ul>
                        </div>
                        
                        <!-- Network Simulation -->
                        <div class="bg-white rounded-xl p-6 border border-slate-200 shadow-md hover:shadow-xl transition-all duration-300">
                            <div class="w-12 h-12 bg-gradient-to-br from-blue-500/20 to-cyan-500/20 rounded-lg flex items-center justify-center mb-4">
                                <i data-feather="activity" class="text-blue-500" width="24" height="24"></i>
                            </div>
                            <h4 class="text-lg font-bold text-slate-800 mb-3">Network Simulation</h4>
                            <ul class="space-y-2 text-sm text-slate-600">
                                <li>• GNS3 & EVE-NG</li>
                                <li>• Cisco Packet Tracer</li>
                                <li>• VirtualBox & VMware</li>
                                <li>• Docker Containers</li>
                                <li>• Kubernetes Clusters</li>
                            </ul>
                        </div>
                        
                        <!-- Development -->
                        <div class="bg-white rounded-xl p-6 border border-slate-200 shadow-md hover:shadow-xl transition-all duration-300">
                            <div class="w-12 h-12 bg-gradient-to-br from-green-500/20 to-emerald-500/20 rounded-lg flex items-center justify-center mb-4">
                                <i data-feather="code" class="text-green-500" width="24" height="24"></i>
                            </div>
                            <h4 class="text-lg font-bold text-slate-800 mb-3">Development Tools</h4>
                            <ul class="space-y-2 text-sm text-slate-600">
                                <li>• Visual Studio Code</li>
                                <li>• PyCharm Professional</li>
                                <li>• Git & GitHub</li>
                                <li>• Postman API Testing</li>
                                <li>• JetBrains IDEs</li>
                            </ul>
                        </div>
                        
                        <!-- Monitoring -->
                        <div class="bg-white rounded-xl p-6 border border-slate-200 shadow-md hover:shadow-xl transition-all duration-300">
                            <div class="w-12 h-12 bg-gradient-to-br from-yellow-500/20 to-orange-500/20 rounded-lg flex items-center justify-center mb-4">
                                <i data-feather="bar-chart-2" class="text-yellow-600" width="24" height="24"></i>
                            </div>
                            <h4 class="text-lg font-bold text-slate-800 mb-3">Monitoring Systems</h4>
                            <ul class="space-y-2 text-sm text-slate-600">
                                <li>• Splunk Enterprise</li>
                                <li>• Nagios Core</li>
                                <li>• Zabbix Monitoring</li>
                                <li>• Grafana Dashboards</li>
                                <li>• Prometheus</li>
                            </ul>
                        </div>
                        
                        <!-- Analysis -->
                        <div class="bg-white rounded-xl p-6 border border-slate-200 shadow-md hover:shadow-xl transition-all duration-300">
                            <div class="w-12 h-12 bg-gradient-to-br from-purple-500/20 to-pink-500/20 rounded-lg flex items-center justify-center mb-4">
                                <i data-feather="search" class="text-purple-500" width="24" height="24"></i>
                            </div>
                            <h4 class="text-lg font-bold text-slate-800 mb-3">Analysis Tools</h4>
                            <ul class="space-y-2 text-sm text-slate-600">
                                <li>• Wireshark Advanced</li>
                                <li>• IDA Pro</li>
                                <li>• Ghidra</li>
                                <li>• Autopsy Forensics</li>
                                <li>• Volatility Framework</li>
                            </ul>
                        </div>
                        
                        <!-- Cloud -->
                        <div class="bg-white rounded-xl p-6 border border-slate-200 shadow-md hover:shadow-xl transition-all duration-300">
                            <div class="w-12 h-12 bg-gradient-to-br from-indigo-500/20 to-blue-500/20 rounded-lg flex items-center justify-center mb-4">
                                <i data-feather="cloud" class="text-indigo-500" width="24" height="24"></i>
                            </div>
                            <h4 class="text-lg font-bold text-slate-800 mb-3">Cloud Platforms</h4>
                            <ul class="space-y-2 text-sm text-slate-600">
                                <li>• AWS Cloud Services</li>
                                <li>• Microsoft Azure</li>
                                <li>• Google Cloud Platform</li>
                                <li>• DigitalOcean</li>
                                <li>• Alibaba Cloud</li>
                            </ul>
                        </div>
                    </div>
                </section>
                
                <!-- Facilities -->
                <section class="mb-20">
                    <div class="mb-12">
                        <h2 class="text-3xl font-bold text-slate-800 mb-4">Laboratory Facilities</h2>
                        <p class="text-slate-600">Modern and comfortable learning environment for optimal productivity</p>
                    </div>
                    
                    <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
                        <div class="bg-gradient-to-br from-cyan-500/5 to-blue-500/5 rounded-xl p-6 border border-cyan-200/50">
                            <div class="w-14 h-14 bg-white rounded-xl flex items-center justify-center mb-4 shadow-md">
                                <i data-feather="home" class="text-cyan-600" width="28" height="28"></i>
                            </div>
                            <h4 class="font-bold text-slate-800 mb-2">Modern Lab Space</h4>
                            <p class="text-sm text-slate-600">200m² air-conditioned laboratory with ergonomic furniture</p>
                        </div>
                        
                        <div class="bg-gradient-to-br from-blue-500/5 to-indigo-500/5 rounded-xl p-6 border border-blue-200/50">
                            <div class="w-14 h-14 bg-white rounded-xl flex items-center justify-center mb-4 shadow-md">
                                <i data-feather="wifi" class="text-blue-600" width="28" height="28"></i>
                            </div>
                            <h4 class="font-bold text-slate-800 mb-2">High-Speed Internet</h4>
                            <p class="text-sm text-slate-600">Gigabit fiber connection with redundant backup lines</p>
                        </div>
                        
                        <div class="bg-gradient-to-br from-indigo-500/5 to-purple-500/5 rounded-xl p-6 border border-indigo-200/50">
                            <div class="w-14 h-14 bg-white rounded-xl flex items-center justify-center mb-4 shadow-md">
                                <i data-feather="book" class="text-indigo-600" width="28" height="28"></i>
                            </div>
                            <h4 class="font-bold text-slate-800 mb-2">Resource Library</h4>
                            <p class="text-sm text-slate-600">Extensive collection of books, journals, and digital resources</p>
                        </div>
                        
                        <div class="bg-gradient-to-br from-purple-500/5 to-pink-500/5 rounded-xl p-6 border border-purple-200/50">
                            <div class="w-14 h-14 bg-white rounded-xl flex items-center justify-center mb-4 shadow-md">
                                <i data-feather="users" class="text-purple-600" width="28" height="28"></i>
                            </div>
                            <h4 class="font-bold text-slate-800 mb-2">Meeting Rooms</h4>
                            <p class="text-sm text-slate-600">Dedicated spaces for collaboration and project discussions</p>
                        </div>
                    </div>
                </section>
                
                <!-- CTA Section -->
                <section class="bg-gradient-to-r from-primary to-secondary rounded-3xl p-12 text-center text-white">
                    <h2 class="text-3xl font-bold mb-4">Experience Our Facilities</h2>
                    <p class="text-lg mb-8 text-white/90 max-w-2xl mx-auto">
                        Schedule a visit to see our state-of-the-art infrastructure and learn how we can support your cybersecurity research and education needs.
                    </p>
                    <a href="/consulting" class="inline-flex items-center gap-2 px-8 py-4 bg-white text-primary font-semibold rounded-xl hover:shadow-2xl hover:scale-105 transition-all duration-300">
                        <i data-feather="mail" width="20" height="20"></i>
                        Contact Us
                    </a>
                </section>
                
            </div>
        </main>
        
        <!-- Footer -->
        @include('partials.footer')
        
        <!-- Back to Top -->
        @include('partials.back-to-top')
    </div>
    
    <!-- Initialize Feather Icons -->
    <script>
        feather.replace();
        
        // Switch Area Function
        function switchArea(areaId) {
            // Hide all areas
            document.querySelectorAll('.area-section').forEach(section => {
                section.classList.add('hidden');
            });
            
            // Remove active class from all tabs
            document.querySelectorAll('.area-tab').forEach(tab => {
                tab.classList.remove('bg-gradient-to-r', 'from-primary', 'to-secondary', 'text-white', 'shadow-lg');
                tab.classList.add('bg-white', 'text-slate-700', 'border', 'border-slate-200');
            });
            
            // Show selected area
            document.getElementById(areaId).classList.remove('hidden');
            
            // Add active class to clicked tab
            const activeTab = document.querySelector(`[data-area="${areaId}"]`);
            activeTab.classList.add('bg-gradient-to-r', 'from-primary', 'to-secondary', 'text-white', 'shadow-lg');
            activeTab.classList.remove('bg-white', 'text-slate-700', 'border', 'border-slate-200');
            
            // Reinitialize feather icons
            feather.replace();
        }
    </script>
    
    <!-- Shared Scripts -->
    @include('partials.shared-scripts')
</body>
</html>
