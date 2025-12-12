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
        // Optimize content tables for better performance
        Schema::table('contents', function (Blueprint $table) {
            // Add full-text search index for PostgreSQL
            if (Schema::getConnection()->getDriverName() === 'pgsql') {
                DB::statement('CREATE INDEX contents_fulltext_search ON contents USING gin(to_tsvector(\'english\', title || \' \' || body))');
            }

            // Add JSON column for flexible metadata
            $table->json('metadata')->nullable()->after('body');
            
            // Add published_at column for content scheduling
            $table->timestamp('published_at')->nullable()->after('created_at');
            
            // Add status column for content workflow
            $table->enum('status', ['draft', 'published', 'archived'])->default('draft')->after('content_type');
        });

        Schema::table('members', function (Blueprint $table) {
            // Add JSON column for flexible member data
            $table->json('social_links')->nullable()->after('member_linkedin');
            $table->json('achievements')->nullable()->after('member_skills');
            $table->boolean('is_active')->default(true)->after('member_image');
        });

        Schema::table('galleries', function (Blueprint $table) {
            // Add sorting and metadata
            $table->integer('sort_order')->default(0)->after('id');
            $table->json('metadata')->nullable()->after('image_path');
            $table->boolean('is_featured')->default(false)->after('description');
        });

        Schema::table('archives', function (Blueprint $table) {
            // Add file metadata
            $table->integer('file_size')->nullable()->after('file_type');
            $table->string('mime_type')->nullable()->after('file_size');
            $table->json('metadata')->nullable()->after('file_path');
            $table->integer('download_count')->default(0)->after('description');
        });

        // Add content_categories pivot table if not exists
        if (!Schema::hasTable('content_categories')) {
            Schema::create('content_categories', function (Blueprint $table) {
                $table->id();
                $table->foreignId('content_id')->constrained()->onDelete('cascade');
                $table->foreignId('category_id')->constrained()->onDelete('cascade');
                $table->timestamps();

                $table->unique(['content_id', 'category_id']);
                $table->index(['content_id', 'category_id']);
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Drop full-text search index
        if (Schema::getConnection()->getDriverName() === 'pgsql') {
            DB::statement('DROP INDEX IF EXISTS contents_fulltext_search');
        }

        Schema::table('contents', function (Blueprint $table) {
            $table->dropColumn(['metadata', 'published_at', 'status']);
        });

        Schema::table('members', function (Blueprint $table) {
            $table->dropColumn(['social_links', 'achievements', 'is_active']);
        });

        Schema::table('galleries', function (Blueprint $table) {
            $table->dropColumn(['sort_order', 'metadata', 'is_featured']);
        });

        Schema::table('archives', function (Blueprint $table) {
            $table->dropColumn(['file_size', 'mime_type', 'metadata', 'download_count']);
        });

        // Drop content_categories table
        Schema::dropIfExists('content_categories');
    }
};
