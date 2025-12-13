<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        // Get members
        $erfan = \App\Models\Members::where('member_name', 'like', '%Erfan Rohadi%')->first();

        // Buat superadmin - Pak Erfan
        Admin::create([
            'username' => 'erfan123',
            'email' => 'erfan@lab.ac.id',
            'password_hash' => Hash::make('erfan1234'),
            'role' => 'superadmin',
            'member_id' => $erfan ? $erfan->id : null,
        ]);

        // Buat beberapa admin biasa (lab member)
        $labMembers = [
            [
                'username' => 'member1',
                'email' => 'member1@lab.ac.id',
                'password_hash' => Hash::make('member123'),
                'role' => 'admin',
                'member_id' => null,
            ],
            [
                'username' => 'member2',
                'email' => 'member2@lab.ac.id',
                'password_hash' => Hash::make('member123'),
                'role' => 'admin',
                'member_id' => null,
            ],
            [
                'username' => 'member3',
                'email' => 'member3@lab.ac.id',
                'password_hash' => Hash::make('member123'),
                'role' => 'admin',
                'member_id' => null,
            ],
        ];

        foreach ($labMembers as $member) {
            Admin::create($member);
        }
    }
}
