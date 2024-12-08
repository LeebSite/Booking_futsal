<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log; // Tambahkan ini

class AuthController extends Controller
{
    public function login()
    {
        return view('login'); // Menampilkan halaman login
    }

    public function autentic(Request $request)
    { 
        // Validasi input login
        $credentials = $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);
    
        // Log kredensial yang diterima
        \Log::info('Login attempt: ', $credentials);
    
        // Periksa kredensial pengguna
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
    
            // Ambil pengguna yang sedang login
            $user = Auth::user();
            \Log::info('User  logged in: ', ['username' => $user->username, 'role' => $user->role]);
    
            // Cek role dan arahkan ke halaman yang sesuai
            if ($user->role === 'admin') {
                return redirect('/admin/beranda'); // Admin ke dashboard admin
            } elseif ($user->role === 'customer') {
                return redirect('/customer/beranda'); // Customer ke dashboard customer
            }
    
            // Jika role tidak valid
            Auth::logout(); // Logout otomatis
            return back()->withErrors(['loginError' => 'Role tidak valid.']);
        }
    
        // Jika kredensial salah
        return back()->withErrors(['loginError' => 'Username atau password salah.']);
    }

    public function logout(Request $request)
    {
        Auth::logout(); // Menghapus sesi pengguna

        // Menghapus sesi Laravel
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/'); // Mengarahkan ke landing page
    }
    
}
