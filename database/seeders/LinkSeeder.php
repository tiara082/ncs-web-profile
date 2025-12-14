<?php

namespace Database\Seeders;

use App\Models\Links;
use Illuminate\Database\Seeder;

class LinkSeeder extends Seeder
{
    public function run(): void
    {
        // Truncate table to avoid duplicates
        Links::truncate();
        
        $links = [
            [
                'name' => 'Polinema',
                'url' => 'https://www.polinema.ac.id',
                'description' => 'Politeknik Negeri Malang - Official Website',
            ],
            [
                'name' => 'JTI Polinema',
                'url' => 'https://jti.polinema.ac.id',
                'description' => 'Jurusan Teknologi Informasi - Politeknik Negeri Malang',
            ],
            [
                'name' => 'SIMTA',
                'url' => 'https://simta.polinema.ac.id',
                'description' => 'Sistem Informasi Manajemen Tugas Akhir - Polinema',
            ],
            [
                'name' => 'SINTA Kementerian',
                'url' => 'https://sinta.kemdiktisaintek.go.id/',
                'description' => 'Science and Technology Index - Kementerian Pendidikan',
            ],
        ];

        foreach ($links as $link) {
            Links::create($link);
        }
    }
}
