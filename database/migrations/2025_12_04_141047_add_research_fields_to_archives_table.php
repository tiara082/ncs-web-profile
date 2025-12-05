<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('archives', function (Blueprint $table) {
            $table->string('publication')->nullable()->after('description');
            $table->string('year')->nullable()->after('publication');
            $table->string('cover_image')->nullable()->after('year');
            $table->foreignId('author_id')->nullable()->after('cover_image')->constrained('members')->onDelete('set null');
            $table->string('type')->default('document')->after('category'); // document, research, publication
        });
    }

    public function down(): void
    {
        Schema::table('archives', function (Blueprint $table) {
            $table->dropForeign(['author_id']);
            $table->dropColumn(['publication', 'year', 'cover_image', 'author_id', 'type']);
        });
    }
};
