<?php

namespace Database\Seeders;

use App\Models\Gallery;
use App\Models\Admin;
use Illuminate\Database\Seeder;

class GallerySeeder extends Seeder
{
    public function run(): void
    {
        $admin = Admin::first();
        
        if (!$admin) {
            $this->command->warn('No admin found. Please run AdminSeeder first.');
            return;
        }

        $galleries = [
            [
                'title' => 'Annual Meeting 2024',
                'description' => 'Photos from our annual meeting held in November 2024',
                'file_path' => '/storage/gallery/annual-meeting-2024.jpg',
                'gallery_type' => 'image',
                'uploaded_by' => $admin->id,
            ],
            [
                'title' => 'Community Event Highlights',
                'description' => 'Highlights from our community outreach event',
                'file_path' => '/storage/gallery/community-event.jpg',
                'gallery_type' => 'image',
                'uploaded_by' => $admin->id,
            ],
            [
                'title' => 'Conference Keynote Speech',
                'description' => 'Video recording of the keynote speech from our conference',
                'file_path' => '/storage/gallery/keynote-speech.mp4',
                'gallery_type' => 'video',
                'uploaded_by' => $admin->id,
            ],
            [
                'title' => 'Team Building Activity',
                'description' => 'Photos from our team building activities',
                'file_path' => '/storage/gallery/team-building.jpg',
                'gallery_type' => 'image',
                'uploaded_by' => $admin->id,
            ],
            [
                'title' => 'Workshop Session',
                'description' => 'Educational workshop session documentation',
                'file_path' => '/storage/gallery/workshop.jpg',
                'gallery_type' => 'image',
                'uploaded_by' => $admin->id,
            ],
        ];

        foreach ($galleries as $gallery) {
            Gallery::create($gallery);
        }
    }
}
