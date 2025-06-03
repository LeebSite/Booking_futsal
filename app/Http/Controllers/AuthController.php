<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;
use App\Models\Pengguna;

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
    
    public function register()
    {
        return view('register'); // Menampilkan halaman register
    }
    
    public function store(Request $request)
    {
        // Validasi input registrasi
        $validated = $request->validate([
            'nama' => 'required|string|max:100',
            'username' => 'required|string|max:100|unique:pengguna',
            'email' => 'required|string|email|max:100|unique:pengguna',
            'no_hp' => 'required|string',
            'tanggal_lahir' => 'required|date',
            'password' => 'required|string|min:6',
        ]);
        
        // Buat pengguna baru
        $pengguna = Pengguna::create([
            'nama' => $validated['nama'],
            'username' => $validated['username'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'role' => 'customer', // Default role untuk pendaftar baru
        ]);
        
        // Log pendaftaran berhasil
        \Log::info('User registered: ', ['username' => $pengguna->username]);
        
        // Redirect ke halaman login dengan pesan sukses
        return redirect('/login')->with('success', 'Pendaftaran berhasil! Silakan login.');
    }
}
