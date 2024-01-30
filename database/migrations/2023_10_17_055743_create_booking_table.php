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
        Schema::create('booking', function (Blueprint $table) {
            $table->id();
            $table->string('kode_ruangan');
            $table->foreign('kode_ruangan')->references('kode_ruangan')->on('ruangan')->onDelete('cascade');
            $table->index('npm');
            $table->foreignId('npm')->references('npm')->on('member')->onDelete('cascade');
            $table->date('tanggal');
            $table->string('waktu');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('booking');
    }
};
