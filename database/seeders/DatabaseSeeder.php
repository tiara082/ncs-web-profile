<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            MemberSeeder::class,
            AdminSeeder::class,
            CategorySeeder::class,
            LinkSeeder::class,
            ContentSeeder::class,
            EventSeeder::class,
            ArchiveSeeder::class,
            ResearchSeeder::class,
        ]);
    }
}
