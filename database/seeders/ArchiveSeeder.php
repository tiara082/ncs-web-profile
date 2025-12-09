<?php

namespace Database\Seeders;

use App\Models\Archives;
use App\Models\Admin;
use App\Models\Categories;
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

        // Get or create categories
        $reportsCategory = Categories::firstOrCreate(['name' => 'Reports']);
        $financialCategory = Categories::firstOrCreate(['name' => 'Financial']);
        $minutesCategory = Categories::firstOrCreate(['name' => 'Minutes']);
        $policiesCategory = Categories::firstOrCreate(['name' => 'Policies']);
        $researchCategory = Categories::firstOrCreate(['name' => 'Research']);

        $archives = [
            [
                'title' => 'Annual Report 2024',
                'description' => 'Complete annual report for the year 2024',
                'file_path' => '/storage/archives/annual-report-2024.pdf',
                'type' => 'document',
                'uploaded_by' => $admin->id,
                'categories' => [$reportsCategory->id],
            ],
            [
                'title' => 'Financial Statement Q4 2024',
                'description' => 'Quarterly financial statement for Q4 2024',
                'file_path' => '/storage/archives/financial-q4-2024.pdf',
                'type' => 'document',
                'uploaded_by' => $admin->id,
                'categories' => [$financialCategory->id],
            ],
            [
                'title' => 'Meeting Minutes - November 2024',
                'description' => 'Official minutes from the November 2024 board meeting',
                'file_path' => '/storage/archives/minutes-nov-2024.pdf',
                'type' => 'document',
                'uploaded_by' => $admin->id,
                'categories' => [$minutesCategory->id],
            ],
            [
                'title' => 'Policy Document 2025',
                'description' => 'Updated organizational policies for 2025',
                'file_path' => '/storage/archives/policy-2025.pdf',
                'type' => 'document',
                'uploaded_by' => $admin->id,
                'categories' => [$policiesCategory->id],
            ],
            [
                'title' => 'Research Publication - Climate Study',
                'description' => 'Research findings on climate impact studies',
                'file_path' => '/storage/archives/research-climate-2024.pdf',
                'type' => 'research',
                'year' => '2024',
                'publication' => 'Journal of Climate Studies',
                'uploaded_by' => $admin->id,
                'categories' => [$researchCategory->id],
            ],
        ];

        foreach ($archives as $archiveData) {
            $categories = $archiveData['categories'];
            unset($archiveData['categories']);
            
            $archive = Archives::create($archiveData);
            $archive->categories()->sync($categories);
        }
    }
}
