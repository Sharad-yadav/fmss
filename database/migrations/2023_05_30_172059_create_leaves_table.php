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
        Schema::create('leaves', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('leave_type_id');
            $table->unsignedBigInteger('teacher_id');
            $table->unsignedBigInteger('student_id');
            $table->softdeletes();
            $table->timestamps();

            $table->foreign('leave_type_id')->references('id')->on('leave_types')->ondelete('cascade');
            $table->foreign('teacher_id')->references('id')->on('teachers')->ondelete('cascade');
            $table->foreign('student_id')->references('id')->on('students')->ondelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('leaves');
    }
};
