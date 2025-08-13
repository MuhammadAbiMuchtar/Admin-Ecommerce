<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

// File migrasi untuk membuat tabel 'user' pada database
return new class extends Migration
{
    /**
     * Menjalankan migrasi.
     */
    public function up(): void
    {
        // Membuat tabel 'user' dengan kolom-kolom berikut
        Schema::create('user', function (Blueprint $table) { 
            $table->id(); // Primary key, auto increment
            $table->string('nama'); // Nama user
            $table->string('email')->unique(); // Email user, harus unik
            $table->enum('role', [0, 1, 2])->default(0); // Role user: 0 = Admin, 1 = SuperAdmin, 2 = Customer
            $table->boolean('status'); // Status user: 0 = Belum aktif, 1 = Aktif
            $table->string('password'); // Password user
            $table->string('hp', 13); // Nomor HP user, maksimal 13 karakter
            $table->string('foto')->nullable(); // Foto user, boleh kosong/null
            $table->timestamps(); // Kolom created_at & updated_at
        }); 
    }

    /**
     * Membatalkan migrasi.
     */
    public function down(): void
    {
        // Menghapus tabel 'users' jika rollback
        Schema::dropIfExists('users');
    }
};
