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
        Schema::create('grades', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('faculty_id');
            $table->unsignedBigInteger('semester_id');
            $table->unsignedBigInteger('section_id');
            $table->unsignedBigInteger('batch_id');
            $table->timestamps();
            $table->softdeletes();

            $table->foreign('batch_id')->references('id')->on('batches')->ondelete('cascade');
            $table->foreign('section_id')->references('id')->on('sections')->ondelete('cascade');
            $table->foreign('semester_id')->references('id')->on('semesters')->ondelete('cascade');
            $table->foreign('faculty_id')->references('id')->on('faculties')->ondelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('grades');
    }
};
