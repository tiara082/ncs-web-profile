<?php

namespace Database\Seeders;

use App\Models\Content;
use App\Models\Admin;
use App\Models\Categories;
use Illuminate\Database\Seeder;

class ContentSeeder extends Seeder
{
    public function run(): void
    {
        $admin = Admin::first();
        
        if (!$admin) {
            $this->command->warn('No admin found. Please run AdminSeeder first.');
            return;
        }

        $contents = [
            [
                'title' => 'Welcome to Our Organization',
                'body' => 'We are pleased to announce the launch of our new website. This platform will serve as a hub for all our activities, news, and resources.',
                'content_type' => 'article',
                'created_by' => $admin->id,
                'categories' => ['Announcements', 'News'],
            ],
            [
                'title' => 'Annual Conference 2025',
                'body' => 'Join us for our annual conference on December 15-17, 2025. This year\'s theme is "Innovation and Collaboration". Register now to secure your spot.',
                'content_type' => 'event',
                'created_by' => $admin->id,
                'categories' => ['Events', 'Announcements'],
            ],
            [
                'title' => 'Research Grant Opportunities',
                'body' => 'We are now accepting applications for research grants. Funding is available for projects aligned with our mission. Deadline: January 31, 2026.',
                'content_type' => 'article',
                'created_by' => $admin->id,
                'categories' => ['Research', 'Announcements'],
            ],
            [
                'title' => 'Community Outreach Program',
                'body' => 'Our community outreach program has reached over 1,000 participants this year. Learn more about how you can get involved and make a difference.',
                'content_type' => 'article',
                'created_by' => $admin->id,
                'categories' => ['Community', 'Projects'],
            ],
            [
                'title' => 'New Educational Resources Available',
                'body' => 'We have published new educational materials covering various topics. These resources are free and available to all members.',
                'content_type' => 'article',
                'created_by' => $admin->id,
                'categories' => ['Education', 'Publications'],
            ],
        ];

        foreach ($contents as $contentData) {
            $categoryNames = $contentData['categories'];
            unset($contentData['categories']);
            
            $content = Content::create($contentData);
            
            $categoryIds = Categories::whereIn('name', $categoryNames)->pluck('id');
            $content->categories()->attach($categoryIds);
        }
    }
}
