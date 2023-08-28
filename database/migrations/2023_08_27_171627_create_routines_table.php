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
        Schema::create('routines', function (Blueprint $table) {
            $table->id();
            $table->string('file');
            $table->unsignedBigInteger('semester_id');
            $table->unsignedBigInteger('batch_id');
            $table->unsignedBigInteger('section_id');
            $table->string('name');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('semester_id')->references('id')->on('semesters')->ondelete('cascade');
            $table->foreign('batch_id')->references('id')->on('batches')->ondelete('cascade');
            $table->foreign('section_id')->references('id')->on('sections')->ondelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('routines');
    }
};
