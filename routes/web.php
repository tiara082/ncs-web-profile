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
Route::get('/logo', function () {
    return view('logo');
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
            'photo' => 'https://i.pravatar.cc/300?img=12',
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
            'photo' => 'https://i.pravatar.cc/300?img=33',
            'research' => [
                ['title' => 'Advanced Threat Detection in IoT Networks', 'publication' => 'IEEE Security & Privacy', 'year' => '2023', 'cover' => 'https://images.unsplash.com/photo-1573164713988-8665fc963095?w=400&q=80'],
                ['title' => 'Machine Learning Approaches for Intrusion Detection', 'publication' => 'Journal of Cybersecurity Research', 'year' => '2022', 'cover' => 'https://images.unsplash.com/photo-1555949963-ff9fe0c870eb?w=400&q=80'],
                ['title' => 'Blockchain-Based Security Framework for Smart Cities', 'publication' => 'International Conference on Cybersecurity', 'year' => '2021', 'cover' => 'https://images.unsplash.com/photo-1639322537228-f710d846310a?w=400&q=80'],
            ],
        ],
        'vipkas-al-hadid-firdaus' => [
            'name' => 'Vipkas Al Hadid Firdaus, ST., MT',
            'position' => 'Researcher',
            'photo' => 'https://i.pravatar.cc/300?img=15',
            'research' => [
                ['title' => 'Software-Defined Security for Data Centers', 'publication' => 'ACM Computing Surveys', 'year' => '2023', 'cover' => 'https://images.unsplash.com/photo-1558494949-ef010cbdcc31?w=400&q=80'],
                ['title' => 'Zero Trust Architecture Implementation Guide', 'publication' => 'Network Security Journal', 'year' => '2022', 'cover' => 'https://images.unsplash.com/photo-1484807352052-23338990c6c6?w=400&q=80'],
            ],
        ],
        'sofyan-noor-arief' => [
            'name' => 'Sofyan Noor Arief, S.ST., M.Kom.',
            'position' => 'Researcher',
            'photo' => 'https://i.pravatar.cc/300?img=68',
            'research' => [
                ['title' => 'Automated Security Testing in CI/CD Pipelines', 'publication' => 'DevOps Conference', 'year' => '2023', 'cover' => 'https://images.unsplash.com/photo-1461749280684-dccba630e2f6?w=400&q=80'],
            ],
        ],
        'meyti-eka-apriyani' => [
            'name' => 'Meyti Eka Apriyani ST., MT.',
            'position' => 'Researcher',
            'photo' => 'https://i.pravatar.cc/300?img=47',
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
                'author_photo' => $member['photo'],
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
            'photo' => 'https://i.pravatar.cc/300?img=12',
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
            'photo' => 'https://i.pravatar.cc/300?img=33',
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
            'photo' => 'https://i.pravatar.cc/300?img=15',
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
            ],
        ],
        'sofyan-noor-arief' => [
            'name' => 'Sofyan Noor Arief, S.ST., M.Kom.',
            'position' => 'Researcher',
            'nim' => 'NIP. 19900315 201509 1 002',
            'photo' => 'https://i.pravatar.cc/300?img=68',
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
            'photo' => 'https://i.pravatar.cc/300?img=47',
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

// Filament Admin Auth Routes
Route::post('/admin/logout', function () {
    auth()->guard('web')->logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();
    return redirect('/admin/login');
})->name('filament.admin.auth.logout')->middleware('web');

// API Routes for frontend (renamed to avoid conflict with Filament admin panel)
Route::prefix('api')->group(function () {
    Route::resource('administrators', AdminController::class);
    Route::resource('galleries', GalleryController::class);
    Route::resource('archives', ArchivesController::class);
    Route::resource('contents', ContentController::class);
    Route::resource('categories', CategoriesController::class);
    Route::resource('members', MembersController::class);
    Route::resource('admin_logs', Admin_LogsController::class);
    Route::resource('links', LinksController::class);
});