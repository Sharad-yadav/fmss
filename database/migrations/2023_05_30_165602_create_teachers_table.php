<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('teachers', function (Blueprint $table) {
            $table->id('id');

            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('faculty_id');
            $table->string('salary');
            $table->boolean('is_hod')->default(false);
            $table->boolean('is_lab')->default(false);
            $table->softdeletes();

            $table->foreign('user_id')->references('id')->on('users')->ondelete('cascade');
            $table->foreign('faculty_id')->references('id')->on('faculties')->ondelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('teachers');
    }
};
