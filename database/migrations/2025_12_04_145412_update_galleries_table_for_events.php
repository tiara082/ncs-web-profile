<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('galleries', function (Blueprint $table) {
            // Change gallery_type to support agenda and past_activity
            $table->string('gallery_type')->default('agenda')->change();
            
            // Add event-specific fields
            $table->date('event_date')->nullable()->after('description');
            $table->time('event_time')->nullable()->after('event_date');
            $table->string('location')->nullable()->after('event_time');
            $table->integer('max_slots')->nullable()->after('location');
            $table->integer('registered_count')->default(0)->after('max_slots');
            $table->string('event_status')->default('upcoming')->after('registered_count'); // upcoming, ongoing, completed
            $table->string('event_mode')->nullable()->after('event_status'); // online, offline, hybrid
            $table->text('event_category')->nullable()->after('event_mode'); // workshop, competition, seminar, etc
        });
    }

    public function down(): void
    {
        Schema::table('galleries', function (Blueprint $table) {
            $table->dropColumn([
                'event_date', 'event_time', 'location', 'max_slots', 
                'registered_count', 'event_status', 'event_mode', 'event_category'
            ]);
        });
    }
};
