<?php

// Import class-class yang dibutuhkan untuk migration
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

// Migration untuk membuat tabel password_reset_tokens
return new class extends Migration
{
    /**
     * Menjalankan migration: Membuat tabel password_reset_tokens
     */
    public function up(): void
    {
        // Membuat tabel password_reset_tokens
        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary(); // Kolom email sebagai primary key
            $table->string('token'); // Kolom token untuk menyimpan token reset password
            $table->timestamp('created_at')->nullable(); // Kolom waktu pembuatan token, bisa null
        });
    }

    /**
     * Membatalkan migration: Menghapus tabel password_reset_tokens
     */
    public function down(): void
    {
        Schema::dropIfExists('password_reset_tokens'); // Menghapus tabel jika ada
    }
};
