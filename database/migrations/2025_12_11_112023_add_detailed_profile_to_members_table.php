<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('members', function (Blueprint $table) {
            $table->string('nip')->nullable()->after('member_role');
            $table->string('position')->nullable()->after('nip');
            $table->string('photo')->nullable()->after('position');
            $table->string('linkedin')->nullable()->after('member_email');
            $table->string('github')->nullable()->after('linkedin');
            $table->text('biography')->nullable()->after('github');
            $table->json('skills')->nullable()->after('biography');
            $table->json('education')->nullable()->after('skills');
            $table->json('research')->nullable()->after('education');
            $table->json('projects')->nullable()->after('research');
            $table->string('slug')->nullable()->unique()->after('member_name');
        });
    }

    public function down(): void
    {
        Schema::table('members', function (Blueprint $table) {
            $table->dropColumn(['nip', 'position', 'photo', 'linkedin', 'github', 'biography', 'skills', 'education', 'research', 'projects', 'slug']);
        });
    }
};
