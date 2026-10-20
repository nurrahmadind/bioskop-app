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
        Schema::create('jadwals', function (Blueprint $table) {
        $table->id();
        $table->foreignId('film_id')->constrained('films')->onDelete('cascade');
        $table->date('tanggal_tayang');
        $table->time('jam_tayang');
        $table->integer('harga'); // <--- Kolom harga dimasukkan di sini
        $table->timestamps();
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jadwals');
    }
};
