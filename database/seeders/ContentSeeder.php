<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ContentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $contents = [
            [
                'title' => 'Welcome to NCS Lab',
                'body' => 'Welcome to the Network and Communication Systems Laboratory. We are dedicated to advancing research in network technologies and communication systems.',
                'content_type' => 'announcement',
                'created_by' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Research Opportunities',
                'body' => 'We offer various research opportunities for students interested in network security, wireless communications, and distributed systems.',
                'content_type' => 'news',
                'created_by' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Lab Guidelines',
                'body' => 'Please follow the lab safety guidelines and equipment usage policies. All members must complete the orientation before accessing lab resources.',
                'content_type' => 'policy',
                'created_by' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('contents')->insert($contents);
    }
}