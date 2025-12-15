<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\ArchivesController;
use App\Http\Controllers\ContentController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\MembersController;
use App\Http\Controllers\LinksController;
use App\Http\Controllers\Content_CategoriesController;
use App\Http\Controllers\Admin_LogsController;


Route::get('/', function () {
    // Fetch featured publications (latest 4 research documents - only research and publication types)
    $featuredPublications = \App\Models\Archives::with('author')
        ->whereIn('type', ['research', 'publication'])
        ->orderBy('year', 'desc')
        ->orderBy('created_at', 'desc')
        ->take(4)
        ->get()
        ->map(function($archive) {
            // Map member names to their photo filenames
            $photoMap = [
                'Erfan Rohadi' => 'erfan.png',
                'Ade Ismail' => 'ade_ismail.png',
                'Vipkas' => 'vipkas.png',
                'Sofyan' => 'sofyan.png',
                'Meyti' => 'meyti.png',
            ];
            
            $photoFile = 'default-avatar.png';
            if ($archive->author) {
                foreach ($photoMap as $namePattern => $file) {
                    if (stripos($archive->author->member_name, $namePattern) !== false) {
                        $photoFile = $file;
                        break;
                    }
                }
            }
            
            return [
                'id' => $archive->id,
                'title' => $archive->title,
                'publication' => $archive->publication ?? 'Research Publication',
                'year' => $archive->year ?? date('Y'),
                'type' => $archive->type === 'research' ? 'Journal' : 'Conference',
                'category' => $archive->category ?? 'Research',
                'author_name' => $archive->author ? $archive->author->member_name : 'Admin',
                'author_photo' => asset('img/lab-member/' . $photoFile),
                'cover_image' => $archive->cover_image ? asset('storage/' . $archive->cover_image) : 'https://images.unsplash.com/photo-1550751827-4bd374c3f58b?w=400&q=80',
                'file_path' => $archive->file_path ? asset('storage/' . $archive->file_path) : null,
                'keywords' => $archive->keywords,
                'doi' => $archive->doi,
                'issn_journal' => $archive->issn_journal,
            ];
        });
    
    // Fetch gallery images from both agenda and past activities
    $galleryImages = \App\Models\Gallery::whereIn('gallery_type', ['agenda', 'past_activity'])
        ->whereNotNull('file_path')
        ->orderBy('created_at', 'desc')
        ->take(6)
        ->get()
        ->map(function($gallery) {
            return [
                'id' => $gallery->id,
                'title' => $gallery->title,
                'description' => $gallery->description ?? 'Laboratory activity',
                'image' => $gallery->file_path ? asset('storage/' . $gallery->file_path) : null,
                'type' => $gallery->gallery_type,
                'event_date' => $gallery->event_date,
                'location' => $gallery->location,
            ];
        });
    
    // Fetch latest articles from research documents for Knowledge Hub section
    $latestArticles = \App\Models\Archives::with('author')
        ->whereIn('type', ['research', 'publication', 'document'])
        ->orderBy('created_at', 'desc')
        ->take(4)
        ->get()
        ->map(function($archive) {
            // Map member names to their photo filenames
            $photoMap = [
                'Erfan Rohadi' => 'erfan.png',
                'Ade Ismail' => 'ade_ismail.png',
                'Vipkas' => 'vipkas.png',
                'Sofyan' => 'sofyan.png',
                'Meyti' => 'meyti.png',
            ];
            
            $photoFile = 'default-avatar.png';
            if ($archive->author) {
                foreach ($photoMap as $namePattern => $file) {
                    if (stripos($archive->author->member_name, $namePattern) !== false) {
                        $photoFile = $file;
                        break;
                    }
                }
            }
            
            // Generate reading time based on title length (rough estimate)
            $readingTime = max(5, min(15, strlen($archive->title) / 10 + rand(3, 8)));
            
            return [
                'id' => $archive->id,
                'title' => $archive->title,
                'description' => $archive->description ?? 'Expert insights and educational content on cybersecurity topics',
                'publication' => $archive->publication ?? 'Research Publication',
                'year' => $archive->year ?? date('Y'),
                'type' => $archive->type,
                'category' => $archive->category ?? 'Research',
                'author_name' => $archive->author ? $archive->author->member_name : 'Admin',
                'author_photo' => asset('img/lab-member/' . $photoFile),
                'cover_image' => $archive->cover_image ? asset('storage/' . $archive->cover_image) : 'https://images.unsplash.com/photo-1550751827-4bd374c3f58b?w=400&q=80',
                'file_path' => $archive->file_path ? asset('storage/' . $archive->file_path) : null,
                'reading_time' => $readingTime,
                'created_date' => $archive->created_at->format('M Y'),
            ];
        });
    
    return view('home', compact('featuredPublications', 'galleryImages', 'latestArticles'));
});
Route::get('/organization', function () {
    return view('organization');
});
Route::get('/vision-mission', function () {
    return view('vision-mission');
});
Route::get('/profile', function () {
    return view('profile');
});
Route::get('/login', function () {
    return view('login');
});

// Admin Login Routes
Route::get('/admin/login', function () {
    if (auth()->guard('web')->check()) {
        return redirect()->route('admins.index');
    }
    return view('admin.login');
})->name('login');

Route::post('/admin/login', function (\Illuminate\Http\Request $request) {
    $credentials = $request->validate([
        'username' => 'required',
        'password' => 'required',
    ]);

    $admin = \App\Models\Admin::where('username', $credentials['username'])->first();
    
    if ($admin && \Illuminate\Support\Facades\Hash::check($credentials['password'], $admin->password_hash)) {
        auth()->guard('web')->login($admin);
        $request->session()->regenerate();
        return redirect()->intended(route('admins.index'));
    }

    return back()->withErrors([
        'username' => 'Wrong username or password.',
    ])->onlyInput('username');
})->name('admin.login.post');
Route::get('/logo', function () {
    return view('logo');
});

// Helper function to get all articles with full content
function getAllArticles() {
    return [
        [
            'slug' => 'understanding-network-segmentation',
            'title' => 'Understanding Network Segmentation in Modern Infrastructure',
            'excerpt' => 'Learn how network segmentation plays a crucial role in preventing lateral movement of threats across enterprise networks. This comprehensive guide covers implementation strategies, best practices, and real-world case studies.',
            'image' => 'https://images.unsplash.com/photo-1558494949-ef010cbdcc31?q=80&w=800',
            'category' => 'Best Practices',
            'author' => 'Erfan Rohadi, Ph.D.',
            'author_position' => 'Laboratory Head',
            'author_photo' => asset('img/lab-member/erfan.png'),
            'author_bio' => 'Dr. Erfan Rohadi is a distinguished academic and researcher leading the Network & Cyber Security Laboratory at Politeknik Negeri Malang.',
            'date' => 'Nov 15, 2024',
            'read_time' => '8 min read',
            'tags' => ['Network Security', 'Best Practices', 'Infrastructure', 'Security Architecture'],
            'content' => '
                <p>Network segmentation is a fundamental security strategy that divides a computer network into smaller, isolated segments. This approach significantly reduces the attack surface and limits the potential damage from security breaches.</p>
                
                <h2>Why Network Segmentation Matters</h2>
                <p>In modern enterprise environments, a flat network architecture poses significant security risks. When all systems can communicate freely, a single compromised device can provide attackers with access to your entire network infrastructure.</p>
                
                <blockquote>Network segmentation is not just about security—it\'s about building resilient infrastructure that can withstand and contain security incidents.</blockquote>
                
                <h2>Key Benefits of Network Segmentation</h2>
                <ul>
                    <li><strong>Reduced Attack Surface:</strong> Limiting communication paths between segments minimizes potential entry points for attackers</li>
                    <li><strong>Containment:</strong> Security breaches are confined to specific segments, preventing lateral movement</li>
                    <li><strong>Improved Performance:</strong> Reduced broadcast traffic and optimized routing enhance network efficiency</li>
                    <li><strong>Compliance:</strong> Many regulations require network segmentation for sensitive data protection</li>
                    <li><strong>Better Monitoring:</strong> Segmentation enables more focused security monitoring and anomaly detection</li>
                </ul>
                
                <h2>Implementation Strategies</h2>
                <h3>1. Physical Segmentation</h3>
                <p>Physical segmentation involves using separate hardware devices like routers and switches to create distinct network segments. While highly secure, this approach can be costly and inflexible.</p>
                
                <h3>2. Virtual Segmentation (VLANs)</h3>
                <p>Virtual LANs provide logical separation using existing network infrastructure. VLANs offer flexibility and cost-effectiveness while maintaining strong security boundaries.</p>
                
                <h3>3. Software-Defined Segmentation</h3>
                <p>Modern SDN technologies enable dynamic, policy-based segmentation that can adapt to changing security requirements. This approach provides the most flexibility and granular control.</p>
                
                <h2>Best Practices for Network Segmentation</h2>
                <p>When implementing network segmentation, consider these essential practices:</p>
                <ol>
                    <li>Start with a comprehensive network inventory and traffic analysis</li>
                    <li>Define clear security zones based on data sensitivity and access requirements</li>
                    <li>Implement zero-trust principles between segments</li>
                    <li>Use next-generation firewalls for inter-segment communication</li>
                    <li>Regularly audit and update segmentation policies</li>
                    <li>Monitor cross-segment traffic for anomalies</li>
                </ol>
                
                <h2>Common Challenges and Solutions</h2>
                <p>Organizations often face challenges when implementing network segmentation:</p>
                <ul>
                    <li><strong>Legacy Applications:</strong> Older systems may require extensive communication across segments. Consider application modernization or implementing application-aware firewalls.</li>
                    <li><strong>Performance Impact:</strong> Excessive inspection can slow network traffic. Use hardware acceleration and optimize firewall rules.</li>
                    <li><strong>Complexity:</strong> Managing multiple segments increases operational overhead. Implement automation and centralized management tools.</li>
                </ul>
                
                <h2>Conclusion</h2>
                <p>Network segmentation remains one of the most effective security controls for protecting modern infrastructure. By implementing proper segmentation strategies and following best practices, organizations can significantly improve their security posture and resilience against cyber threats.</p>
            ',
        ],
        [
            'slug' => 'zero-trust-security-model',
            'title' => 'Zero Trust Security Model: A Complete Guide',
            'excerpt' => 'Discover the principles of zero trust security and how to implement it in your organization. From architecture design to policy enforcement, learn everything you need to know about this modern security paradigm.',
            'image' => 'https://images.unsplash.com/photo-1563986768494-4dee2763ff3f?q=80&w=800',
            'category' => 'Strategy',
            'author' => 'Vipkas Al Hadid Firdaus',
            'author_position' => 'Researcher',
            'author_photo' => asset('img/lab-member/vipkas.png'),
            'author_bio' => 'Vipkas Al Hadid Firdaus specializes in network security and cloud infrastructure at Politeknik Negeri Malang.',
            'date' => 'Oct 28, 2024',
            'read_time' => '12 min read',
            'tags' => ['Zero Trust', 'Security Strategy', 'Network Architecture', 'Access Control'],
            'content' => '<p>Zero Trust is a security framework that requires all users, whether inside or outside the organization\'s network, to be authenticated, authorized, and continuously validated before being granted access to applications and data.</p><h2>Core Principles</h2><p>The Zero Trust model is built on several key principles that fundamentally change how we approach network security...</p>',
        ],
        [
            'slug' => 'incident-response-planning-smes',
            'title' => 'Incident Response Planning for SMEs',
            'excerpt' => 'Essential steps for small and medium enterprises to prepare for and respond to security incidents. Learn how to build an effective incident response team and establish clear protocols.',
            'image' => 'https://images.unsplash.com/photo-1504868584819-f8e8b4b6d7e3?q=80&w=800',
            'category' => 'Incident Response',
            'author' => 'Meyti Eka Apriyani',
            'author_position' => 'Researcher',
            'author_photo' => asset('img/lab-member/meyti.png'),
            'author_bio' => 'Meyti Eka Apriyani is an expert in digital forensics and incident response at Politeknik Negeri Malang.',
            'date' => 'Sep 20, 2024',
            'read_time' => '10 min read',
            'tags' => ['Incident Response', 'SME Security', 'Best Practices', 'Crisis Management'],
            'content' => '<p>Small and medium enterprises often lack the resources for dedicated security teams, but they still face significant cyber threats.</p>',
        ],
        [
            'slug' => 'emerging-threats-2024',
            'title' => 'Emerging Threats in 2024: What You Need to Know',
            'excerpt' => 'An overview of the latest cybersecurity threats and trends that organizations should monitor. Stay ahead of attackers with insights into AI-powered attacks, supply chain vulnerabilities, and more.',
            'image' => 'https://images.unsplash.com/photo-1550751827-4bd374c3f58b?q=80&w=800',
            'category' => 'Threats',
            'author' => 'Ade Ismail',
            'author_position' => 'Researcher',
            'author_photo' => asset('img/lab-member/ade_ismail.png'),
            'author_bio' => 'Ade Ismail is a cybersecurity researcher specializing in threat intelligence and penetration testing.',
            'date' => 'Aug 12, 2024',
            'read_time' => '15 min read',
            'tags' => ['Threat Intelligence', 'Cyber Threats', 'Security Trends', 'AI Security'],
            'content' => '<p>The threat landscape continues to evolve at a rapid pace. Understanding emerging threats is crucial for organizations.</p>',
        ],
        [
            'slug' => 'building-secure-apis',
            'title' => 'Building Secure APIs: Developer\'s Guide',
            'excerpt' => 'A comprehensive guide to API security covering authentication, authorization, rate limiting, and common vulnerabilities. Essential reading for developers building modern applications.',
            'image' => 'https://images.unsplash.com/photo-1461749280684-dccba630e2f6?q=80&w=800',
            'category' => 'Best Practices',
            'author' => 'Sofyan Noor Arief',
            'author_position' => 'Researcher',
            'author_photo' => asset('img/lab-member/sofyan.png'),
            'author_bio' => 'Sofyan Noor Arief focuses on application security and secure software development practices.',
            'date' => 'Jul 30, 2024',
            'read_time' => '14 min read',
            'tags' => ['API Security', 'Application Security', 'Development', 'Authentication'],
            'content' => '<p>APIs are the backbone of modern applications, but they also represent significant security risks if not properly secured.</p>',
        ],
        [
            'slug' => 'cloud-security-advanced',
            'title' => 'Cloud Security: Beyond the Basics',
            'excerpt' => 'Advanced cloud security strategies for protecting your infrastructure. Learn about identity management, data encryption, compliance requirements, and security monitoring in cloud environments.',
            'image' => 'https://images.unsplash.com/photo-1639322537228-f710d846310a?q=80&w=800',
            'category' => 'Strategy',
            'author' => 'Erfan Rohadi, Ph.D.',
            'author_position' => 'Laboratory Head',
            'author_photo' => asset('img/lab-member/erfan.png'),
            'author_bio' => 'Dr. Erfan Rohadi is a distinguished academic and researcher leading the Network & Cyber Security Laboratory at Politeknik Negeri Malang.',
            'date' => 'Jun 18, 2024',
            'read_time' => '11 min read',
            'tags' => ['Cloud Security', 'Infrastructure', 'Compliance', 'Data Protection'],
            'content' => '<p>Cloud computing offers tremendous benefits, but it also introduces new security challenges.</p>',
        ],
        [
            'slug' => 'penetration-testing-methodologies',
            'title' => 'Penetration Testing Methodologies Explained',
            'excerpt' => 'Understanding different approaches to penetration testing from black box to white box testing. Learn when to use each methodology and what to expect from professional security assessments.',
            'image' => 'https://images.unsplash.com/photo-1550751827-4bd374c3f58b?q=80&w=800',
            'category' => 'Security Tools',
            'author' => 'Ade Ismail',
            'author_position' => 'Researcher',
            'author_photo' => asset('img/lab-member/ade_ismail.png'),
            'author_bio' => 'Ade Ismail is a cybersecurity researcher specializing in threat intelligence and penetration testing.',
            'date' => 'May 25, 2024',
            'read_time' => '13 min read',
            'tags' => ['Penetration Testing', 'Security Assessment', 'Testing', 'Ethical Hacking'],
            'content' => '<p>Penetration testing is a critical component of a comprehensive security program.</p>',
        ],
        [
            'slug' => 'securing-iot-devices',
            'title' => 'Securing IoT Devices in Enterprise Networks',
            'excerpt' => 'Best practices for managing and securing Internet of Things devices in corporate environments. From device discovery to network segmentation and monitoring strategies.',
            'image' => 'https://images.unsplash.com/photo-1558002038-1055907df827?q=80&w=800',
            'category' => 'Best Practices',
            'author' => 'Vipkas Al Hadid Firdaus',
            'author_position' => 'Researcher',
            'author_photo' => asset('img/lab-member/vipkas.png'),
            'author_bio' => 'Vipkas Al Hadid Firdaus specializes in network security and cloud infrastructure at Politeknik Negeri Malang.',
            'date' => 'Apr 10, 2024',
            'read_time' => '9 min read',
            'tags' => ['IoT Security', 'Device Management', 'Network Security', 'Enterprise'],
            'content' => '<p>The proliferation of IoT devices in enterprise environments creates new security challenges.</p>',
        ],
        [
            'slug' => 'digital-forensics-cyber-crimes',
            'title' => 'Digital Forensics: Investigating Modern Cyber Crimes',
            'excerpt' => 'Techniques and tools for digital forensics investigations. Learn how cybersecurity professionals analyze digital evidence and track down threat actors.',
            'image' => 'https://images.unsplash.com/photo-1512941937669-90a1b58e7e9c?q=80&w=800',
            'category' => 'Incident Response',
            'author' => 'Meyti Eka Apriyani',
            'author_position' => 'Researcher',
            'author_photo' => asset('img/lab-member/meyti.png'),
            'author_bio' => 'Meyti Eka Apriyani is an expert in digital forensics and incident response at Politeknik Negeri Malang.',
            'date' => 'Mar 15, 2024',
            'read_time' => '16 min read',
            'tags' => ['Digital Forensics', 'Investigation', 'Cyber Crime', 'Evidence Analysis'],
            'content' => '<p>Digital forensics plays a crucial role in investigating cyber crimes and security incidents.</p>',
        ],
    ];
}

// Articles Route
Route::get('/articles', function () {
    $articles = getAllArticles();
    return view('articles', compact('articles'));
});

// Article Detail Route
Route::get('/article/{slug}', function ($slug) {
    $allArticles = getAllArticles();
    
    // Find the article by slug
    $article = collect($allArticles)->firstWhere('slug', $slug);
    
    if (!$article) {
        abort(404);
    }
    
    // Get related articles (same category, exclude current)
    $relatedArticles = collect($allArticles)
        ->where('category', $article['category'])
        ->where('slug', '!=', $slug)
        ->take(3)
        ->toArray();
    
    return view('article-detail', compact('article', 'relatedArticles'));
});

// Past Activities Route
Route::get('/activities', function () {
    $activities = \App\Models\Gallery::where('gallery_type', 'past_activity')
        ->orderBy('event_date', 'desc')
        ->get();
    return view('past-activities', compact('activities'));
});

// Agenda Route
Route::get('/agenda', function () {
    $agendas = \App\Models\Gallery::where('gallery_type', 'agenda')
        ->where('event_status', '!=', 'completed')
        ->orderBy('event_date', 'asc')
        ->get();
    return view('agenda', compact('agendas'));
});

// Infrastructure Route
Route::get('/infrastructure', function () {
    return view('infrastructure');
});

// Consulting Route
Route::get('/consulting', function () {
    return view('consulting');
});

// Community Service Route
Route::get('/community-service', function () {
    $events = \App\Models\CommunityService::orderBy('date', 'desc')
        ->get()
        ->map(function($service) {
            return [
                'title' => $service->title,
                'description' => $service->description,
                'date' => $service->date->format('Y-m-d'),
                'day' => $service->date->format('d'),
                'month' => $service->date->format('m'),
                'month_name' => $service->date->format('M'),
                'year' => $service->date->format('Y'),
                'location' => $service->location,
                'participants' => $service->participants,
                'category' => $service->category,
                'category_color' => 'blue', // Default color since we removed the field
                'status' => $service->status,
                'image' => $service->image ? asset('storage/' . $service->image) : 'https://images.unsplash.com/photo-1517245386807-bb43f82c33c4?w=600&q=80',
            ];
        })
        ->toArray();
    
    return view('community-service', compact('events'));
});

// Research Documents Route
Route::get('/research-documents', function () {
    // Fetch all archives (research, publication, and documents)
    $archives = \App\Models\Archives::with('author')
        ->orderBy('year', 'desc')
        ->get();

    $publications = $archives->map(function($archive) {
        // Map member names to their photo filenames
        $photoMap = [
            'Erfan Rohadi' => 'erfan.png',
            'Ade Ismail' => 'ade_ismail.png',
            'Vipkas' => 'vipkas.png',
            'Sofyan' => 'sofyan.png',
            'Meyti' => 'meyti.png',
        ];
        
        // Determine author photo
        $authorPhoto = 'https://ui-avatars.com/api/?name=Admin&background=66bbf2&color=fff&size=200&bold=true';
        
        if ($archive->author) {
            foreach ($photoMap as $namePattern => $file) {
                if (stripos($archive->author->member_name, $namePattern) !== false) {
                    $authorPhoto = asset('img/lab-member/' . $file);
                    break;
                }
            }
        }
        
        return [
            'id' => $archive->id,
            'title' => $archive->title,
            'publication' => $archive->publication ?? 'Research Publication',
            'year' => $archive->year ?? date('Y'),
            'cover' => $archive->cover_image ? asset('storage/' . $archive->cover_image) : 'https://images.unsplash.com/photo-1550751827-4bd374c3f58b?w=400&q=80',
            'author_name' => $archive->author ? $archive->author->member_name : 'Admin',
            'author_position' => $archive->author ? $archive->author->member_role : 'Administrator',
            'author_photo' => $authorPhoto,
            'file_path' => $archive->file_path ? asset('storage/' . $archive->file_path) : null,
            'keywords' => $archive->keywords,
            'doi' => $archive->doi,
            'issn_journal' => $archive->issn_journal,
        ];
    })->toArray();

    return view('research-documents', compact('publications'));
});

// Helper function to get member URL
if (!function_exists('memberUrl')) {
    function memberUrl($slug) {
        return url("/member/{$slug}");
    }
}

// Member Detail Route
Route::get('/member/{slug}', function ($slug) {
    // Find member by slug
    $member = \App\Models\Members::where('slug', $slug)->firstOrFail();
    
    // Map member names to photo files
    $photoMap = [
        'Erfan Rohadi, ST., M.Eng., Ph.D.' => asset('img/lab-member/erfan.png'),
        'Ade Ismail, S.Kom., M.TI' => asset('img/lab-member/ade_ismail.png'),
        'Vipkas Al Hadid Firdaus, ST., MT' => asset('img/lab-member/vipkas.png'),
        'Sofyan Noor Arief, S.ST., M.Kom.' => asset('img/lab-member/sofyan.png'),
        'Meyti Eka Apriyani, ST., MT.' => asset('img/lab-member/meyti.png'),
    ];
    
// Skills data for each member
    $skillsMap = [
        'Erfan Rohadi, ST., M.Eng., Ph.D.' => ['Cybersecurity Leadership', 'Research Management', 'Network Security', 'Security Architecture', 'Academic Research', 'Critical Infrastructure Protection', 'Security Policy Development'],
        'Ade Ismail, S.Kom., M.TI' => ['Penetration Testing', 'Network Security', 'Malware Analysis', 'Security Audit', 'Cryptography', 'Vulnerability Assessment', 'Threat Intelligence', 'Security Testing'],
        'Vipkas Al Hadid Firdaus, ST., MT' => ['Network Administration', 'Cloud Security', 'System Architecture', 'Security Operations', 'Incident Response', 'Enterprise Security', 'Network Design', 'Infrastructure Management'],
        'Sofyan Noor Arief, S.ST., M.Kom.' => ['Application Security', 'Secure Coding', 'Security Testing', 'DevSecOps', 'Code Review', 'Software Development', 'Security Assessment', 'CI/CD Security'],
        'Meyti Eka Apriyani, ST., MT.' => ['Digital Forensics', 'Incident Response', 'Malware Analysis', 'Threat Intelligence', 'Security Investigation', 'Evidence Collection', 'Forensic Tools', 'Cybercrime Investigation'],
    ];

    // Contact variations for each member (use database if available, fallback to hardcoded)
    $contactVariations = [];
    if ($member->name_variations || $member->email_variations || $member->phone_variations || $member->social_links) {
        $contactVariations = [
            'names' => $member->name_variations ?? [],
            'emails' => $member->email_variations ?? [],
            'phones' => $member->phone_variations ?? [],
            'social_links' => $member->social_links ?? [],
        ];
    } else {
        // Fallback hardcoded variations
        $contactMap = [
            'Erfan Rohadi, ST., M.Eng., Ph.D.' => [
                'names' => ['Dr. Erfan Rohadi', 'Erfan Rohadi Ph.D.', 'Prof. Erfan Rohadi'],
                'emails' => ['erfan.rohadi@polinema.ac.id', 'erfan@ncs-lab.polinema.ac.id', 'dr.erfan@polinema.ac.id'],
                'phones' => ['+62 341 404424', '+62-813-3333-4444', '+62341404424'],
                'social_links' => ['linkedin' => 'https://linkedin.com/in/erfan-rohadi', 'github' => 'https://github.com/erfanrohadi'],
            ],
            'Ade Ismail, S.Kom., M.TI' => [
                'names' => ['Ade Ismail M.TI', 'Ade Ismail S.Kom.', 'Ade Ismail Penetration Tester'],
                'emails' => ['ade.ismail@polinema.ac.id', 'ade.ismail@ncs-lab.polinema.ac.id', 'adeismail@polinema.ac.id'],
                'phones' => ['+62 341 404425', '+62-812-5555-6666', '+62341404425'],
                'social_links' => ['linkedin' => 'https://linkedin.com/in/ade-ismail', 'github' => 'https://github.com/adeismail'],
            ],
            'Vipkas Al Hadid Firdaus, ST., MT' => [
                'names' => ['Vipkas Firdaus MT', 'Vipkas Al Hadid', 'Vipkas Network Security'],
                'emails' => ['vipkas.firdaus@polinema.ac.id', 'vipkas@ncs-lab.polinema.ac.id', 'vipkasfirdaus@polinema.ac.id'],
                'phones' => ['+62 341 404426', '+62-813-7777-8888', '+62341404426'],
                'social_links' => ['linkedin' => 'https://linkedin.com/in/vipkas-firdaus', 'github' => 'https://github.com/vipkas'],
            ],
            'Sofyan Noor Arief, S.ST., M.Kom.' => [
                'names' => ['Sofyan Arief M.Kom', 'Sofyan Noor Arief', 'Sofyan App Security'],
                'emails' => ['sofyan.arief@polinema.ac.id', 'sofyan@ncs-lab.polinema.ac.id', 'sofyanarief@polinema.ac.id'],
                'phones' => ['+62 341 404427', '+62-811-9999-0000', '+62341404427'],
                'social_links' => ['linkedin' => 'https://linkedin.com/in/sofyan-arief', 'github' => 'https://github.com/sofyanarief'],
            ],
            'Meyti Eka Apriyani, ST., MT.' => [
                'names' => ['Meyti Apriyani MT', 'Meyti Eka', 'Meyti Digital Forensics'],
                'emails' => ['meyti.apriyani@polinema.ac.id', 'meyti@ncs-lab.polinema.ac.id', 'meytiapriyani@polinema.ac.id'],
                'phones' => ['+62 341 404428', '+62-815-1111-2222', '+62341404428'],
                'social_links' => ['linkedin' => 'https://linkedin.com/in/meyti-apriyani', 'github' => 'https://github.com/meytiapriyani'],
            ],
        ];
        $contactVariations = $contactMap[$member->member_name] ?? [
            'names' => [], 'emails' => [], 'phones' => [], 'social_links' => []
        ];
    }

    // Get member's research publications from archives table
    $memberPublications = \App\Models\Archives::where('author_id', $member->id)
        ->where('type', 'research')
        ->orderBy('year', 'desc')
        ->get()
        ->map(function ($archive) {
            $authorPhoto = null;
            if ($archive->author && $archive->author->member_name) {
                $photoMap = [
                    'Erfan Rohadi, ST., M.Eng., Ph.D.' => asset('img/lab-member/erfan.png'),
                    'Ade Ismail, S.Kom., M.TI' => asset('img/lab-member/ade_ismail.png'),
                    'Vipkas Al Hadid Firdaus, ST., MT' => asset('img/lab-member/vipkas.png'),
                    'Sofyan Noor Arief, S.ST., M.Kom.' => asset('img/lab-member/sofyan.png'),
                    'Meyti Eka Apriyani, ST., MT.' => asset('img/lab-member/meyti.png'),
                ];
                $authorPhoto = $photoMap[$archive->author->member_name] ?? asset('img/lab-member/default-avatar.png');
            }
            
            return [
                'title' => $archive->title,
                'publication' => $archive->publication ?? 'Research Publication',
                'year' => $archive->year ?? date('Y'),
                'cover' => $archive->cover_image ? asset('storage/' . $archive->cover_image) : 'https://images.unsplash.com/photo-1550751827-4bd374c3f58b?w=400&q=80',
                'author_name' => $archive->author ? $archive->author->member_name : 'Admin',
                'author_position' => $archive->author ? $archive->author->member_role : 'Administrator',
                'author_photo' => $authorPhoto,
                'file_path' => $archive->file_path ? asset('storage/' . $archive->file_path) : null,
                'keywords' => $archive->keywords,
                'doi' => $archive->doi,
                'issn_journal' => $archive->issn_journal,
            ];
        });

    // Map member data to expected format
    $memberData = [
        'name' => $member->member_name,
        'position' => $member->member_role,
        'email' => $member->member_email,
        'phone' => $member->member_phone,
        'nip' => $member->nip,
        'photo' => $photoMap[$member->member_name] ?? asset('img/lab-member/default-avatar.png'),
        'skills' => $skillsMap[$member->member_name] ?? [],
        'biography' => $member->biography ?? '<p>' . $member->member_name . ' is a valued member of our Network & Cyber Security Laboratory team, serving as ' . $member->member_role . '.</p><p>For more detailed information about this member\'s background, research interests, and contributions, please contact them directly using the provided contact information.</p>',
        'education' => is_string($member->education) ? json_decode($member->education, true) : [],
        'research' => $memberPublications->toArray(),
        'projects' => is_string($member->projects) ? json_decode($member->projects, true) : [],
        'name_variations' => $contactVariations['names'] ?? [],
        'email_variations' => $contactVariations['emails'] ?? [],
        'phone_variations' => $contactVariations['phones'] ?? [],
        'linkedin' => $contactVariations['social_links']['linkedin'] ?? null,
        'github' => $contactVariations['social_links']['github'] ?? null,
    ];
    
    return view('member-detail', ['member' => $memberData]);
});

// Logout Routes
Route::post('/logout', function () {
    auth()->guard('web')->logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();
    return redirect()->route('login');
})->name('logout')->middleware('auth');

// Admin Panel Routes (with authentication middleware)
Route::prefix('admin')->middleware(['auth'])->group(function () {
    // Dashboard - accessible by all authenticated users
    Route::get('/', [AdminController::class, 'dashboard'])->name('admins.index');
    
    // Superadmin only routes
    Route::middleware(['role:superadmin'])->group(function () {
        // Administrators Management - only superadmin can manage other admins
        Route::resource('administrators', AdminController::class)->names([
            'index' => 'administrators.index',
            'create' => 'administrators.create',
            'store' => 'administrators.store',
            'show' => 'administrators.show',
            'edit' => 'administrators.edit',
            'update' => 'administrators.update',
            'destroy' => 'administrators.destroy',
        ]);
        
        // Members Management - only superadmin can manage members
        Route::resource('members', MembersController::class);
        
        // Categories Management - only superadmin can manage categories
        Route::resource('categories', CategoriesController::class);
        
        // Links Management - only superadmin can manage links
        Route::resource('links', LinksController::class);
        
        // Admin Logs - only superadmin can view and manage logs
        Route::resource('admin_logs', Admin_LogsController::class)->except(['create', 'store', 'edit', 'update']);
        Route::delete('admin_logs/destroy-all', [Admin_LogsController::class, 'destroyAll'])->name('admin_logs.destroyAll');
        
        // Consultations Management - only superadmin can manage consultations
        Route::resource('consultations', \App\Http\Controllers\ConsultationController::class)->except(['create', 'edit']);
    });
    
    // Admin routes - accessible by both admin and superadmin
    Route::middleware(['role:admin'])->group(function () {
        // Gallery Management - admins can manage galleries (their own content)
        Route::resource('galleries', GalleryController::class);
        
        // Archives Management - admins can manage archives (their own research)
        Route::resource('archives', ArchivesController::class);
        
        // Community Service Management - admins can manage community services (their own content)
        Route::resource('community-services', \App\Http\Controllers\CommunityServiceController::class);
        
        // Content Management - admins can manage content (Hidden - not used)
        // Route::resource('contents', ContentController::class);
        
        // Profile Management - admins can edit their own profile
        Route::get('profile', [AdminController::class, 'profile'])->name('admin.profile');
        Route::put('profile', [AdminController::class, 'updateProfile'])->name('admin.profile.update');
    });
});

// Public Consultation Submission
Route::post('/consultation/submit', [\App\Http\Controllers\ConsultationController::class, 'store'])->name('consultation.submit');