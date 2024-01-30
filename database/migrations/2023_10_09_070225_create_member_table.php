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
        Schema::create('member', function (Blueprint $table) {
            $table->id('npm');
            $table->string('nama');
            $table->string('password');
            $table->string('email');
            $table->string('fakultas');
            $table->string('program_studi');
            $table->string('avatar')->default('avatar/avatar.png');
            $table->string('verifikasi')->default('belum verifikasi');
            $table->string('token')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('member');
    }
};
