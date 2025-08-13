<?php

// Import class-class yang dibutuhkan untuk migration Laravel
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

// Mengembalikan class anonymous migration
return new class extends Migration
{
    /**
     * Menjalankan migration.
     * Method ini akan membuat tabel 'foto_produk' di database.
     */
    public function up(): void
    {
        // Membuat tabel 'foto_produk'
        Schema::create('foto_produk', function (Blueprint $table) {
            $table->id(); // Kolom primary key auto increment
            $table->unsignedBigInteger('produk_id'); // Kolom foreign key ke tabel produk
            $table->string('foto'); // Kolom untuk menyimpan nama file foto produk
            $table->timestamps(); // Kolom created_at dan updated_at
            $table->foreign('produk_id')->references('id')->on('produk')->onDelete('cascade'); // Relasi ke tabel produk, jika produk dihapus maka foto juga ikut terhapus
        });
    }

    /**
     * Membatalkan migration.
     * Method ini akan menghapus tabel 'foto_produk' jika sudah ada.
     */
    public function down(): void
    {
        Schema::dropIfExists('foto_produk'); // Menghapus tabel 'foto_produk'
    }
};
