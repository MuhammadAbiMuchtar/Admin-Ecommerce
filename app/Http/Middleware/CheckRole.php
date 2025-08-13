<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    public function handle(Request $request, Closure $next, ...$roles)
    {
        if (!Auth::check()) {
            return redirect('login');
        }

        $user = Auth::user();
        
        // Convert roles dari string ke array
        foreach ($roles as $role) {
            if ($user->role == $role) {
                return $next($request);
            }
        }

        // Jika role tidak sesuai, redirect ke beranda dengan pesan error
        return redirect()
            ->route('backend.beranda')
            ->with('error', 'Anda tidak memiliki akses ke halaman tersebut!');
    }
} 