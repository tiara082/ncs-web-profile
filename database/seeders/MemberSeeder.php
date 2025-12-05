<?php

namespace Database\Seeders;

use App\Models\Members;
use Illuminate\Database\Seeder;

class MemberSeeder extends Seeder
{
    public function run(): void
    {
        $members = [
            [
                'member_name' => 'Erfan Rohadi, ST., M.Eng., Ph.D.',
                'member_role' => 'Laboratory Head',
                'member_phone' => '+62 341 404424',
                'member_email' => 'erfan.rohadi@polinema.ac.id',
                'member_address' => 'Politeknik Negeri Malang, Jl. Soekarno Hatta No.9, Malang',
            ],
            [
                'member_name' => 'Ade Ismail, S.Kom., M.TI',
                'member_role' => 'Researcher',
                'member_phone' => '+62 341 404425',
                'member_email' => 'ade.ismail@polinema.ac.id',
                'member_address' => 'Politeknik Negeri Malang, Jl. Soekarno Hatta No.9, Malang',
            ],
            [
                'member_name' => 'Vipkas Al Hadid Firdaus, ST., MT',
                'member_role' => 'Researcher',
                'member_phone' => '+62 341 404426',
                'member_email' => 'vipkas.firdaus@polinema.ac.id',
                'member_address' => 'Politeknik Negeri Malang, Jl. Soekarno Hatta No.9, Malang',
            ],
            [
                'member_name' => 'Sofyan Noor Arief, S.ST., M.Kom.',
                'member_role' => 'Researcher',
                'member_phone' => '+62 341 404427',
                'member_email' => 'sofyan.arief@polinema.ac.id',
                'member_address' => 'Politeknik Negeri Malang, Jl. Soekarno Hatta No.9, Malang',
            ],
            [
                'member_name' => 'Meyti Eka Apriyani, ST., MT.',
                'member_role' => 'Researcher',
                'member_phone' => '+62 341 404428',
                'member_email' => 'meyti.apriyani@polinema.ac.id',
                'member_address' => 'Politeknik Negeri Malang, Jl. Soekarno Hatta No.9, Malang',
            ],
        ];

        foreach ($members as $member) {
            Members::create($member);
        }
    }
}
