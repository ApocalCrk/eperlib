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
        Schema::create('transaksi_pengembalian', function (Blueprint $table) {
            $table->id('id_pengembalian');
            $table->index('id_transaksi_peminjaman');
            $table->foreignId('id_transaksi_peminjaman')->references('id_transaksi_peminjaman')->on('transaksi_peminjaman')->onDelete('cascade');
            $table->date('tanggal_kembali');
            $table->integer('denda');
            $table->enum('status_pembayaran', ['tidak ada denda', 'belum dibayar', 'sudah dibayar'])->default('tidak ada denda');
            $table->string('bukti_pengembalian')->nullable();
            $table->enum('status', ['diproses', 'diterima', 'ditolak'])->default('diproses');
            $table->text('keterangan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksi_pengembalian');
    }
};
