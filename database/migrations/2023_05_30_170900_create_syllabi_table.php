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
        Schema::create('syllabi', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('subject_id');
            $table->softdeletes();
            $table->timestamps();

            $table->foreign('subject_id')->references('id')->on('subjects')->ondelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('syllabi');
    }
};
