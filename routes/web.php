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
    return view('home');
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
        'username' => 'Username atau password salah.',
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
    return view('past-activities');
});

// Agenda Route
Route::get('/agenda', function () {
    return view('agenda');
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
    $events = [
        [
            'title' => 'Workshop Keamanan Siber untuk UMKM',
            'description' => 'Pelatihan keamanan dasar bagi pelaku UMKM di Malang Raya untuk melindungi bisnis dari ancaman siber',
            'date' => '2024-11-15',
            'day' => '15',
            'month' => '11',
            'month_name' => 'Nov',
            'year' => '2024',
            'location' => 'Balai Kota Malang',
            'participants' => 85,
            'category' => 'workshop',
            'category_color' => 'blue',
            'status' => 'completed',
            'image' => 'https://images.unsplash.com/photo-1517245386807-bb43f82c33c4?w=600&q=80',
        ],
        [
            'title' => 'Seminar Literasi Digital untuk Pelajar',
            'description' => 'Sosialisasi penggunaan internet aman dan etis untuk siswa SMA/SMK se-Kota Malang',
            'date' => '2024-10-22',
            'day' => '22',
            'month' => '10',
            'month_name' => 'Okt',
            'year' => '2024',
            'location' => 'SMAN 1 Malang',
            'participants' => 250,
            'category' => 'seminar',
            'category_color' => 'purple',
            'status' => 'completed',
            'image' => 'https://images.unsplash.com/photo-1523580494863-6f3031224c94?w=600&q=80',
        ],
        [
            'title' => 'Pelatihan Incident Response untuk Instansi Pemerintah',
            'description' => 'Training penanganan insiden keamanan siber bagi IT staff pemerintah daerah',
            'date' => '2024-09-18',
            'day' => '18',
            'month' => '09',
            'month_name' => 'Sep',
            'year' => '2024',
            'location' => 'Diskominfo Kota Malang',
            'participants' => 45,
            'category' => 'training',
            'category_color' => 'green',
            'status' => 'completed',
            'image' => 'https://images.unsplash.com/photo-1552664730-d307ca884978?w=600&q=80',
        ],
        [
            'title' => 'Webinar Keamanan Data Pribadi',
            'description' => 'Edukasi perlindungan data pribadi sesuai UU PDP untuk masyarakat umum',
            'date' => '2024-08-12',
            'day' => '12',
            'month' => '08',
            'month_name' => 'Agt',
            'year' => '2024',
            'location' => 'Online via Zoom',
            'participants' => 320,
            'category' => 'webinar',
            'category_color' => 'orange',
            'status' => 'completed',
            'image' => 'https://images.unsplash.com/photo-1587825140708-dfaf72ae4b04?w=600&q=80',
        ],
        [
            'title' => 'Konsultasi Keamanan Jaringan untuk Sekolah',
            'description' => 'Pendampingan implementasi sistem keamanan jaringan untuk sekolah-sekolah',
            'date' => '2024-07-25',
            'day' => '25',
            'month' => '07',
            'month_name' => 'Jul',
            'year' => '2024',
            'location' => 'SMK Negeri 4 Malang',
            'participants' => 15,
            'category' => 'consultation',
            'category_color' => 'pink',
            'status' => 'completed',
            'image' => 'https://images.unsplash.com/photo-1454165804606-c3d57bc86b40?w=600&q=80',
        ],
        [
            'title' => 'Workshop Ethical Hacking untuk Mahasiswa',
            'description' => 'Pelatihan dasar penetration testing dan ethical hacking bagi mahasiswa IT',
            'date' => '2024-06-10',
            'day' => '10',
            'month' => '06',
            'month_name' => 'Jun',
            'year' => '2024',
            'location' => 'Polinema',
            'participants' => 120,
            'category' => 'workshop',
            'category_color' => 'blue',
            'status' => 'completed',
            'image' => 'https://images.unsplash.com/photo-1504639725590-34d0984388bd?w=600&q=80',
        ],
        [
            'title' => 'Seminar Teknologi Blockchain dan Keamanannya',
            'description' => 'Edukasi tentang teknologi blockchain dan aspek keamanan untuk masyarakat umum',
            'date' => '2024-05-15',
            'day' => '15',
            'month' => '05',
            'month_name' => 'Mei',
            'year' => '2024',
            'location' => 'Malang Creative Center',
            'participants' => 180,
            'category' => 'seminar',
            'category_color' => 'purple',
            'status' => 'completed',
            'image' => 'https://images.unsplash.com/photo-1639322537228-f710d846310a?w=600&q=80',
        ],
        [
            'title' => 'Training Forensik Digital untuk Aparat',
            'description' => 'Pelatihan digital forensics untuk aparat penegak hukum',
            'date' => '2024-04-08',
            'day' => '08',
            'month' => '04',
            'month_name' => 'Apr',
            'year' => '2024',
            'location' => 'Polda Jatim',
            'participants' => 35,
            'category' => 'training',
            'category_color' => 'green',
            'status' => 'completed',
            'image' => 'https://images.unsplash.com/photo-1451187580459-43490279c0fa?w=600&q=80',
        ],
        [
            'title' => 'Webinar IoT Security untuk Smart Home',
            'description' => 'Edukasi keamanan perangkat IoT dan smart home untuk rumah tangga',
            'date' => '2024-03-20',
            'day' => '20',
            'month' => '03',
            'month_name' => 'Mar',
            'year' => '2024',
            'location' => 'Online via YouTube Live',
            'participants' => 450,
            'category' => 'webinar',
            'category_color' => 'orange',
            'status' => 'completed',
            'image' => 'https://images.unsplash.com/photo-1558002038-1055907df827?w=600&q=80',
        ],
    ];
    
    return view('community-service', compact('events'));
});

// Research Documents Route
Route::get('/research-documents', function () {
    // Collect all publications from all members
    $members = [
        'erfan-rohadi' => [
            'name' => 'Erfan Rohadi, ST., M.Eng., Ph.D.',
            'position' => 'Laboratory Head',
            'photo' => 'img/lab-member/erfan.png',
            'research' => [
                ['title' => 'Next-Generation Intrusion Detection Using Deep Learning', 'publication' => 'IEEE Transactions on Network and Service Management', 'year' => '2024', 'cover' => 'https://images.unsplash.com/photo-1550751827-4bd374c3f58b?w=400&q=80'],
                ['title' => 'Quantum-Safe Cryptography for Critical Infrastructure', 'publication' => 'Nature Communications', 'year' => '2023', 'cover' => 'https://images.unsplash.com/photo-1526374965328-7f61d4dc18c5?w=400&q=80'],
                ['title' => 'Security Framework for Industrial IoT Systems', 'publication' => 'ACM Computing Surveys', 'year' => '2023', 'cover' => 'https://images.unsplash.com/photo-1518770660439-4636190af475?w=400&q=80'],
                ['title' => 'Behavioral Analytics for Insider Threat Detection', 'publication' => 'IEEE Security & Privacy', 'year' => '2022', 'cover' => 'https://images.unsplash.com/photo-1563986768609-322da13575f3?w=400&q=80'],
                ['title' => 'Zero Trust Architecture for Enterprise Networks', 'publication' => 'Journal of Network and Computer Applications', 'year' => '2021', 'cover' => 'https://images.unsplash.com/photo-1504639725590-34d0984388bd?w=400&q=80'],
            ],
        ],
        'ade-ismail' => [
            'name' => 'Ade Ismail, S.Kom., M.TI',
            'position' => 'Researcher',
            'photo' => 'img/lab-member/ade_ismail.png',
            'research' => [
                ['title' => 'Advanced Threat Detection in IoT Networks', 'publication' => 'IEEE Security & Privacy', 'year' => '2023', 'cover' => 'https://images.unsplash.com/photo-1573164713988-8665fc963095?w=400&q=80'],
                ['title' => 'Machine Learning Approaches for Intrusion Detection', 'publication' => 'Journal of Cybersecurity Research', 'year' => '2022', 'cover' => 'https://images.unsplash.com/photo-1555949963-ff9fe0c870eb?w=400&q=80'],
                ['title' => 'Blockchain-Based Security Framework for Smart Cities', 'publication' => 'International Conference on Cybersecurity', 'year' => '2021', 'cover' => 'https://images.unsplash.com/photo-1639322537228-f710d846310a?w=400&q=80'],
            ],
        ],
        'vipkas-al-hadid-firdaus' => [
            'name' => 'Vipkas Al Hadid Firdaus, ST., MT',
            'position' => 'Researcher',
            'photo' => 'img/lab-member/vipkas.png',
            'research' => [
                ['title' => 'Software-Defined Security for Data Centers', 'publication' => 'ACM Computing Surveys', 'year' => '2023', 'cover' => 'https://images.unsplash.com/photo-1558494949-ef010cbdcc31?w=400&q=80'],
                ['title' => 'Zero Trust Architecture Implementation Guide', 'publication' => 'Network Security Journal', 'year' => '2022', 'cover' => 'https://images.unsplash.com/photo-1484807352052-23338990c6c6?w=400&q=80'],
            ],
        ],
        'sofyan-noor-arief' => [
            'name' => 'Sofyan Noor Arief, S.ST., M.Kom.',
            'position' => 'Researcher',
            'photo' => 'img/lab-member/sofyan.png',
            'research' => [
                ['title' => 'Automated Security Testing in CI/CD Pipelines', 'publication' => 'DevOps Conference', 'year' => '2023', 'cover' => 'https://images.unsplash.com/photo-1461749280684-dccba630e2f6?w=400&q=80'],
            ],
        ],
        'meyti-eka-apriyani' => [
            'name' => 'Meyti Eka Apriyani ST., MT.',
            'position' => 'Researcher',
            'photo' => 'img/lab-member/meyti.png',
            'research' => [
                ['title' => 'Mobile Device Forensics in Criminal Investigations', 'publication' => 'Forensic Science International', 'year' => '2023', 'cover' => 'https://images.unsplash.com/photo-1512941937669-90a1b58e7e9c?w=400&q=80'],
                ['title' => 'Memory Forensics for Malware Detection', 'publication' => 'Digital Investigation Journal', 'year' => '2022', 'cover' => 'https://images.unsplash.com/photo-1516321318423-f06f85e504b3?w=400&q=80'],
            ],
        ],
    ];

    $publications = [];
    foreach ($members as $key => $member) {
        foreach ($member['research'] as $research) {
            $publications[] = [
                'title' => $research['title'],
                'publication' => $research['publication'],
                'year' => $research['year'],
                'cover' => $research['cover'],
                'author_name' => $member['name'],
                'author_position' => $member['position'],
                'author_photo' => asset($member['photo']),
            ];
        }
    }

    // Sort by year descending
    usort($publications, function($a, $b) {
        return $b['year'] <=> $a['year'];
    });

    return view('research-documents', compact('publications'));
});

// Member Detail Route
Route::get('/member/{slug}', function ($slug) {
    // Sample member data - this should come from database in production
    $members = [
        'erfan-rohadi' => [
            'name' => 'Erfan Rohadi, ST., M.Eng., Ph.D.',
            'position' => 'Laboratory Head',
            'nim' => 'NIP. 19750615 200012 1 001',
            'photo' => 'img/lab-member/erfan.png',
            'email' => 'erfan.rohadi@polinema.ac.id',
            'phone' => '+62 341 404424',
            'linkedin' => 'https://linkedin.com/in/erfanrohadi',
            'github' => 'https://github.com/erfanrohadi',
            'skills' => ['Cybersecurity Leadership', 'Research Management', 'Network Security', 'Security Architecture', 'Academic Research'],
            'biography' => '<p>Dr. Erfan Rohadi is a distinguished academic and researcher in the field of network and cybersecurity. With a Ph.D. in Computer Engineering, he leads the Network & Cyber Security Laboratory at Politeknik Negeri Malang, driving cutting-edge research and education initiatives.</p><p>His extensive research portfolio spans advanced threat detection, secure network design, and cybersecurity policy development. Under his leadership, the NCS Lab has become a center of excellence in cybersecurity research, producing numerous publications and training the next generation of security professionals.</p><p>Dr. Rohadi has collaborated with industry leaders and government agencies on critical infrastructure protection projects and has been instrumental in developing national cybersecurity frameworks.</p>',
            'education' => [
                ['degree' => 'Ph.D. in Computer Engineering', 'institution' => 'Institut Teknologi Bandung (ITB)', 'year' => '2015-2019'],
                ['degree' => 'Master of Engineering', 'institution' => 'Institut Teknologi Bandung (ITB)', 'year' => '2002-2004'],
                ['degree' => 'Bachelor of Engineering', 'institution' => 'Universitas Brawijaya', 'year' => '1994-1998'],
            ],
            'research' => [
                ['title' => 'Next-Generation Intrusion Detection Using Deep Learning', 'publication' => 'IEEE Transactions on Network and Service Management', 'year' => '2024'],
                ['title' => 'Quantum-Safe Cryptography for Critical Infrastructure', 'publication' => 'Nature Communications', 'year' => '2023'],
                ['title' => 'Security Framework for Industrial IoT Systems', 'publication' => 'ACM Computing Surveys', 'year' => '2023'],
                ['title' => 'Behavioral Analytics for Insider Threat Detection', 'publication' => 'IEEE Security & Privacy', 'year' => '2022'],
                ['title' => 'Zero Trust Architecture for Enterprise Networks', 'publication' => 'Journal of Network and Computer Applications', 'year' => '2021'],
            ],
            'projects' => [
                ['name' => 'National Cyber Defense Initiative', 'description' => 'Government cybersecurity enhancement program', 'link' => '#'],
                ['name' => 'Smart City Security Framework', 'description' => 'Comprehensive security for smart city infrastructure', 'link' => '#'],
                ['name' => 'AI-Powered Threat Intelligence', 'description' => 'Advanced threat detection and analysis platform', 'link' => '#'],
                ['name' => 'Secure IoT Ecosystem', 'description' => 'End-to-end security for IoT devices', 'link' => '#'],
                ['name' => 'Cybersecurity Training Platform', 'description' => 'Interactive learning environment for security professionals', 'link' => '#'],
                ['name' => 'Blockchain Security Audit Tool', 'description' => 'Automated security assessment for blockchain applications', 'link' => '#'],
            ],
        ],
        'ade-ismail' => [
            'name' => 'Ade Ismail, S.Kom., M.TI',
            'position' => 'Researcher',
            'nim' => 'NIP. 19850512 201203 1 003',
            'photo' => 'img/lab-member/ade_ismail.png',
            'email' => 'ade.ismail@polinema.ac.id',
            'phone' => '+62 341 404424',
            'linkedin' => 'https://linkedin.com/in/adeismail',
            'github' => 'https://github.com/adeismail',
            'skills' => ['Penetration Testing', 'Network Security', 'Malware Analysis', 'Security Audit', 'Cryptography'],
            'biography' => '<p>Ade Ismail is a dedicated cybersecurity researcher specializing in penetration testing and network security. With over 10 years of experience in the field, he has contributed significantly to various security research projects and publications.</p><p>His research focuses on advanced persistent threats, zero-day vulnerabilities, and developing innovative security solutions for complex network infrastructures. He is passionate about sharing knowledge and mentoring students in the field of cybersecurity.</p>',
            'education' => [
                ['degree' => 'Master of Information Technology', 'institution' => 'Institut Teknologi Sepuluh Nopember (ITS)', 'year' => '2010-2012'],
                ['degree' => 'Bachelor of Computer Science', 'institution' => 'Universitas Brawijaya', 'year' => '2003-2007'],
            ],
            'research' => [
                ['title' => 'Advanced Threat Detection in IoT Networks', 'publication' => 'IEEE Security & Privacy', 'year' => '2023'],
                ['title' => 'Machine Learning Approaches for Intrusion Detection', 'publication' => 'Journal of Cybersecurity Research', 'year' => '2022'],
                ['title' => 'Blockchain-Based Security Framework for Smart Cities', 'publication' => 'International Conference on Cybersecurity', 'year' => '2021'],
            ],
            'projects' => [
                ['name' => 'SecureNet Platform', 'description' => 'Enterprise network security monitoring system', 'link' => '#'],
                ['name' => 'ThreatHunter AI', 'description' => 'AI-powered threat detection tool', 'link' => '#'],
                ['name' => 'CyberShield', 'description' => 'Comprehensive security assessment framework', 'link' => '#'],
                ['name' => 'VulnScanner Pro', 'description' => 'Automated vulnerability scanning tool', 'link' => '#'],
            ],
        ],
        'vipkas-al-hadid-firdaus' => [
            'name' => 'Vipkas Al Hadid Firdaus, ST., MT',
            'position' => 'Researcher',
            'nim' => 'NIP. 19880724 201504 1 001',
            'photo' => 'img/lab-member/vipkas.png',
            'email' => 'vipkas.firdaus@polinema.ac.id',
            'phone' => '+62 341 404424',
            'linkedin' => 'https://linkedin.com/in/vipkasfirdaus',
            'skills' => ['Network Administration', 'Cloud Security', 'System Architecture', 'Security Operations', 'Incident Response'],
            'biography' => '<p>Vipkas Al Hadid Firdaus specializes in network security and cloud infrastructure. His expertise includes designing secure network architectures and implementing robust security operations centers.</p><p>He has led multiple projects in enterprise security implementation and has been instrumental in developing security frameworks for critical infrastructure protection.</p>',
            'education' => [
                ['degree' => 'Master of Engineering', 'institution' => 'Institut Teknologi Bandung (ITB)', 'year' => '2012-2014'],
                ['degree' => 'Bachelor of Engineering', 'institution' => 'Universitas Gadjah Mada', 'year' => '2006-2010'],
            ],
            'research' => [
                ['title' => 'Software-Defined Security for Data Centers', 'publication' => 'ACM Computing Surveys', 'year' => '2023'],
                ['title' => 'Zero Trust Architecture Implementation Guide', 'publication' => 'Network Security Journal', 'year' => '2022'],
            ],
            'projects' => [
                ['name' => 'CloudGuard', 'description' => 'Multi-cloud security management platform', 'link' => '#'],
                ['name' => 'NetDefender', 'description' => 'Real-time network threat prevention', 'link' => '#'],
            ]
        ],
        'sofyan-noor-arief' => [
            'name' => 'Sofyan Noor Arief, S.ST., M.Kom.',
            'position' => 'Researcher',
            'nim' => 'NIP. 199003152015091002',
            'photo' => 'img/lab-member/sofyan.png',
            'email' => 'sofyan.arief@polinema.ac.id',
            'phone' => '+62 341 404424',
            'skills' => ['Application Security', 'Secure Coding', 'Security Testing', 'DevSecOps', 'Code Review'],
            'biography' => '<p>Sofyan Noor Arief focuses on application security and secure software development practices. He has extensive experience in security testing and implementing DevSecOps methodologies.</p><p>His work emphasizes building security into the software development lifecycle from the ground up.</p>',
            'education' => [
                ['degree' => 'Master of Computer Science', 'institution' => 'Universitas Indonesia', 'year' => '2014-2016'],
                ['degree' => 'Bachelor of Applied Technology', 'institution' => 'Politeknik Negeri Malang', 'year' => '2008-2012'],
            ],
            'research' => [
                ['title' => 'Automated Security Testing in CI/CD Pipelines', 'publication' => 'DevOps Conference', 'year' => '2023'],
            ],
            'projects' => [
                ['name' => 'SecureCode Analyzer', 'description' => 'Static code analysis for vulnerabilities', 'link' => '#'],
            ],
        ],
        'meyti-eka-apriyani' => [
            'name' => 'Meyti Eka Apriyani ST., MT.',
            'position' => 'Researcher',
            'nim' => 'NIP. 19870822 201406 2 001',
            'photo' => 'img/lab-member/meyti.png',
            'email' => 'meyti.apriyani@polinema.ac.id',
            'phone' => '+62 341 404424',
            'skills' => ['Digital Forensics', 'Incident Response', 'Malware Analysis', 'Threat Intelligence', 'Security Investigation'],
            'biography' => '<p>Meyti Eka Apriyani is an expert in digital forensics and incident response. She has investigated numerous high-profile security incidents and has developed innovative forensic analysis techniques.</p><p>Her research contributes to the advancement of forensic methodologies in cybercrime investigation.</p>',
            'education' => [
                ['degree' => 'Master of Engineering', 'institution' => 'Institut Teknologi Sepuluh Nopember (ITS)', 'year' => '2011-2013'],
                ['degree' => 'Bachelor of Engineering', 'institution' => 'Universitas Brawijaya', 'year' => '2005-2009'],
            ],
            'research' => [
                ['title' => 'Mobile Device Forensics in Criminal Investigations', 'publication' => 'Forensic Science International', 'year' => '2023'],
                ['title' => 'Memory Forensics for Malware Detection', 'publication' => 'Digital Investigation Journal', 'year' => '2022'],
            ],
            'projects' => [
                ['name' => 'ForensicKit', 'description' => 'Comprehensive digital forensics toolkit', 'link' => '#'],
                ['name' => 'IncidentTracker', 'description' => 'Security incident management system', 'link' => '#'],
            ],
        ],
    ];
    
    // Get member data or return 404
    $member = $members[$slug] ?? abort(404);
    
    return view('member-detail', compact('member'));
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
    // Dashboard
    Route::get('/', [AdminController::class, 'dashboard'])->name('admins.index');
    
    // Administrators Management
    Route::resource('administrators', AdminController::class)->names([
        'index' => 'administrators.index',
        'create' => 'administrators.create',
        'store' => 'administrators.store',
        'show' => 'administrators.show',
        'edit' => 'administrators.edit',
        'update' => 'administrators.update',
        'destroy' => 'administrators.destroy',
    ]);
    
    // Other Resources
    Route::resource('galleries', GalleryController::class);
    Route::resource('archives', ArchivesController::class);
    Route::resource('contents', ContentController::class);
    Route::resource('categories', CategoriesController::class);
    Route::resource('members', MembersController::class);
    Route::resource('links', LinksController::class);
    
    // Admin Logs (read-only except delete)
    Route::resource('admin_logs', Admin_LogsController::class)->except(['create', 'store', 'edit', 'update']);
    Route::delete('admin_logs/destroy-all', [Admin_LogsController::class, 'destroyAll'])->name('admin_logs.destroyAll');
});