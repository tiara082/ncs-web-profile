<?php

namespace Database\Seeders;

use App\Models\Categories;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            ['name' => 'News'],
            ['name' => 'Events'],
            ['name' => 'Announcements'],
            ['name' => 'Research'],
            ['name' => 'Publications'],
            ['name' => 'Projects'],
            ['name' => 'Community'],
            ['name' => 'Education'],
        ];

        foreach ($categories as $category) {
            Categories::create($category);
        }
    }
}
