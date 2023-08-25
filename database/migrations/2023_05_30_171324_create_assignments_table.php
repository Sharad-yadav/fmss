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
        Schema::create('assignments', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('subject_id');
            $table->unsignedBigInteger('teacher_id');
            $table->unsignedBigInteger('section_id');
            $table->unsignedBigInteger('batch_id');

            $table->string('file');
            $table->string('assignments');
            $table->date('submission_date');
            $table->softdeletes();
            $table->timestamps();

            $table->foreign('batch_id')->references('id')->on('batches')->ondelete('cascade');
            $table->foreign('section_id')->references('id')->on('sections')->ondelete('cascade');
            $table->foreign('subject_id')->references('id')->on('subjects')->ondelete('cascade');
            $table->foreign('teacher_id')->references('id')->on('teachers')->ondelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('assignments');
    }
};
