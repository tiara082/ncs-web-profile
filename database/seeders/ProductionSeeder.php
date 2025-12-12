<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductionSeeder extends Seeder
{
    /**
     * Run the database seeds for production environment.
     * This seeder is safe to run in production and preserves existing data.
     */
    public function run(): void
    {
        $this->command->info('Running Production Seeder - Safe for Production Environment');

        // Only update roles if they don't exist
        $this->updateAdminRoles();

        // Create default super admin if none exists
        $this->createDefaultSuperAdmin();

        // Seed basic categories if none exist
        $this->seedBasicCategories();

        $this->command->info('Production seeding completed!');
    }

    private function updateAdminRoles(): void
    {
        // Update admin roles based on member_id (safe operation)
        DB::table('admins')
            ->whereNull('role')
            ->whereNull('member_id')
            ->update(['role' => 'super_admin']);

        DB::table('admins')
            ->whereNull('role')
            ->whereNotNull('member_id')
            ->update(['role' => 'content_admin']);

        $this->command->info('Admin roles updated safely');
    }

    private function createDefaultSuperAdmin(): void
    {
        $adminExists = DB::table('admins')->where('username', 'admin')->exists();

        if (!$adminExists) {
            DB::table('admins')->insert([
                'username' => 'admin',
                'email' => 'admin@ncslab.polinema.ac.id',
                'password' => bcrypt('admin123'),
                'name' => 'System Administrator',
                'member_id' => null,
                'role' => 'super_admin',
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            $this->command->info('Default super admin created: admin / admin123');
        } else {
            $this->command->info('Super admin already exists');
        }
    }

    private function seedBasicCategories(): void
    {
        $categoriesExist = DB::table('categories')->exists();

        if (!$categoriesExist) {
            $categories = [
                ['name' => 'Research', 'description' => 'Research papers and publications', 'created_at' => now(), 'updated_at' => now()],
                ['name' => 'Projects', 'description' => 'Ongoing and completed projects', 'created_at' => now(), 'updated_at' => now()],
                ['name' => 'News', 'description' => 'Latest news and announcements', 'created_at' => now(), 'updated_at' => now()],
                ['name' => 'Events', 'description' => 'Workshops, seminars, and conferences', 'created_at' => now(), 'updated_at' => now()],
            ];

            DB::table('categories')->insert($categories);
            $this->command->info('Basic categories created');
        } else {
            $this->command->info('Categories already exist');
        }
    }
}
