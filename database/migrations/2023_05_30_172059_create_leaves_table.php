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
            $table->integer('leave_type_id');
            $table->string('description')->nullable();
            $table->date('date')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->softdeletes();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->ondelete('cascade');
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
