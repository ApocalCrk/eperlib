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
        Schema::create('like_books', function (Blueprint $table) {
            $table->id();
            $table->index('npm');
            $table->foreignId('npm')->references('npm')->on('member')->onDelete('cascade');
            $table->index('isbn');
            $table->foreignId('isbn')->references('isbn')->on('buku')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('like_books');
    }
};
