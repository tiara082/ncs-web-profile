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
        Schema::create('community_services', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->date('date');
            $table->string('location');
            $table->integer('participants')->default(0);
            $table->enum('category', ['workshop', 'seminar', 'training', 'webinar', 'consultation']);
            $table->string('category_color')->default('blue');
            $table->enum('status', ['upcoming', 'ongoing', 'completed'])->default('upcoming');
            $table->string('image')->nullable();
            $table->unsignedBigInteger('uploaded_by');
            $table->timestamps();

            $table->foreign('uploaded_by')->references('id')->on('admins')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('community_services');
    }
};
