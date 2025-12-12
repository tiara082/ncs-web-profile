<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Add indexes for better performance
        Schema::table('admins', function (Blueprint $table) {
            $table->index('role');
            $table->index('member_id');
        });

        Schema::table('contents', function (Blueprint $table) {
            $table->index('created_by');
            $table->index('content_type');
            $table->index('created_at');
        });

        Schema::table('members', function (Blueprint $table) {
            $table->index('member_role');
            $table->index('member_name');
        });

        Schema::table('admin_logs', function (Blueprint $table) {
            $table->index('admin_id');
            $table->index('action');
            $table->index('table_name');
            $table->index('created_at');
        });

        Schema::table('galleries', function (Blueprint $table) {
            $table->index('uploaded_by');
            $table->index('created_at');
        });

        Schema::table('archives', function (Blueprint $table) {
            $table->index('uploaded_by');
            $table->index('file_type');
            $table->index('created_at');
        });

        // Add check constraints for data integrity
        if (Schema::getConnection()->getDriverName() === 'pgsql') {
            // PostgreSQL specific constraints
            DB::statement('ALTER TABLE admins ADD CONSTRAINT check_admin_role CHECK (role IN (\'super_admin\', \'content_admin\'))');
            DB::statement('ALTER TABLE contents ADD CONSTRAINT check_content_type CHECK (content_type IN (\'article\', \'tutorial\', \'research\', \'news\', \'project\', \'event\'))');
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Drop indexes
        Schema::table('admins', function (Blueprint $table) {
            $table->dropIndex(['role']);
            $table->dropIndex(['member_id']);
        });

        Schema::table('contents', function (Blueprint $table) {
            $table->dropIndex(['created_by']);
            $table->dropIndex(['content_type']);
            $table->dropIndex(['created_at']);
        });

        Schema::table('members', function (Blueprint $table) {
            $table->dropIndex(['member_role']);
            $table->dropIndex(['member_name']);
        });

        Schema::table('admin_logs', function (Blueprint $table) {
            $table->dropIndex(['admin_id']);
            $table->dropIndex(['action']);
            $table->dropIndex(['table_name']);
            $table->dropIndex(['created_at']);
        });

        Schema::table('galleries', function (Blueprint $table) {
            $table->dropIndex(['uploaded_by']);
            $table->dropIndex(['created_at']);
        });

        Schema::table('archives', function (Blueprint $table) {
            $table->dropIndex(['uploaded_by']);
            $table->dropIndex(['file_type']);
            $table->dropIndex(['created_at']);
        });

        // Drop check constraints
        if (Schema::getConnection()->getDriverName() === 'pgsql') {
            DB::statement('ALTER TABLE admins DROP CONSTRAINT IF EXISTS check_admin_role');
            DB::statement('ALTER TABLE contents DROP CONSTRAINT IF EXISTS check_content_type');
        }
    }
};
