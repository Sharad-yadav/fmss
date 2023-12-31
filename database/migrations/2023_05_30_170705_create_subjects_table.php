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
        Schema::create('subjects', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('semester_id');
            $table->string('code');
            $table->string('name');
            $table->string('credit_hour');
            $table->softdeletes();
            $table->timestamps();

            $table->foreign('semester_id')->references('id')->on('semesters')->ondelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subjects');
    }
};
