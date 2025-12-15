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
        Schema::table('members', function (Blueprint $table) {
            $table->jsonb('name_variations')->nullable()->after('nip');
            $table->jsonb('email_variations')->nullable()->after('name_variations');
            $table->jsonb('phone_variations')->nullable()->after('email_variations');
            $table->jsonb('social_links')->nullable()->after('phone_variations');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('members', function (Blueprint $table) {
            $table->dropColumn(['name_variations', 'email_variations', 'phone_variations', 'social_links']);
        });
    }
};
