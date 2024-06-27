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
        Schema::create('subs_kriterias', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('kriteria_id'); 
            $table->string('nama');
            $table->integer('nilai');
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('kriteria_id')->references('id')->on('kriterias');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subs_kriterias');
    }
};
