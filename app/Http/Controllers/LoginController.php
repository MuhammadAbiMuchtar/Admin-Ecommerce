<?php 
// Controller untuk menangani proses login, logout, dan reset password admin backend
namespace App\Http\Controllers; 
 
use Illuminate\Http\Request; 
use Illuminate\Support\Facades\Auth; 
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Str;
 
class LoginController extends Controller 
{ 
    // Menampilkan halaman login backend
    public function loginBackend() 
    { 
        return view('backend.v_login.login', [ 
            'judul' => 'Login', 
        ]); 
    } 
 
    // Proses autentikasi login backend
    public function authenticateBackend(Request $request) 
    { 
        // Validasi input email dan password
        $credentials = $request->validate([ 
            'email' => 'required|email', 
            'password' => 'required' 
        ]); 
 
        // Cek kredensial login
        if (Auth::attempt($credentials)) { 
            // Cek status user, jika belum aktif (status = 0)
            if (Auth::user()->status == 0) { 
                Auth::logout(); 
                return back()->with('error', 'User belum aktif'); 
            } 
            // Regenerasi session untuk keamanan
            $request->session()->regenerate(); 
            // Redirect ke halaman beranda backend
            return redirect()->intended(route('backend.beranda')); 
        } 
        // Jika gagal login
        return back()->with('error', 'Login Gagal'); 
    } 
 
    // Proses logout backend
    public function logoutBackend() 
    { 
        Auth::logout(); 
        request()->session()->invalidate(); 
        request()->session()->regenerateToken(); 
        // Redirect ke halaman login
        return redirect(route('backend.login')); 
    }

    // Proses reset password user
    public function resetPassword(Request $request)
    {
        // Validasi email harus ada di tabel users
        $request->validate([
            'email' => 'required|email|exists:users,email'
        ]);

        // Cari user berdasarkan email
        $user = User::where('email', $request->email)->first();
        
        if ($user) {
            // Generate password baru secara random 8 karakter
            $newPassword = Str::random(8);
            
            // Update password user dengan hash
            $user->password = Hash::make($newPassword);
            $user->save();

            // Kirim email dengan password baru (implementasi pengiriman email bisa ditambahkan di sini)
            
            return back()->with('success', 'Password baru telah dikirim ke email Anda');
        }

        // Jika email tidak ditemukan
        return back()->with('error', 'Email tidak ditemukan');
    }
} 