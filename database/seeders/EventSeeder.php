<?php

namespace Database\Seeders;

use App\Models\Gallery;
use App\Models\Admin;
use Illuminate\Database\Seeder;

class EventSeeder extends Seeder
{
    public function run(): void
    {
        $admin = Admin::first();
        
        if (!$admin) {
            $this->command->warn('No admin found.');
            return;
        }

        // Agenda (Upcoming Events)
        $agendas = [
            [
                'title' => 'Advanced Penetration Testing Workshop 2024',
                'description' => 'Learn advanced techniques in penetration testing and ethical hacking from industry experts.',
                'file_path' => 'poltek.png',
                'gallery_type' => 'agenda',
                'event_date' => '2024-12-15',
                'event_time' => '09:00:00',
                'location' => 'NCS Lab, Politeknik Negeri Malang',
                'max_slots' => 50,
                'registered_count' => 0,
                'event_status' => 'upcoming',
                'event_mode' => 'online',
                'event_category' => 'workshop',
                'uploaded_by' => $admin->id,
            ],
            [
                'title' => 'Cyber Security CTF Competition 2024',
                'description' => 'Compete with the best teams in capture the flag challenges. Test your skills!',
                'file_path' => 'poltek.png',
                'gallery_type' => 'agenda',
                'event_date' => '2024-12-20',
                'event_time' => '13:00:00',
                'location' => 'NCS Lab, Politeknik Negeri Malang',
                'max_slots' => 20,
                'registered_count' => 0,
                'event_status' => 'upcoming',
                'event_mode' => 'offline',
                'event_category' => 'competition',
                'uploaded_by' => $admin->id,
            ],
            [
                'title' => 'Network Security Seminar: Latest Trends',
                'description' => 'Industry experts discuss the latest trends in network security and threat landscape.',
                'file_path' => 'poltek.png',
                'gallery_type' => 'agenda',
                'event_date' => '2024-12-22',
                'event_time' => '15:00:00',
                'location' => 'Online via Zoom',
                'max_slots' => 100,
                'registered_count' => 0,
                'event_status' => 'upcoming',
                'event_mode' => 'hybrid',
                'event_category' => 'seminar',
                'uploaded_by' => $admin->id,
            ],
        ];

        foreach ($agendas as $agenda) {
            Gallery::create($agenda);
        }

        // Past Activities
        $pastActivities = [
            [
                'title' => 'Workshop Keamanan Siber untuk UMKM',
                'description' => 'Pelatihan keamanan dasar bagi pelaku UMKM di Malang Raya untuk melindungi bisnis dari ancaman siber',
                'file_path' => 'poltek.png',
                'gallery_type' => 'past_activity',
                'event_date' => '2024-11-15',
                'location' => 'Balai Kota Malang',
                'event_status' => 'completed',
                'uploaded_by' => $admin->id,
            ],
            [
                'title' => 'Seminar Literasi Digital untuk Pelajar',
                'description' => 'Sosialisasi penggunaan internet aman dan etis untuk siswa SMA/SMK se-Kota Malang',
                'file_path' => 'poltek.png',
                'gallery_type' => 'past_activity',
                'event_date' => '2024-10-22',
                'location' => 'SMAN 1 Malang',
                'event_status' => 'completed',
                'uploaded_by' => $admin->id,
            ],
            [
                'title' => 'Pelatihan Incident Response untuk Instansi Pemerintah',
                'description' => 'Training penanganan insiden keamanan siber bagi IT staff pemerintah daerah',
                'file_path' => 'poltek.png',
                'gallery_type' => 'past_activity',
                'event_date' => '2024-09-18',
                'location' => 'Diskominfo Kota Malang',
                'event_status' => 'completed',
                'uploaded_by' => $admin->id,
            ],
        ];

        foreach ($pastActivities as $activity) {
            Gallery::create($activity);
        }
    }
}
