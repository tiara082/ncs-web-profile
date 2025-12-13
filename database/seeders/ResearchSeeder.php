<?php

namespace Database\Seeders;

use App\Models\Archives;
use App\Models\Admin;
use App\Models\Members;
use Illuminate\Database\Seeder;

class ResearchSeeder extends Seeder
{
    public function run(): void
    {
        $admin = Admin::first();
        
        if (!$admin) {
            $this->command->warn('No admin found. Please run AdminSeeder first.');
            return;
        }

        // Get members
        $erfan = Members::where('member_name', 'like', '%Erfan Rohadi%')->first();
        $vipkas = Members::where('member_name', 'like', '%Vipkas%')->first();
        $ade = Members::where('member_name', 'like', '%Ade Ismail%')->first();
        $meyti = Members::where('member_name', 'like', '%Meyti%')->first();
        $sofyan = Members::where('member_name', 'like', '%Sofyan%')->first();

        $researches = [
            [
                'title' => 'Next-Generation Intrusion Detection Using Deep Learning',
                'description' => 'A comprehensive study on using deep learning techniques for advanced intrusion detection systems.',
                'publication' => 'IEEE Transactions on Network and Service Management',
                'year' => '2024',
                'category' => 'Research',
                'type' => 'research',
                'file_path' => 'archives/research-intrusion-detection.pdf',
                'cover_image' => 'poltek.png',
                'uploaded_by' => $admin->id,
                'author_id' => $erfan ? $erfan->id : null,
            ],
            [
                'title' => 'Quantum-Safe Cryptography for Critical Infrastructure',
                'description' => 'Research on implementing quantum-resistant cryptographic algorithms for protecting critical infrastructure.',
                'publication' => 'Nature Communications',
                'year' => '2023',
                'category' => 'Research',
                'type' => 'research',
                'file_path' => 'archives/research-quantum-crypto.pdf',
                'cover_image' => 'poltek.png',
                'uploaded_by' => $admin->id,
                'author_id' => $erfan ? $erfan->id : null,
            ],
            [
                'title' => 'Software-Defined Security for Data Centers',
                'description' => 'A novel approach to implementing software-defined security in modern data center environments.',
                'publication' => 'ACM Computing Surveys',
                'year' => '2023',
                'category' => 'Research',
                'type' => 'publication',
                'file_path' => 'archives/research-sdn-security.pdf',
                'cover_image' => 'poltek.png',
                'uploaded_by' => $admin->id,
                'author_id' => $vipkas ? $vipkas->id : null,
            ],
            [
                'title' => 'Advanced Threat Detection in IoT Networks',
                'description' => 'Machine learning approaches for detecting advanced threats in Internet of Things networks.',
                'publication' => 'IEEE Security & Privacy',
                'year' => '2023',
                'category' => 'Research',
                'type' => 'research',
                'file_path' => 'archives/research-iot-threats.pdf',
                'cover_image' => 'poltek.png',
                'uploaded_by' => $admin->id,
                'author_id' => $ade ? $ade->id : null,
            ],
            [
                'title' => 'Mobile Device Forensics in Criminal Investigations',
                'description' => 'Comprehensive study on mobile device forensics techniques for criminal investigations.',
                'publication' => 'Forensic Science International',
                'year' => '2023',
                'category' => 'Research',
                'type' => 'publication',
                'file_path' => 'archives/research-mobile-forensics.pdf',
                'cover_image' => 'poltek.png',
                'uploaded_by' => $admin->id,
                'author_id' => $meyti ? $meyti->id : null,
            ],
            [
                'title' => 'Automated Security Testing in CI/CD Pipelines',
                'description' => 'Best practices and tools for integrating security testing in continuous integration pipelines.',
                'publication' => 'DevOps Conference Proceedings',
                'year' => '2023',
                'category' => 'Research',
                'type' => 'publication',
                'file_path' => 'archives/research-cicd-security.pdf',
                'cover_image' => 'poltek.png',
                'uploaded_by' => $admin->id,
                'author_id' => $sofyan ? $sofyan->id : null,
            ],
        ];

        foreach ($researches as $research) {
            Archives::create($research);
        }
    }
}
