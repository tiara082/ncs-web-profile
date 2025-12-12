<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Check if role column exists, if not add it
        if (!Schema::hasColumn('admins', 'role')) {
            Schema::table('admins', function (Blueprint $table) {
                $table->enum('role', ['super_admin', 'content_admin'])->default('content_admin')->after('email');
            });
        }

        // Update existing admin roles based on member_id
        DB::table('admins')->whereNull('member_id')->update(['role' => 'super_admin']);
        DB::table('admins')->whereNotNull('member_id')->update(['role' => 'content_admin']);

        // Ensure content tables have proper foreign key constraints
        if (!Schema::hasColumn('contents', 'created_by')) {
            Schema::table('contents', function (Blueprint $table) {
                $table->foreignId('created_by')->nullable()->constrained('admins')->onDelete('set null');
            });
        }

        if (!Schema::hasColumn('galleries', 'uploaded_by')) {
            Schema::table('galleries', function (Blueprint $table) {
                $table->foreignId('uploaded_by')->nullable()->constrained('admins')->onDelete('set null');
            });
        }

        if (!Schema::hasColumn('archives', 'uploaded_by')) {
            Schema::table('archives', function (Blueprint $table) {
                $table->foreignId('uploaded_by')->nullable()->constrained('admins')->onDelete('set null');
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Remove role column if it exists
        if (Schema::hasColumn('admins', 'role')) {
            Schema::table('admins', function (Blueprint $table) {
                $table->dropColumn('role');
            });
        }
    }
};
