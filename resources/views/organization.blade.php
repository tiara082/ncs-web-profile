<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Organization Structure - Network & Cyber Security Lab</title>
    <meta name="description" content="Organization structure of Network and Cyber Security Laboratory at Malang State Polytechnic"/>
    <link rel="icon" type="image/x-icon" href="/favicon.ico"/>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/feather-icons"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com"/>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin/>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet"/>
    
    @include('partials.custom-scrollbar-styles')
    @include('partials.shared-styles')
    
    <!-- ApexCharts -->
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    
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
                    animation: {
                        'float': 'float 6s ease-in-out infinite',
                        'fade-in-up': 'fadeInUp 0.6s ease-out',
                        'pulse': 'pulse 4s cubic-bezier(0.4, 0, 0.6, 1) infinite',
                        'shimmer': 'shimmer 3s linear infinite',
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
                        shimmer: {
                            '0%': { backgroundPosition: '-200% center' },
                            '100%': { backgroundPosition: '200% center' },
                        },
                    },
                }
            }
        }
    </script>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: 'Poppins', sans-serif;
        }
        .hover-lift {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .hover-lift:hover {
            transform: translateY(-4px);
        }
        
        /* Mobile Menu */
        .mobile-menu {
            transform: translateX(100%);
            transition: transform 0.3s ease-in-out;
        }
        .mobile-menu.active {
            transform: translateX(0);
        }

        /* Remove white background from Polinema logo */
        .logo-polinema {
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            overflow: hidden;
            border-radius: 50%;
            padding: 1px;
        }
        .logo-polinema img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 50%;
        }

        /* Organization Chart Styles */
        .org-chart-container {
            padding: 20px;
        }
        
        /* Laboratory Head Card */
        .org-card-head {
            background: linear-gradient(to bottom, #ffffff, #f8fafc);
            border: 2px solid #e2e8f0;
            border-radius: 20px;
            padding: 32px 40px;
            text-align: center;
            transition: all 0.3s ease;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
            max-width: 400px;
        }
        
        .org-card-head:hover {
            transform: translateY(-4px);
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
            border-color: #66bbf2;
        }
        
        /* Researcher Cards */
        .org-card-researcher {
            background: white;
            border: 1.5px solid #e5e7eb;
            border-radius: 16px;
            padding: 24px 20px;
            text-align: center;
            transition: all 0.3s ease;
            box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.1), 0 1px 2px 0 rgba(0, 0, 0, 0.06);
        }
        
        .org-card-researcher:hover {
            transform: translateY(-4px);
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
            border-color: #66bbf2;
        }
        
        /* Avatar Styles */
        .org-avatar-container {
            position: relative;
            display: flex;
            justify-content: center;
            margin-bottom: 16px;
        }
        
        .org-avatar-img {
            width: 96px;
            height: 96px;
            border-radius: 50%;
            object-fit: cover;
            border: 4px solid #66bbf2;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
        }
        
        .org-avatar-badge {
            position: absolute;
            bottom: 0;
            right: calc(50% - 50px);
            background: white;
            border: 2px solid #66bbf2;
            border-radius: 50%;
            width: 28px;
            height: 28px;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        
        .org-avatar-container-small {
            display: flex;
            justify-content: center;
            margin-bottom: 12px;
        }
        
        .org-avatar-img-small {
            width: 72px;
            height: 72px;
            border-radius: 50%;
            object-fit: cover;
            border: 3px solid #e5e7eb;
            transition: all 0.3s ease;
        }
        
        .org-card-researcher:hover .org-avatar-img-small {
            border-color: #66bbf2;
        }
        
        /* Badges */
        .org-badge-head {
            display: inline-block;
            background: linear-gradient(135deg, #66bbf2, #3b82f6);
            color: white;
            padding: 8px 20px;
            border-radius: 20px;
            font-size: 11px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1.2px;
            margin-bottom: 12px;
            box-shadow: 0 2px 4px rgba(102, 187, 242, 0.3);
        }
        
        .org-badge-researcher {
            display: inline-block;
            background: #f1f5f9;
            color: #475569;
            padding: 6px 16px;
            border-radius: 16px;
            font-size: 10px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.8px;
            margin-bottom: 10px;
        }
        
        /* Names */
        .org-name-head {
            font-size: 20px;
            font-weight: 700;
            color: #0f172a;
            line-height: 1.4;
            margin-bottom: 8px;
        }
        
        .org-name-researcher {
            font-size: 15px;
            font-weight: 600;
            color: #1e293b;
            line-height: 1.3;
            margin-bottom: 8px;
        }
        
        /* Role Descriptions */
        .org-role {
            font-size: 13px;
            color: #64748b;
            line-height: 1.5;
        }
        
        .org-role-small {
            font-size: 12px;
            color: #64748b;
            line-height: 1.4;
        }
    </style>
</head>
<body class="bg-background text-foreground">
    @include('partials.scroll-progress')

    <!-- Sub-Header (Navbar + Hero for Organization) -->
    @include('partials.sub-header')

    <!-- Organization Chart Section -->
    <section class="relative py-20 px-4 sm:px-6 lg:px-8 bg-gradient-to-br from-background via-cyan-50/30 to-blue-50/20 overflow-hidden">
        <div class="absolute top-0 right-0 w-96 h-96 bg-primary/5 rounded-full blur-3xl animate-float"></div>
        <div class="absolute bottom-0 left-0 w-96 h-96 bg-blue-500/5 rounded-full blur-3xl animate-float" style="animation-delay: 2s"></div>
        
        <div class="max-w-7xl mx-auto relative z-10">
            <div class="text-center mb-12 animate-fade-in-up">
                <div class="inline-flex items-center gap-2 mb-6 text-primary font-bold">
                    <div class="h-1 w-8 bg-primary rounded-full"></div>
                    <span class="text-sm uppercase tracking-widest">Organizational Hierarchy</span>
                </div>
                <h2 class="text-4xl md:text-5xl font-bold bg-gradient-to-r from-primary via-secondary to-accent bg-clip-text text-transparent mb-4">Team Structure</h2>
                <p class="text-lg text-muted-foreground max-w-2xl mx-auto">Our dedicated team working together to advance cybersecurity research and education</p>
            </div>

            <!-- Organization Chart Container -->
            <div class="bg-white rounded-3xl border border-gray-200 p-12 shadow-lg overflow-x-auto">
                <div class="org-chart-container min-w-[900px]">
                    <!-- Level 1: Laboratory Head -->
                    <div class="flex justify-center mb-16">
                        <a href="/member/erfan-rohadi" class="org-card-head cursor-pointer">
                            <div class="org-avatar-container">
                                <img src="{{ asset('img/lab-member/erfan.png') }}" alt="Erfan Rohadi" class="org-avatar-img">
                                <div class="org-avatar-badge">
                                    <i data-feather="award" class="w-4 h-4 text-primary"></i>
                                </div>
                            </div>
                            <div class="org-badge-head">Laboratory Head</div>
                            <div class="org-name-head">Erfan Rohadi, ST., M.Eng., Ph.D.</div>
                            <div class="org-role">Leading strategic direction and research initiatives</div>
                        </a>
                    </div>

                    <!-- Connector Line -->
                    <div class="flex justify-center -mt-12 mb-8">
                        <div class="w-1 h-16 bg-primary rounded-full"></div>
                    </div>

                    <!-- Branch Container -->
                    <div class="flex justify-center mb-8">
                        <div class="relative w-full max-w-5xl">
                            <!-- Horizontal Line -->
                            <div class="absolute top-0 left-[12.5%] right-[12.5%] h-1 bg-primary rounded-full"></div>
                            
                            <!-- Vertical Lines to Cards -->
                            <div class="absolute top-0 left-[12.5%] w-1 h-16 bg-primary rounded-full"></div>
                            <div class="absolute top-0 left-[37.5%] w-1 h-16 bg-primary rounded-full"></div>
                            <div class="absolute top-0 left-[62.5%] w-1 h-16 bg-primary rounded-full"></div>
                            <div class="absolute top-0 left-[87.5%] w-1 h-16 bg-primary rounded-full"></div>
                        </div>
                    </div>

                    <!-- Level 2: Researchers -->
                    <div class="grid grid-cols-4 gap-6 max-w-6xl mx-auto pt-8">
                        <!-- Researcher 1 -->
                        <a href="/member/ade-ismail" class="org-card-researcher cursor-pointer">
                            <div class="org-avatar-container-small">
                                <img src="{{ asset('img/lab-member/ade_ismail.png') }}" alt="Ade Ismail" class="org-avatar-img-small">
                            </div>
                            <div class="org-badge-researcher">Researcher</div>
                            <div class="org-name-researcher">Ade Ismail, S.Kom., M.TI</div>
                            <div class="org-role-small">Cybersecurity research and development</div>
                        </a>

                        <!-- Researcher 2 -->
                        <a href="/member/vipkas-al-hadid-firdaus" class="org-card-researcher cursor-pointer">
                            <div class="org-avatar-container-small">
                                <img src="{{ asset('img/lab-member/vipkas.png') }}" alt="Vipkas Al Hadid Firdaus" class="org-avatar-img-small">
                            </div>
                            <div class="org-badge-researcher">Researcher</div>
                            <div class="org-name-researcher">Vipkas Al Hadid Firdaus, ST., MT</div>
                            <div class="org-role-small">Network security and administration</div>
                        </a>

                        <!-- Researcher 3 -->
                        <a href="/member/sofyan-noor-arief" class="org-card-researcher cursor-pointer">
                            <div class="org-avatar-container-small">
                                <img src="{{ asset('img/lab-member/sofyan.png') }}" alt="Sofyan Noor Arief" class="org-avatar-img-small">
                            </div>
                            <div class="org-badge-researcher">Researcher</div>
                            <div class="org-name-researcher">Sofyan Noor Arief, S.ST., M.Kom.</div>
                            <div class="org-role-small">System security and testing</div>
                        </a>

                        <!-- Researcher 4 -->
                        <a href="/member/meyti-eka-apriyani" class="org-card-researcher cursor-pointer">
                            <div class="org-avatar-container-small">
                                <img src="{{ asset('img/lab-member/meyti.png') }}" alt="Meyti Eka Apriyani" class="org-avatar-img-small">
                            </div>
                            <div class="org-badge-researcher">Researcher</div>
                            <div class="org-name-researcher">Meyti Eka Apriyani ST., MT.</div>
                            <div class="org-role-small">Digital forensics and incident response</div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer (from partial) -->
    @include('partials.footer')

    <!-- Back to Top (from partial) -->
    @include('partials.back-to-top')

    <script>
        // Mobile Menu Toggle (organization-specific script kept)
        const mobileMenuBtn = document.getElementById('mobile-menu-btn');
        const mobileMenu = document.getElementById('mobile-menu');
        const menuIcon = document.getElementById('menu-icon');
        const closeIcon = document.getElementById('close-icon');
        
        if (mobileMenuBtn) {
            mobileMenuBtn.addEventListener('click', () => {
                mobileMenu.classList.toggle('active');
                menuIcon.classList.toggle('hidden');
                closeIcon.classList.toggle('hidden');
            });
        }

        // Scroll Progress Bar handled by partial (partials/scroll-progress.blade.php)
    </script>

    <!-- Shared Scripts -->
    @include('partials.shared-scripts')
</body>
</html>
