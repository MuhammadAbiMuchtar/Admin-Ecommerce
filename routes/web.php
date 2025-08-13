<?php 

use Illuminate\Support\Facades\Route; 
use App\Http\Controllers\BerandaController; 
use App\Http\Controllers\LoginController; 
use App\Http\Controllers\UserController; 
use App\Http\Controllers\KategoriController; 
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\HomeController;

// Redirect root ke halaman login
Route::get('/', function () {
    return redirect()->route('backend.login');
});

// ==================== AUTH & LOGIN ====================
Route::get('login', [LoginController::class, 'loginBackend'])
    ->name('backend.login'); // Halaman login
Route::post('login', [LoginController::class, 'authenticateBackend'])
    ->name('backend.login.process'); // Proses login
Route::post('logout', [LoginController::class, 'logoutBackend'])
    ->name('backend.logout'); // Logout

// Reset Password
// (Jika ingin menampilkan form reset password, tambahkan method di LoginController)
// Route::get('reset-password/{token}', [LoginController::class, 'resetPasswordForm'])->name('backend.reset-password-form');
Route::post('reset-password', [LoginController::class, 'resetPassword'])
    ->name('backend.reset-password'); // Proses reset password

// Route group untuk yang sudah login
Route::middleware(['auth'])->group(function () {
    // ==================== BERANDA ====================
    Route::get('beranda', [BerandaController::class, 'berandaBackend'])
        ->name('backend.beranda'); // Halaman beranda admin

    // Route khusus Super Admin
    Route::middleware(['role:1'])->group(function () {
        // ==================== USER ====================
        Route::resource('user', UserController::class, [
            'as' => 'backend'
        ]); // CRUD user
        Route::get('user-form', [UserController::class, 'formUser'])
            ->name('backend.user.form'); // Form laporan user
        Route::post('user-cetak', [UserController::class, 'cetakUser'])
            ->name('backend.user.cetak'); // Cetak laporan user
        Route::get('user/profile', [UserController::class, 'profile'])
            ->name('backend.user.profile'); // Profil user

        // Laporan User (sidebar)
        Route::get('laporan/user', [UserController::class, 'formUser'])
            ->name('backend.laporan.user');
        Route::post('laporan/cetakuser', [UserController::class, 'cetakUser'])
            ->name('backend.laporan.cetakuser');
    });

    // Route untuk Admin dan Super Admin
    Route::middleware(['role:0,1'])->group(function () {
        // ==================== KATEGORI ====================
        Route::resource('kategori', KategoriController::class, [
            'as' => 'backend'
        ]); // CRUD kategori

        // ==================== PRODUK ====================
        Route::resource('produk', ProdukController::class, [
            'as' => 'backend'
        ]); // CRUD produk
        Route::get('produk/{produk}/show', [ProdukController::class, 'show'])
            ->name('backend.produk.show'); // Detail produk (gambar)
        Route::get('produk-form', [ProdukController::class, 'formProduk'])
            ->name('backend.produk.form'); // Form laporan produk
        Route::post('produk-cetak', [ProdukController::class, 'cetakProduk'])
            ->name('backend.produk.cetak'); // Cetak laporan produk
        Route::post('foto-produk', [ProdukController::class, 'storeFoto'])
            ->name('backend.foto_produk.store'); // Simpan foto produk tambahan
        Route::delete('foto-produk/{id}', [ProdukController::class, 'destroyFoto'])
            ->name('backend.foto_produk.destroy'); // Hapus foto produk tambahan

        // Laporan Produk (sidebar)
        Route::get('laporan/produk', [ProdukController::class, 'formProduk'])
            ->name('backend.laporan.produk');
        Route::post('laporan/cetakproduk', [ProdukController::class, 'cetakProduk'])
            ->name('backend.laporan.cetakproduk');
    });
});

