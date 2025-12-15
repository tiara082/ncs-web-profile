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
        Schema::table('archives', function (Blueprint $table) {
            $table->text('keywords')->nullable()->after('description');
            $table->string('doi')->nullable()->after('keywords');
            $table->string('issn_journal')->nullable()->after('doi');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('archives', function (Blueprint $table) {
            $table->dropColumn(['keywords', 'doi', 'issn_journal']);
        });
    }
};
