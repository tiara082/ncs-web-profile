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
        $ade = \App\Models\Members::where('member_name', 'like', '%Ade Ismail%')->first();
        $vipkas = \App\Models\Members::where('member_name', 'like', '%Vipkas%')->first();
        $sofyan = \App\Models\Members::where('member_name', 'like', '%Sofyan%')->first();
        $meyti = \App\Models\Members::where('member_name', 'like', '%Meyti%')->first();

        // Super admin (not linked to member)
        Admin::create([
            'username' => 'admin',
            'email' => 'admin@example.com',
            'password_hash' => Hash::make('password'),
            'role' => 'super_admin',
            'member_id' => null,
        ]);

        // Member admins
        Admin::create([
            'username' => 'erfan123',
            'email' => 'erfan.rohadi@polinema.ac.id',
            'password_hash' => Hash::make('erfan1234'),
            'role' => 'admin',
            'member_id' => $erfan ? $erfan->id : null,
        ]);

        Admin::create([
            'username' => 'ade123',
            'email' => 'ade.ismail@polinema.ac.id',
            'password_hash' => Hash::make('ade1234'),
            'role' => 'admin',
            'member_id' => $ade ? $ade->id : null,
        ]);

        Admin::create([
            'username' => 'vipkas123',
            'email' => 'vipkas.firdaus@polinema.ac.id',
            'password_hash' => Hash::make('vipkas1234'),
            'role' => 'admin',
            'member_id' => $vipkas ? $vipkas->id : null,
        ]);

        Admin::create([
            'username' => 'sofyan123',
            'email' => 'sofyan.arief@polinema.ac.id',
            'password_hash' => Hash::make('sofyan1234'),
            'role' => 'admin',
            'member_id' => $sofyan ? $sofyan->id : null,
        ]);

        Admin::create([
            'username' => 'meyti123',
            'email' => 'meyti.apriyani@polinema.ac.id',
            'password_hash' => Hash::make('meyti1234'),
            'role' => 'admin',
            'member_id' => $meyti ? $meyti->id : null,
        ]);
    }
}
