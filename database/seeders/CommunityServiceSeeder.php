<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CommunityServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $services = [
            [
                'title' => 'Workshop Keamanan Siber untuk UMKM',
                'description' => 'Pelatihan keamanan dasar bagi pelaku UMKM di Malang Raya untuk melindungi bisnis dari ancaman siber',
                'date' => '2024-11-15',
                'location' => 'Balai Kota Malang',
                'participants' => 85,
                'category' => 'workshop',
                'status' => 'completed',
                'image' => 'community-services/poltek.png',
                'uploaded_by' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Seminar Literasi Digital untuk Pelajar',
                'description' => 'Sosialisasi penggunaan internet aman dan etis untuk siswa SMA/SMK se-Kota Malang',
                'date' => '2024-10-22',
                'location' => 'SMAN 1 Malang',
                'participants' => 250,
                'category' => 'seminar',
                'status' => 'completed',
                'image' => 'community-services/poltek.png',
                'uploaded_by' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Pelatihan Incident Response untuk Instansi Pemerintah',
                'description' => 'Training penanganan insiden keamanan siber bagi IT staff pemerintah daerah',
                'date' => '2024-09-18',
                'location' => 'Diskominfo Kota Malang',
                'participants' => 45,
                'category' => 'training',
                'status' => 'completed',
                'image' => 'community-services/poltek.png',
                'uploaded_by' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Webinar Keamanan Data Pribadi',
                'description' => 'Edukasi perlindungan data pribadi sesuai UU PDP untuk masyarakat umum',
                'date' => '2024-08-12',
                'location' => 'Online via Zoom',
                'participants' => 320,
                'category' => 'webinar',
                'status' => 'completed',
                'image' => 'community-services/poltek.png',
                'uploaded_by' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Konsultasi Keamanan Jaringan untuk Sekolah',
                'description' => 'Pendampingan implementasi sistem keamanan jaringan untuk sekolah-sekolah',
                'date' => '2024-07-25',
                'location' => 'SMK Negeri 4 Malang',
                'participants' => 15,
                'category' => 'consultation',
                'status' => 'completed',
                'image' => 'community-services/poltek.png',
                'uploaded_by' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Workshop Ethical Hacking untuk Mahasiswa',
                'description' => 'Pelatihan dasar penetration testing dan ethical hacking bagi mahasiswa IT',
                'date' => '2024-06-10',
                'location' => 'Polinema',
                'participants' => 120,
                'category' => 'workshop',
                'status' => 'completed',
                'image' => 'community-services/poltek.png',
                'uploaded_by' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Seminar Teknologi Blockchain dan Keamanannya',
                'description' => 'Edukasi tentang teknologi blockchain dan aspek keamanan untuk masyarakat umum',
                'date' => '2024-05-15',
                'location' => 'Malang Creative Center',
                'participants' => 180,
                'category' => 'seminar',
                'status' => 'completed',
                'image' => 'community-services/poltek.png',
                'uploaded_by' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Training Forensik Digital untuk Aparat',
                'description' => 'Pelatihan digital forensics untuk aparat penegak hukum',
                'date' => '2024-04-08',
                'location' => 'Polda Jatim',
                'participants' => 35,
                'category' => 'training',
                'status' => 'completed',
                'image' => 'community-services/poltek.png',
                'uploaded_by' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Webinar IoT Security untuk Smart Home',
                'description' => 'Edukasi keamanan perangkat IoT dan smart home untuk rumah tangga',
                'date' => '2024-03-20',
                'location' => 'Online via YouTube Live',
                'participants' => 450,
                'category' => 'webinar',
                'status' => 'completed',
                'image' => 'community-services/poltek.png',
                'uploaded_by' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        \App\Models\CommunityService::insert($services);
    }
}
