<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

// Migration untuk membuat tabel 'kategori' di database
return new class extends Migration
{
    /**
     * Jalankan migrasi.
     * Fungsi ini akan membuat tabel 'kategori' dengan kolom 'id' dan 'nama_kategori'.
     */
    public function up(): void
    {
        Schema::create('kategori', function (Blueprint $table) {
            $table->id(); // Kolom primary key auto increment
            $table->string('nama_kategori'); // Kolom untuk nama kategori
        });
    }

    /**
     * Membatalkan migrasi.
     * Fungsi ini akan menghapus tabel 'kategori' jika sudah ada.
     */
    public function down(): void
    {
        Schema::dropIfExists('kategori'); // Menghapus tabel 'kategori'
    }
};
