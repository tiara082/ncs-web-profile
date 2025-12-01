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