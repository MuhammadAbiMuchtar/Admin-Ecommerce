<?php

// Import class-class yang diperlukan untuk migration Laravel
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

// Membuat migration untuk tabel 'produk'
return new class extends Migration
{
    /**
     * Menjalankan migration.
     * Fungsi ini akan membuat tabel 'produk' dengan struktur sesuai kebutuhan aplikasi.
     */
    public function up(): void
    {
        Schema::create('produk', function (Blueprint $table) {
            $table->id(); // Primary key auto increment
            $table->unsignedBigInteger('kategori_id'); // Relasi ke tabel kategori
            $table->unsignedBigInteger('user_id'); // Relasi ke tabel user
            $table->boolean('status'); // Status produk (misal: aktif/tidak aktif)
            $table->string('nama_produk'); // Nama produk
            $table->text('detail'); // Deskripsi/detail produk
            $table->double('harga'); // Harga produk
            $table->integer('stok'); // Stok produk
            $table->float('berat'); // Berat produk
            $table->string('satuan_berat')->nullable(); // Satuan berat (misal: gram, kg), boleh kosong
            $table->string('foto'); // Foto thumbnail produk
            $table->timestamps(); // Kolom created_at & updated_at
            $table->foreign('kategori_id')->references('id')->on('kategori'); // Foreign key ke tabel kategori
            $table->foreign('user_id')->references('id')->on('user'); // Foreign key ke tabel user
        });
    }

    /**
     * Membatalkan migration.
     * Fungsi ini akan menghapus tabel 'produk' jika sudah ada.
     */
    public function down(): void
    {
        Schema::dropIfExists('produk');
    }
};
