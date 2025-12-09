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
        Schema::create('galleries', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description')->nullable();
            $table->string('file_path');
            $table->string('gallery_type')->default('image'); // image, video, event, agenda, past_activity
            
            // Event-specific fields
            $table->date('event_date')->nullable();
            $table->time('event_time')->nullable();
            $table->string('event_location')->nullable(); // Alias for location
            $table->string('location')->nullable(); // For backward compatibility
            $table->integer('max_slots')->nullable();
            $table->integer('registered_count')->default(0);
            $table->string('event_status')->nullable(); // upcoming, ongoing, completed, cancelled
            $table->string('event_mode')->nullable(); // online, offline, hybrid
            $table->string('event_category')->nullable(); // workshop, seminar, competition, training
            
            $table->foreignId('uploaded_by')->nullable()->constrained('admins')->onDelete('set null');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('galleries');
    }
};
