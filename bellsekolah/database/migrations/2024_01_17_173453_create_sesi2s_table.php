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
        Schema::create('sesi2s', function (Blueprint $table) {
            $table->id();
            $table->string('hari'); // Kolom umum untuk menyimpan nama hari
            $table->time('jam');
            $table->string('jadwal');
            $table->string('audio'); // Kolom polimorfik
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sesi2s');
    }
};
