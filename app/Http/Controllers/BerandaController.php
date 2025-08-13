<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori;
use App\Models\Produk;
use App\Models\User;

// Controller untuk menangani logika halaman beranda backend
class BerandaController extends Controller
{
    // Fungsi untuk menampilkan data ringkasan pada halaman beranda backend
    public function berandaBackend()
    {
        // Menghitung total kategori yang ada di database
        $totalKategori = Kategori::count();
        // Menghitung total produk yang ada di database
        $totalProduk = Produk::count();
        // Menghitung total user yang ada di database
        $totalUser = User::count();
        // Mengirim data ke view 'backend.v_beranda.index' beserta judul dan total data
        return view('backend.v_beranda.index', [
            'judul' => 'Halaman Beranda',
            'totalKategori' => $totalKategori,
            'totalProduk' => $totalProduk,
            'totalUser' => $totalUser,
        ]);
    }
}
