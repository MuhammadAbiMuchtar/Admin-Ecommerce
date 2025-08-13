<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori;

class KategoriController extends Controller
{
    /**
     * Menampilkan daftar seluruh kategori.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Mengambil semua data kategori dari database, diurutkan berdasarkan nama_kategori secara ascending
        $kategori = Kategori::orderBy('nama_kategori', 'asc')->get();
        // Menampilkan view index kategori beserta data yang diambil
        return view('backend.v_kategori.index', [
            'judul' => 'Data Kategori',
            'index' => $kategori
        ]);
    }

    /**
     * Menampilkan form untuk membuat kategori baru.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        // Menampilkan view form create kategori
        return view('backend.v_kategori.create', [
            'judul' => 'Kategori',
        ]);
    }

    /**
     * Menyimpan data kategori baru ke database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        // Validasi input dari form
        $validatedData = $request->validate([
            'nama_kategori' => 'required|max:255|unique:kategori',
        ]);
        // Simpan data kategori ke database
        Kategori::create($validatedData);
        // Redirect ke halaman index kategori dengan pesan sukses
        return redirect()->route('backend.kategori.index')->with('success', 'Data berhasil tersimpan');
    }

    /**
     * Tidak digunakan, namun bisa digunakan untuk menampilkan detail kategori tertentu.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Menampilkan form edit untuk kategori tertentu.
     *
     * @param  string  $id
     * @return \Illuminate\View\View
     */
    public function edit(string $id)
    {
        // Mengambil data kategori berdasarkan id
        $kategori = Kategori::find($id);
        // Menampilkan view edit kategori beserta data yang diambil
        return view('backend.v_kategori.edit', [
            'judul' => 'Data Kategori',
            'edit' => $kategori
        ]);
    }

    /**
     * Memperbarui data kategori di database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, string $id)
    {
        // Aturan validasi, nama_kategori harus unik kecuali untuk id yang sedang diedit
        $rules = [
            'nama_kategori' => 'required|max:255|unique:kategori,nama_kategori,' . $id,
        ];
        // Validasi input
        $validatedData = $request->validate($rules);
        // Update data kategori di database
        Kategori::where('id', $id)->update($validatedData);
        // Redirect ke halaman index kategori dengan pesan sukses
        return redirect()->route('backend.kategori.index')->with('success', 'Data berhasil diperbaharui');
    }

    /**
     * Menghapus data kategori dari database.
     *
     * @param  string  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(string $id)
    {
        // Mengambil data kategori berdasarkan id, jika tidak ditemukan akan error
        $kategori = Kategori::findOrFail($id);
        // Hapus data kategori
        $kategori->delete();
        // Redirect ke halaman index kategori dengan pesan sukses
        return redirect()->route('backend.kategori.index')->with('success', 'Data berhasil dihapus');
    }
}
