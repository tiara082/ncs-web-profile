<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\Members;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class CleanDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Clear existing data for clean setup
        DB::table('admin_logs')->delete();
        DB::table('contents')->delete();
        DB::table('categories')->delete();
        DB::table('galleries')->delete();
        DB::table('archives')->delete();
        DB::table('links')->delete();
        DB::table('consultations')->delete();
        DB::table('admins')->delete();
        DB::table('members')->delete();

        // Seed Members first
        $this->command->info('Seeding Members...');
        $members = $this->seedMembers();

        // Seed Admins with proper roles
        $this->command->info('Seeding Admins...');
        $this->seedAdmins($members);

        // Seed Categories
        $this->command->info('Seeding Categories...');
        $this->seedCategories();

        // Seed Sample Content
        $this->command->info('Seeding Sample Content...');
        $this->seedSampleContent();

        // Seed System Resources
        $this->command->info('Seeding System Resources...');
        $this->seedSystemResources();

        $this->command->info('Database seeding completed successfully!');
    }

    private function seedMembers(): array
    {
        $members = [
            [
                'member_name' => 'Erfan Rohadi, Ph.D.',
                'member_role' => 'Laboratory Head',
                'member_description' => 'Dr. Erfan Rohadi is a distinguished academic and researcher leading the Network & Cyber Security Laboratory.',
                'member_image' => 'lab-member/erfan.png',
                'member_email' => 'erfan.rohadi@polinema.ac.id',
                'member_phone' => '+62 812-3456-7890',
                'member_linkedin' => 'https://linkedin.com/in/erfanrohadi',
                'member_education' => 'Ph.D. in Computer Science',
                'member_experience' => '10+ years in cybersecurity research',
                'member_publications' => '15+ research papers',
                'member_skills' => 'Network Security, Cryptography, Penetration Testing',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'member_name' => 'Ade Ismail, S.Kom., M.Kom.',
                'member_role' => 'Senior Researcher',
                'member_description' => 'Expert in network infrastructure and security protocols.',
                'member_image' => 'lab-member/ade.png',
                'member_email' => 'ade.ismail@polinema.ac.id',
                'member_phone' => '+62 812-3456-7891',
                'member_linkedin' => 'https://linkedin.com/in/adeismail',
                'member_education' => 'M.Kom. in Computer Science',
                'member_experience' => '8+ years in network security',
                'member_publications' => '10+ research papers',
                'member_skills' => 'Network Infrastructure, Security Protocols, System Administration',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'member_name' => 'Vipkas Firdaus, S.Kom.',
                'member_role' => 'Research Assistant',
                'member_description' => 'Specializing in web application security and penetration testing.',
                'member_image' => 'lab-member/vipkas.png',
                'member_email' => 'vipkas.firdaus@polinema.ac.id',
                'member_phone' => '+62 812-3456-7892',
                'member_linkedin' => 'https://linkedin.com/in/vipkasfirdaus',
                'member_education' => 'S.Kom. in Computer Science',
                'member_experience' => '5+ years in web security',
                'member_publications' => '5+ research papers',
                'member_skills' => 'Web Security, Penetration Testing, Secure Coding',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'member_name' => 'Sofyan Arief, S.Kom.',
                'member_role' => 'Junior Researcher',
                'member_description' => 'Focus on malware analysis and digital forensics.',
                'member_image' => 'lab-member/sofyan.png',
                'member_email' => 'sofyan.arief@polinema.ac.id',
                'member_phone' => '+62 812-3456-7893',
                'member_linkedin' => 'https://linkedin.com/in/sofyanarief',
                'member_education' => 'S.Kom. in Computer Science',
                'member_experience' => '3+ years in digital forensics',
                'member_publications' => '3+ research papers',
                'member_skills' => 'Malware Analysis, Digital Forensics, Incident Response',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'member_name' => 'Meyti Apriyani, S.Kom.',
                'member_role' => 'Research Assistant',
                'member_description' => 'Specializing in cryptography and secure communications.',
                'member_image' => 'lab-member/meyti.png',
                'member_email' => 'meyti.apriyani@polinema.ac.id',
                'member_phone' => '+62 812-3456-7894',
                'member_linkedin' => 'https://linkedin.com/in/meytiapriyani',
                'member_education' => 'S.Kom. in Computer Science',
                'member_experience' => '4+ years in cryptography research',
                'member_publications' => '4+ research papers',
                'member_skills' => 'Cryptography, Secure Communications, Number Theory',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        return Members::insert($members);
    }

    private function seedAdmins(array $members): void
    {
        // Get member IDs for linking
        $erfan = Members::where('member_name', 'like', '%Erfan Rohadi%')->first();
        $ade = Members::where('member_name', 'like', '%Ade Ismail%')->first();
        $vipkas = Members::where('member_name', 'like', '%Vipkas%')->first();
        $sofyan = Members::where('member_name', 'like', '%Sofyan%')->first();
        $meyti = Members::where('member_name', 'like', '%Meyti%')->first();

        // Super Admin (full system access)
        Admin::create([
            'username' => 'admin',
            'email' => 'admin@ncslab.polinema.ac.id',
            'password' => Hash::make('admin123'),
            'name' => 'System Administrator',
            'member_id' => null,
            'role' => 'super_admin',
        ]);

        // Content Admins (linked to members, limited access)
        $contentAdmins = [
            [
                'username' => 'erfan123',
                'email' => 'erfan.rohadi@polinema.ac.id',
                'password' => Hash::make('erfan1234'),
                'name' => $erfan ? $erfan->member_name : 'Erfan Rohadi',
                'member_id' => $erfan ? $erfan->id : null,
                'role' => 'content_admin',
            ],
            [
                'username' => 'ade123',
                'email' => 'ade.ismail@polinema.ac.id',
                'password' => Hash::make('ade1234'),
                'name' => $ade ? $ade->member_name : 'Ade Ismail',
                'member_id' => $ade ? $ade->id : null,
                'role' => 'content_admin',
            ],
            [
                'username' => 'vipkas123',
                'email' => 'vipkas.firdaus@polinema.ac.id',
                'password' => Hash::make('vipkas1234'),
                'name' => $vipkas ? $vipkas->member_name : 'Vipkas Firdaus',
                'member_id' => $vipkas ? $vipkas->id : null,
                'role' => 'content_admin',
            ],
            [
                'username' => 'sofyan123',
                'email' => 'sofyan.arief@polinema.ac.id',
                'password' => Hash::make('sofyan1234'),
                'name' => $sofyan ? $sofyan->member_name : 'Sofyan Arief',
                'member_id' => $sofyan ? $sofyan->id : null,
                'role' => 'content_admin',
            ],
            [
                'username' => 'meyti123',
                'email' => 'meyti.apriyani@polinema.ac.id',
                'password' => Hash::make('meyti1234'),
                'name' => $meyti ? $meyti->member_name : 'Meyti Apriyani',
                'member_id' => $meyti ? $meyti->id : null,
                'role' => 'content_admin',
            ],
        ];

        foreach ($contentAdmins as $admin) {
            Admin::create($admin);
        }
    }

    private function seedCategories(): void
    {
        $categories = [
            ['name' => 'Research', 'description' => 'Research papers and publications'],
            ['name' => 'Projects', 'description' => 'Ongoing and completed projects'],
            ['name' => 'News', 'description' => 'Latest news and announcements'],
            ['name' => 'Events', 'description' => 'Workshops, seminars, and conferences'],
            ['name' => 'Publications', 'description' => 'Published works and journals'],
            ['name' => 'Tutorials', 'description' => 'Educational content and tutorials'],
        ];

        DB::table('categories')->insert($categories);
    }

    private function seedSampleContent(): void
    {
        $contents = [
            [
                'title' => 'Understanding Network Segmentation in Modern Infrastructure',
                'body' => '<p>Network segmentation is a fundamental security strategy that divides a computer network into smaller, isolated segments...</p>',
                'content_type' => 'article',
                'created_by' => 1, // Super Admin
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Advanced Penetration Testing Techniques',
                'body' => '<p>Modern penetration testing requires a comprehensive approach to identify vulnerabilities...</p>',
                'content_type' => 'tutorial',
                'created_by' => 2, // Erfan
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Cryptography in Modern Applications',
                'body' => '<p>Cryptography plays a crucial role in securing modern applications and communications...</p>',
                'content_type' => 'research',
                'created_by' => 6, // Meyti
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('contents')->insert($contents);
    }

    private function seedSystemResources(): void
    {
        // Seed sample galleries
        $galleries = [
            [
                'title' => 'Lab Equipment',
                'description' => 'Advanced security testing equipment',
                'image_path' => 'gallery/lab-equipment.jpg',
                'uploaded_by' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Team Photo 2024',
                'description' => 'NCS Lab team members',
                'image_path' => 'gallery/team-2024.jpg',
                'uploaded_by' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('galleries')->insert($galleries);

        // Seed sample archives
        $archives = [
            [
                'title' => 'Annual Report 2023',
                'description' => 'Complete annual report for 2023',
                'file_path' => 'archives/annual-report-2023.pdf',
                'file_type' => 'pdf',
                'uploaded_by' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Research Papers Collection',
                'description' => 'Collection of published research papers',
                'file_path' => 'archives/research-papers-2024.zip',
                'file_type' => 'zip',
                'uploaded_by' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('archives')->insert($archives);

        // Seed useful links
        $links = [
            [
                'title' => 'Polinema Official Website',
                'url' => 'https://www.polinema.ac.id',
                'description' => 'Official website of Politeknik Negeri Malang',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Cybersecurity Resources',
                'url' => 'https://www.cve.org',
                'description' => 'Common Vulnerabilities and Exposures database',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('links')->insert($links);
    }
}
