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
        // Create audit trails table for comprehensive tracking
        Schema::create('audit_trails', function (Blueprint $table) {
            $table->id();
            $table->string('user_type'); // admin, member, public
            $table->unsignedBigInteger('user_id')->nullable();
            $table->string('action'); // create, update, delete, login, logout, view
            $table->string('table_name')->nullable();
            $table->unsignedBigInteger('record_id')->nullable();
            $table->json('old_values')->nullable();
            $table->json('new_values')->nullable();
            $table->string('ip_address')->nullable();
            $table->string('user_agent')->nullable();
            $table->string('session_id')->nullable();
            $table->timestamps();

            $table->index(['user_type', 'user_id']);
            $table->index(['action']);
            $table->index(['table_name', 'record_id']);
            $table->index('created_at');
        });

        // Create content_versions table for content versioning
        Schema::create('content_versions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('content_id')->constrained()->onDelete('cascade');
            $table->foreignId('created_by')->nullable()->constrained('admins')->onDelete('set null');
            $table->string('title');
            $table->text('body');
            $table->string('content_type');
            $table->json('metadata')->nullable();
            $table->string('change_summary')->nullable();
            $table->timestamps();

            $table->index(['content_id', 'created_at']);
            $table->index('created_by');
        });

        // Create user_sessions table for session management
        Schema::create('user_sessions', function (Blueprint $table) {
            $table->id();
            $table->string('session_id')->unique();
            $table->string('user_type'); // admin, member
            $table->unsignedBigInteger('user_id');
            $table->string('ip_address')->nullable();
            $table->string('user_agent')->nullable();
            $table->timestamp('last_activity');
            $table->timestamps();

            $table->index(['user_type', 'user_id']);
            $table->index('session_id');
            $table->index('last_activity');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('audit_trails');
        Schema::dropIfExists('content_versions');
        Schema::dropIfExists('user_sessions');
    }
};
