<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <title>Consulting Services - NCS Lab</title>
    <meta name="description" content="Professional cybersecurity consulting and advisory services from Network & Cyber Security Lab experts"/>
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
        <!-- Sub Header -->
        @include('partials.sub-header')
        
        <!-- Main Content -->
        <main class="py-16">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                
                <!-- Services Grid -->
                <section class="mb-20">
                    <div class="mb-12">
                        <h2 class="text-3xl font-bold text-slate-800 mb-4">Our Consulting Services</h2>
                        <p class="text-slate-600">Comprehensive security solutions tailored to your business needs</p>
                    </div>
                    
                    <div class="grid lg:grid-cols-3 md:grid-cols-2 gap-8">
                        <!-- Security Assessment -->
                        <div class="group bg-white rounded-2xl p-8 border border-slate-200 shadow-lg hover:shadow-2xl transition-all duration-500 hover:-translate-y-2">
                            <div class="w-16 h-16 bg-gradient-to-br from-cyan-500/20 to-blue-500/20 rounded-xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
                                <i data-feather="shield" class="text-cyan-600" width="32" height="32"></i>
                            </div>
                            <h3 class="text-2xl font-bold text-slate-800 mb-4">Security Assessment</h3>
                            <p class="text-slate-600 mb-6">Comprehensive evaluation of your security posture, identifying vulnerabilities and providing actionable recommendations.</p>
                            <ul class="space-y-2 text-sm text-slate-600">
                                <li class="flex items-center gap-2">
                                    <i data-feather="check" class="text-cyan-500 flex-shrink-0" width="16" height="16"></i>
                                    Vulnerability Assessment
                                </li>
                                <li class="flex items-center gap-2">
                                    <i data-feather="check" class="text-cyan-500 flex-shrink-0" width="16" height="16"></i>
                                    Risk Analysis
                                </li>
                                <li class="flex items-center gap-2">
                                    <i data-feather="check" class="text-cyan-500 flex-shrink-0" width="16" height="16"></i>
                                    Security Audit
                                </li>
                            </ul>
                        </div>
                        
                        <!-- Penetration Testing -->
                        <div class="group bg-white rounded-2xl p-8 border border-slate-200 shadow-lg hover:shadow-2xl transition-all duration-500 hover:-translate-y-2">
                            <div class="w-16 h-16 bg-gradient-to-br from-blue-500/20 to-indigo-500/20 rounded-xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
                                <i data-feather="crosshair" class="text-blue-600" width="32" height="32"></i>
                            </div>
                            <h3 class="text-2xl font-bold text-slate-800 mb-4">Penetration Testing</h3>
                            <p class="text-slate-600 mb-6">Simulated cyber attacks to test your defenses and uncover security weaknesses before malicious actors do.</p>
                            <ul class="space-y-2 text-sm text-slate-600">
                                <li class="flex items-center gap-2">
                                    <i data-feather="check" class="text-blue-500 flex-shrink-0" width="16" height="16"></i>
                                    Network Penetration Testing
                                </li>
                                <li class="flex items-center gap-2">
                                    <i data-feather="check" class="text-blue-500 flex-shrink-0" width="16" height="16"></i>
                                    Web Application Testing
                                </li>
                                <li class="flex items-center gap-2">
                                    <i data-feather="check" class="text-blue-500 flex-shrink-0" width="16" height="16"></i>
                                    Mobile App Testing
                                </li>
                            </ul>
                        </div>
                        
                        <!-- Security Architecture -->
                        <div class="group bg-white rounded-2xl p-8 border border-slate-200 shadow-lg hover:shadow-2xl transition-all duration-500 hover:-translate-y-2">
                            <div class="w-16 h-16 bg-gradient-to-br from-indigo-500/20 to-purple-500/20 rounded-xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
                                <i data-feather="layers" class="text-indigo-600" width="32" height="32"></i>
                            </div>
                            <h3 class="text-2xl font-bold text-slate-800 mb-4">Security Architecture</h3>
                            <p class="text-slate-600 mb-6">Design and implementation of robust security frameworks aligned with industry best practices and compliance.</p>
                            <ul class="space-y-2 text-sm text-slate-600">
                                <li class="flex items-center gap-2">
                                    <i data-feather="check" class="text-indigo-500 flex-shrink-0" width="16" height="16"></i>
                                    Security Design Review
                                </li>
                                <li class="flex items-center gap-2">
                                    <i data-feather="check" class="text-indigo-500 flex-shrink-0" width="16" height="16"></i>
                                    Infrastructure Hardening
                                </li>
                                <li class="flex items-center gap-2">
                                    <i data-feather="check" class="text-indigo-500 flex-shrink-0" width="16" height="16"></i>
                                    Zero Trust Implementation
                                </li>
                            </ul>
                        </div>
                        
                        <!-- Incident Response -->
                        <div class="group bg-white rounded-2xl p-8 border border-slate-200 shadow-lg hover:shadow-2xl transition-all duration-500 hover:-translate-y-2">
                            <div class="w-16 h-16 bg-gradient-to-br from-purple-500/20 to-pink-500/20 rounded-xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
                                <i data-feather="alert-triangle" class="text-purple-600" width="32" height="32"></i>
                            </div>
                            <h3 class="text-2xl font-bold text-slate-800 mb-4">Incident Response</h3>
                            <p class="text-slate-600 mb-6">Rapid response and recovery services to minimize damage and restore operations after security incidents.</p>
                            <ul class="space-y-2 text-sm text-slate-600">
                                <li class="flex items-center gap-2">
                                    <i data-feather="check" class="text-purple-500 flex-shrink-0" width="16" height="16"></i>
                                    24/7 Emergency Response
                                </li>
                                <li class="flex items-center gap-2">
                                    <i data-feather="check" class="text-purple-500 flex-shrink-0" width="16" height="16"></i>
                                    Forensic Investigation
                                </li>
                                <li class="flex items-center gap-2">
                                    <i data-feather="check" class="text-purple-500 flex-shrink-0" width="16" height="16"></i>
                                    Incident Recovery Plan
                                </li>
                            </ul>
                        </div>
                        
                        <!-- Compliance & Governance -->
                        <div class="group bg-white rounded-2xl p-8 border border-slate-200 shadow-lg hover:shadow-2xl transition-all duration-500 hover:-translate-y-2">
                            <div class="w-16 h-16 bg-gradient-to-br from-pink-500/20 to-red-500/20 rounded-xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
                                <i data-feather="file-text" class="text-pink-600" width="32" height="32"></i>
                            </div>
                            <h3 class="text-2xl font-bold text-slate-800 mb-4">Compliance & Governance</h3>
                            <p class="text-slate-600 mb-6">Navigate regulatory requirements and establish governance frameworks to ensure ongoing compliance.</p>
                            <ul class="space-y-2 text-sm text-slate-600">
                                <li class="flex items-center gap-2">
                                    <i data-feather="check" class="text-pink-500 flex-shrink-0" width="16" height="16"></i>
                                    ISO 27001 Implementation
                                </li>
                                <li class="flex items-center gap-2">
                                    <i data-feather="check" class="text-pink-500 flex-shrink-0" width="16" height="16"></i>
                                    GDPR/Privacy Compliance
                                </li>
                                <li class="flex items-center gap-2">
                                    <i data-feather="check" class="text-pink-500 flex-shrink-0" width="16" height="16"></i>
                                    Policy Development
                                </li>
                            </ul>
                        </div>
                        
                        <!-- Security Training -->
                        <div class="group bg-white rounded-2xl p-8 border border-slate-200 shadow-lg hover:shadow-2xl transition-all duration-500 hover:-translate-y-2">
                            <div class="w-16 h-16 bg-gradient-to-br from-red-500/20 to-orange-500/20 rounded-xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
                                <i data-feather="users" class="text-red-600" width="32" height="32"></i>
                            </div>
                            <h3 class="text-2xl font-bold text-slate-800 mb-4">Security Training</h3>
                            <p class="text-slate-600 mb-6">Empower your team with knowledge and skills through customized security awareness and technical training.</p>
                            <ul class="space-y-2 text-sm text-slate-600">
                                <li class="flex items-center gap-2">
                                    <i data-feather="check" class="text-red-500 flex-shrink-0" width="16" height="16"></i>
                                    Security Awareness Training
                                </li>
                                <li class="flex items-center gap-2">
                                    <i data-feather="check" class="text-red-500 flex-shrink-0" width="16" height="16"></i>
                                    Technical Skills Workshop
                                </li>
                                <li class="flex items-center gap-2">
                                    <i data-feather="check" class="text-red-500 flex-shrink-0" width="16" height="16"></i>
                                    Phishing Simulation
                                </li>
                            </ul>
                        </div>
                    </div>
                </section>
                
                <!-- Process Section -->
                <section class="mb-20">
                    <div class="mb-12 text-center">
                        <h2 class="text-3xl font-bold text-slate-800 mb-4">Our Consulting Process</h2>
                        <p class="text-slate-600 max-w-2xl mx-auto">A structured approach to delivering exceptional cybersecurity solutions</p>
                    </div>
                    
                    <div class="grid md:grid-cols-4 gap-6">
                        <div class="relative">
                            <div class="bg-white rounded-2xl p-6 border border-slate-200 shadow-lg text-center">
                                <div class="w-12 h-12 bg-gradient-to-br from-cyan-500/20 to-blue-500/20 rounded-xl flex items-center justify-center mx-auto mb-4">
                                    <span class="text-2xl font-bold text-cyan-600">1</span>
                                </div>
                                <h4 class="font-bold text-slate-800 mb-2">Discovery</h4>
                                <p class="text-sm text-slate-600">Understanding your business, requirements, and current security state</p>
                            </div>
                            <div class="hidden md:block absolute top-1/2 -right-3 w-6 h-0.5 bg-gradient-to-r from-cyan-500/50 to-blue-500/50 z-0"></div>
                        </div>
                        
                        <div class="relative">
                            <div class="bg-white rounded-2xl p-6 border border-slate-200 shadow-lg text-center">
                                <div class="w-12 h-12 bg-gradient-to-br from-blue-500/20 to-indigo-500/20 rounded-xl flex items-center justify-center mx-auto mb-4">
                                    <span class="text-2xl font-bold text-blue-600">2</span>
                                </div>
                                <h4 class="font-bold text-slate-800 mb-2">Assessment</h4>
                                <p class="text-sm text-slate-600">Comprehensive analysis of security gaps and vulnerabilities</p>
                            </div>
                            <div class="hidden md:block absolute top-1/2 -right-3 w-6 h-0.5 bg-gradient-to-r from-blue-500/50 to-indigo-500/50 z-0"></div>
                        </div>
                        
                        <div class="relative">
                            <div class="bg-white rounded-2xl p-6 border border-slate-200 shadow-lg text-center">
                                <div class="w-12 h-12 bg-gradient-to-br from-indigo-500/20 to-purple-500/20 rounded-xl flex items-center justify-center mx-auto mb-4">
                                    <span class="text-2xl font-bold text-indigo-600">3</span>
                                </div>
                                <h4 class="font-bold text-slate-800 mb-2">Strategy</h4>
                                <p class="text-sm text-slate-600">Developing tailored security roadmap and action plans</p>
                            </div>
                            <div class="hidden md:block absolute top-1/2 -right-3 w-6 h-0.5 bg-gradient-to-r from-indigo-500/50 to-purple-500/50 z-0"></div>
                        </div>
                        
                        <div class="bg-white rounded-2xl p-6 border border-slate-200 shadow-lg text-center">
                            <div class="w-12 h-12 bg-gradient-to-br from-purple-500/20 to-pink-500/20 rounded-xl flex items-center justify-center mx-auto mb-4">
                                <span class="text-2xl font-bold text-purple-600">4</span>
                            </div>
                            <h4 class="font-bold text-slate-800 mb-2">Implementation</h4>
                            <p class="text-sm text-slate-600">Executing solutions with ongoing support and monitoring</p>
                        </div>
                    </div>
                </section>
                
                <!-- Why Choose Us -->
                <section class="mb-20">
                    <div class="bg-gradient-to-br from-slate-50 to-blue-50 rounded-3xl p-12 border border-slate-200">
                        <div class="grid lg:grid-cols-2 gap-12 items-center">
                            <div>
                                <h2 class="text-3xl font-bold text-slate-800 mb-6">Why Choose NCS Lab?</h2>
                                <div class="space-y-4">
                                    <div class="flex items-start gap-4">
                                        <div class="w-10 h-10 bg-gradient-to-br from-primary/20 to-secondary/20 rounded-lg flex items-center justify-center flex-shrink-0">
                                            <i data-feather="award" class="text-primary" width="20" height="20"></i>
                                        </div>
                                        <div>
                                            <h4 class="font-bold text-slate-800 mb-1">Certified Experts</h4>
                                            <p class="text-slate-600 text-sm">Team of certified professionals with extensive industry experience</p>
                                        </div>
                                    </div>
                                    
                                    <div class="flex items-start gap-4">
                                        <div class="w-10 h-10 bg-gradient-to-br from-primary/20 to-secondary/20 rounded-lg flex items-center justify-center flex-shrink-0">
                                            <i data-feather="zap" class="text-primary" width="20" height="20"></i>
                                        </div>
                                        <div>
                                            <h4 class="font-bold text-slate-800 mb-1">Proven Methodology</h4>
                                            <p class="text-slate-600 text-sm">Structured approach based on industry standards and best practices</p>
                                        </div>
                                    </div>
                                    
                                    <div class="flex items-start gap-4">
                                        <div class="w-10 h-10 bg-gradient-to-br from-primary/20 to-secondary/20 rounded-lg flex items-center justify-center flex-shrink-0">
                                            <i data-feather="clock" class="text-primary" width="20" height="20"></i>
                                        </div>
                                        <div>
                                            <h4 class="font-bold text-slate-800 mb-1">Rapid Response</h4>
                                            <p class="text-slate-600 text-sm">Quick turnaround times with 24/7 support for critical issues</p>
                                        </div>
                                    </div>
                                    
                                    <div class="flex items-start gap-4">
                                        <div class="w-10 h-10 bg-gradient-to-br from-primary/20 to-secondary/20 rounded-lg flex items-center justify-center flex-shrink-0">
                                            <i data-feather="trending-up" class="text-primary" width="20" height="20"></i>
                                        </div>
                                        <div>
                                            <h4 class="font-bold text-slate-800 mb-1">Continuous Innovation</h4>
                                            <p class="text-slate-600 text-sm">Stay ahead of threats with cutting-edge research and solutions</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="relative">
                                <div class="absolute inset-0 bg-gradient-to-br from-primary/10 to-secondary/10 rounded-2xl blur-3xl"></div>
                                <img src="https://images.unsplash.com/photo-1552664730-d307ca884978?q=80&w=800" alt="Team Collaboration" class="relative rounded-2xl shadow-2xl">
                            </div>
                        </div>
                    </div>
                </section>
                
                <!-- Contact Form -->
                <section class="mb-20">
                    <div class="bg-white rounded-3xl p-12 border border-slate-200 shadow-xl">
                        <div class="max-w-3xl mx-auto">
                            <div class="text-center mb-12">
                                <h2 class="text-4xl font-bold text-slate-800 mb-4">Get in Touch</h2>
                                <p class="text-slate-600">Let's discuss how we can help secure your organization</p>
                            </div>
                            
                            <form class="space-y-6">
                                <div class="grid md:grid-cols-2 gap-6">
                                    <div>
                                        <label class="block text-sm font-semibold text-slate-700 mb-2">Full Name</label>
                                        <input type="text" class="w-full px-4 py-3 rounded-xl border border-slate-300 focus:border-primary focus:ring-2 focus:ring-primary/20 outline-none transition-all" placeholder="John Doe">
                                    </div>
                                    <div>
                                        <label class="block text-sm font-semibold text-slate-700 mb-2">Email Address</label>
                                        <input type="email" class="w-full px-4 py-3 rounded-xl border border-slate-300 focus:border-primary focus:ring-2 focus:ring-primary/20 outline-none transition-all" placeholder="john@example.com">
                                    </div>
                                </div>
                                
                                <div class="grid md:grid-cols-2 gap-6">
                                    <div>
                                        <label class="block text-sm font-semibold text-slate-700 mb-2">Company</label>
                                        <input type="text" class="w-full px-4 py-3 rounded-xl border border-slate-300 focus:border-primary focus:ring-2 focus:ring-primary/20 outline-none transition-all" placeholder="Your Company">
                                    </div>
                                    <div>
                                        <label class="block text-sm font-semibold text-slate-700 mb-2">Phone Number</label>
                                        <input type="tel" class="w-full px-4 py-3 rounded-xl border border-slate-300 focus:border-primary focus:ring-2 focus:ring-primary/20 outline-none transition-all" placeholder="+62 xxx xxxx xxxx">
                                    </div>
                                </div>
                                
                                <div>
                                    <label class="block text-sm font-semibold text-slate-700 mb-2">Service Interested In</label>
                                    <select class="w-full px-4 py-3 rounded-xl border border-slate-300 focus:border-primary focus:ring-2 focus:ring-primary/20 outline-none transition-all">
                                        <option>Security Assessment</option>
                                        <option>Penetration Testing</option>
                                        <option>Security Architecture</option>
                                        <option>Incident Response</option>
                                        <option>Compliance & Governance</option>
                                        <option>Security Training</option>
                                    </select>
                                </div>
                                
                                <div>
                                    <label class="block text-sm font-semibold text-slate-700 mb-2">Message</label>
                                    <textarea rows="5" class="w-full px-4 py-3 rounded-xl border border-slate-300 focus:border-primary focus:ring-2 focus:ring-primary/20 outline-none transition-all resize-none" placeholder="Tell us about your security needs..."></textarea>
                                </div>
                                
                                <button type="submit" class="w-full py-4 bg-gradient-to-r from-primary to-secondary text-white font-bold rounded-xl hover:shadow-2xl hover:scale-105 transition-all duration-300 flex items-center justify-center gap-2">
                                    <i data-feather="send" width="20" height="20"></i>
                                    Send Message
                                </button>
                            </form>
                        </div>
                    </div>
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
    </script>
    
    <!-- Shared Scripts -->
    @include('partials.shared-scripts')
</body>
</html>
