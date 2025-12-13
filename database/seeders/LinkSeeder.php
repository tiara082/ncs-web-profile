<?php

namespace Database\Seeders;

use App\Models\Links;
use Illuminate\Database\Seeder;

class LinkSeeder extends Seeder
{
    public function run(): void
    {
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
                'name' => 'SINTA',
                'url' => 'https://sinta.kemdikbud.go.id/journals/profile/5102',
                'description' => 'Science and Technology Index - Kementerian Pendidikan',
            ],
            [
                'name' => 'Google Scholar',
                'url' => 'https://scholar.google.com',
                'description' => 'Google Scholar - Academic Research Database',
            ],
            [
                'name' => 'IEEE Xplore',
                'url' => 'https://ieeexplore.ieee.org',
                'description' => 'IEEE Xplore Digital Library',
            ],
        ];

        foreach ($links as $link) {
            Links::create($link);
        }
    }
}
