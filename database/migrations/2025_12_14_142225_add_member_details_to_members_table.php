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
            $table->text('biography')->nullable()->after('slug');
            $table->json('education')->nullable()->after('biography');
            $table->json('research')->nullable()->after('education');
            $table->json('projects')->nullable()->after('research');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('members', function (Blueprint $table) {
            $table->dropColumn(['biography', 'education', 'research', 'projects']);
        });
    }
};
