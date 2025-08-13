<?php 

namespace App\Models; 

// Import trait dan class yang diperlukan untuk model User
// use Illuminate\Contracts\Auth\MustVerifyEmail; 
use Illuminate\Database\Eloquent\Factories\HasFactory; 
use Illuminate\Foundation\Auth\User as Authenticatable; 
use Illuminate\Notifications\Notifiable; 
use Laravel\Sanctum\HasApiTokens; 

// Model User mewarisi Authenticatable untuk fitur autentikasi
class User extends Authenticatable 
{ 
    // Menggunakan trait untuk fitur API Token, Factory, dan Notifikasi
    use HasApiTokens, HasFactory, Notifiable; 
 
    /** 
     * Nama tabel yang digunakan oleh model ini.
     *
     * @var string
     */ 
    protected $table = "user"; 

    /**
     * Atribut yang dapat diisi secara massal (mass assignment).
     *
     * @var array<int, string>
     */
    protected $fillable = [ 
        'nama', // Nama pengguna
        'email', // Email pengguna
        'role', // Peran pengguna (admin/user/dll)
        'status', // Status aktif/nonaktif
        'password', // Password pengguna
        'hp', // Nomor HP pengguna
        'foto', // Foto profil pengguna
    ]; 
 
    /** 
     * Atribut yang disembunyikan saat serialisasi (misal ke array/JSON).
     *
     * @var array<int, string>
     */ 
    protected $hidden = [ 
        'password', // Password tidak ditampilkan
        'remember_token', // Token remember me tidak ditampilkan
    ]; 
 
    /** 
     * Atribut yang dikonversi ke tipe data lain secara otomatis.
     *
     * @var array<string, string>
     */ 
    protected $casts = [ 
        'email_verified_at' => 'datetime', // Konversi ke tipe datetime
        'password' => 'hashed', // Password otomatis di-hash
    ]; 
}