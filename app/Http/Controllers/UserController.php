<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request; 
use App\Models\User; 
use Illuminate\Support\Facades\Hash; 
use App\Helpers\ImageHelper; 

class UserController extends Controller
{
    /**
     * Menampilkan daftar seluruh user.
     */
    public function index()
    {
        // Mengambil semua data user dan mengurutkan berdasarkan waktu update terbaru
        $user = User::orderBy('updated_at', 'desc')->get(); 
        return view('backend.v_user.index', [ 
            'judul' => 'Data User', 
            'index' => $user 
        ]);
    }

    /**
     * Menampilkan form untuk menambah user baru.
     */
    public function create() 
    { 
        return view('backend.v_user.create', [ 
            'judul' => 'Tambah User', 
        ]); 
    }

    /**
     * Menyimpan user baru ke database.
     */
    public function store(Request $request)
    { 
        // Validasi input dari form
        $validatedData = $request->validate([ 
            'nama' => 'required|max:255', 
            'email' => 'required|max:255|email|unique:user', 
            'role' => 'required', 
            'hp' => 'required|min:10|max:13', 
            'password' => 'required|min:4|confirmed', 
            'foto' => 'image|mimes:jpeg,jpg,png,gif|file|max:1024', 
        ], $messages = [ 
            'foto.image' => 'Format gambar gunakan file dengan ekstensi jpeg, jpg, png, atau gif.', 
            'foto.max' => 'Ukuran file gambar Maksimal adalah 1024 KB.' 
        ]); 
        $validatedData['status'] = 0; 

        // Jika ada file foto yang diupload, proses dan simpan menggunakan ImageHelper
        if ($request->file('foto')) { 
            $file = $request->file('foto'); 
            $extension = $file->getClientOriginalExtension(); 
            $originalFileName = date('YmdHis') . '_' . uniqid() . '.' . $extension; 
            $directory = 'storage/img-user/'; 
            // Simpan gambar dengan ukuran yang ditentukan 
            ImageHelper::uploadAndResize($file, $directory, $originalFileName, 385, 400); // null (jika tinggi otomatis) 
            // Simpan nama file asli di database 
            $validatedData['foto'] = $originalFileName; 
        } 

        // Validasi password harus kombinasi huruf besar, kecil, angka, dan simbol
        $password = $request->input('password'); 
        $pattern = '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[\W_]).+$/'; 
        // huruf kecil ([a-z]), huruf besar ([A-Z]), dan angka (\d) (?=.*[\W_]) simbol karakter (non-alphanumeric) 
        if (preg_match($pattern, $password)) { 
            $validatedData['password'] = Hash::make($validatedData['password']); 
            User::create($validatedData, $messages); 
            return redirect()->route('backend.user.index')->with('success', 'Data berhasil tersimpan'); 
        } else { 
            // Jika password tidak sesuai pola, kembalikan ke form dengan pesan error
            return redirect()->back()->withErrors(['password' => 'Password harus terdiri dari kombinasi huruf besar, huruf kecil, angka, dan simbol karakter.']); 
        } 
    }

    /**
     * Menampilkan detail user tertentu (belum diimplementasikan).
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Menampilkan form edit user berdasarkan id.
     */
    public function edit(string $id)
    {
        $user = User::findOrFail($id);
        return view('backend.v_user.edit', [
            'judul' => 'Ubah User',
            'edit' => $user
        ]);
    }

    /**
     * Memperbarui data user di database.
     */
    public function update(Request $request, string $id)
    {
        // Mengambil data user berdasarkan id
        $user = User::findOrFail($id);
        $rules = [
            'nama' => 'required|max:255',
            'role' => 'required',
            'status' => 'required',
            'hp' => 'required|min:10|max:13',
            'foto' => 'image|mimes:jpeg,jpg,png,gif|file|max:1024',
        ];
        $messages = [
            'foto.image' => 'Format gambar gunakan file dengan ekstensi jpeg, jpg, png, atau gif.',
            'foto.max' => 'Ukuran file gambar Maksimal adalah 1024 KB.'
        ];

        // Jika email diubah, validasi email harus unik
        if ($request->email != $user->email) {
            $rules['email'] = 'required|max:255|email|unique:user';
        }
        $validatedData = $request->validate($rules, $messages);

        // Jika ada file foto baru, hapus foto lama dan simpan foto baru
        if ($request->file('foto')) {
            //hapus gambar lama
            if ($user->foto) {
                $oldImagePath = public_path('storage/img-user/') . $user->foto;
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }
            $file = $request->file('foto');
            $extension = $file->getClientOriginalExtension();
            $originalFileName = date('YmdHis') . '_' . uniqid() . '.' . $extension;
            $directory = 'storage/img-user/';
            // Simpan gambar dengan ukuran yang ditentukan
            ImageHelper::uploadAndResize($file, $directory, $originalFileName, 385, 400); // null (jika tinggi otomatis)
            // Simpan nama file asli di database
            $validatedData['foto'] = $originalFileName;
        }

        // Update data user
        $user->update($validatedData);
        return redirect()->route('backend.user.index')->with('success', 'Data berhasil diperbaharui');
    }

    /**
     * Menampilkan form filter laporan user berdasarkan tanggal.
     */
    public function formUser() 
    { 
        return view('backend.v_user.form', [ 
            'judul' => 'Laporan Data User', 
        ]); 
    } 
 
    /**
     * Mencetak laporan user berdasarkan rentang tanggal.
     */
    public function cetakUser(Request $request) 
    { 
        // Menambahkan aturan validasi tanggal
        $request->validate([ 
            'tanggal_awal' => 'required|date', 
            'tanggal_akhir' => 'required|date|after_or_equal:tanggal_awal', 
        ], [ 
            'tanggal_awal.required' => 'Tanggal Awal harus diisi.', 
            'tanggal_akhir.required' => 'Tanggal Akhir harus diisi.', 
            'tanggal_akhir.after_or_equal' => 'Tanggal Akhir harus lebih besar atau sama dengan Tanggal Awal.', 
        ]); 
 
        $tanggalAwal = $request->input('tanggal_awal'); 
        $tanggalAkhir = $request->input('tanggal_akhir'); 
 
        // Query user berdasarkan tanggal pembuatan
        $query =  User::whereBetween('created_at', [$tanggalAwal, $tanggalAkhir]) 
            ->orderBy('id', 'desc'); 
 
        $user = $query->get(); 
        return view('backend.v_user.cetak', [ 
            'judul' => 'Laporan User', 
            'tanggalAwal' => $tanggalAwal, 
            'tanggalAkhir' => $tanggalAkhir, 
            'cetak' => $user 
        ]); 
    } 

    /**
     * Menghapus user dari database beserta foto jika ada.
     */
    public function destroy(string $id)
    {
        $user = user::findOrFail($id); 
        if ($user->foto) { 
            $oldImagePath = public_path('storage/img-user/') . $user->foto; 
            if (file_exists($oldImagePath)) { 
                unlink($oldImagePath); 
            } 
        } 
        $user->delete(); 
        return redirect()->route('backend.user.index')->with('success', 'Data berhasil dihapus');
    }

    /**
     * Menampilkan halaman profil pengguna yang sedang login.
     */
    public function profile()
    {
        $user = auth()->user();
        return view('backend.v_user.profile', [
            'judul' => 'Profil Saya',
            'user' => $user
        ]);
    }
}
