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
        Schema::create('notifications', function (Blueprint $table) {
            $table->id('id_notification');
            $table->index('npm');
            $table->foreignId('npm')->references('npm')->on('member')->onDelete('cascade');
            $table->index('id_transaksi_peminjaman');
            $table->foreignId('id_transaksi_peminjaman')->references('id_transaksi_peminjaman')->on('transaksi_peminjaman')->onDelete('cascade');
            $table->date('tanggal_notifikasi');
            $table->text('pesan');
            $table->enum('status', ['belum dibaca', 'sudah dibaca'])->default('belum dibaca');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notifications');
    }
};
