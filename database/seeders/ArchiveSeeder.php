<?php

namespace Database\Seeders;

use App\Models\Archives;
use App\Models\Admin;
use Illuminate\Database\Seeder;

class ArchiveSeeder extends Seeder
{
    public function run(): void
    {
        $admin = Admin::first();
        
        if (!$admin) {
            $this->command->warn('No admin found. Please run AdminSeeder first.');
            return;
        }

        $archives = [
            [
                'title' => 'Annual Report 2024',
                'description' => 'Complete annual report for the year 2024',
                'file_path' => 'archives/annual-report-2024.pdf',
                'category' => 'Reports',
                'type' => 'document',
                'cover_image' => 'poltek.png',
                'uploaded_by' => $admin->id,
            ],
            [
                'title' => 'Financial Statement Q4 2024',
                'description' => 'Quarterly financial statement for Q4 2024',
                'file_path' => 'archives/financial-q4-2024.pdf',
                'category' => 'Financial',
                'type' => 'document',
                'cover_image' => 'poltek.png',
                'uploaded_by' => $admin->id,
            ],
            [
                'title' => 'Meeting Minutes - November 2024',
                'description' => 'Official minutes from the November 2024 board meeting',
                'file_path' => 'archives/minutes-nov-2024.pdf',
                'category' => 'Minutes',
                'type' => 'document',
                'cover_image' => 'poltek.png',
                'uploaded_by' => $admin->id,
            ],
            [
                'title' => 'Policy Document 2025',
                'description' => 'Updated organizational policies for 2025',
                'file_path' => 'archives/policy-2025.pdf',
                'category' => 'Policies',
                'type' => 'document',
                'cover_image' => 'poltek.png',
                'uploaded_by' => $admin->id,
            ],
            [
                'title' => 'Research Publication - Climate Study',
                'description' => 'Research findings on climate impact studies',
                'file_path' => 'archives/research-climate-2024.pdf',
                'category' => 'Research',
                'type' => 'research',
                'cover_image' => 'poltek.png',
                'uploaded_by' => $admin->id,
            ],
        ];

        foreach ($archives as $archive) {
            Archives::create($archive);
        }
    }
}
