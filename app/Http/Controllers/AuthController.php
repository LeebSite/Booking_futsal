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
            \Log::info('User logged in: ', ['username' => $user->username, 'role' => $user->role]);
    
            // Cek role dan arahkan ke halaman yang sesuai
            switch($user->role) {
                case 'superadmin':
                    return redirect('/superadmin/beranda');
                case 'admin':
                    return redirect('/admin/beranda');
                case 'customer':
                    return redirect('/customer/beranda');
                default:
                    Auth::logout();
                    return back()->withErrors(['loginError' => 'Role tidak valid.']);
            }
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
        // Validasi input registrasi dengan pesan error kustom
        $validated = $request->validate([
            'nama' => 'required|string|max:100|min:2',
            'username' => 'required|string|max:100|min:3|unique:pengguna|alpha_dash',
            'email' => 'required|string|email|max:100|unique:pengguna',
            'no_hp' => 'required|string|min:10|max:15|regex:/^[0-9+\-\s]+$/',
            'tanggal_lahir' => 'required|date|before:today|after:1900-01-01',
            'password' => 'required|string|min:8|confirmed|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).+$/',
        ], [
            'nama.required' => 'Nama lengkap wajib diisi.',
            'nama.min' => 'Nama minimal 2 karakter.',
            'username.required' => 'Username wajib diisi.',
            'username.min' => 'Username minimal 3 karakter.',
            'username.unique' => 'Username sudah digunakan.',
            'username.alpha_dash' => 'Username hanya boleh berisi huruf, angka, dash, dan underscore.',
            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Format email tidak valid.',
            'email.unique' => 'Email sudah terdaftar.',
            'no_hp.required' => 'Nomor HP wajib diisi.',
            'no_hp.min' => 'Nomor HP minimal 10 digit.',
            'no_hp.regex' => 'Format nomor HP tidak valid.',
            'tanggal_lahir.required' => 'Tanggal lahir wajib diisi.',
            'tanggal_lahir.before' => 'Tanggal lahir harus sebelum hari ini.',
            'tanggal_lahir.after' => 'Tanggal lahir tidak valid.',
            'password.required' => 'Password wajib diisi.',
            'password.min' => 'Password minimal 8 karakter.',
            'password.confirmed' => 'Konfirmasi password tidak cocok.',
            'password.regex' => 'Password harus mengandung huruf besar, huruf kecil, dan angka.',
        ]);

        try {
            // Buat pengguna baru
            $pengguna = Pengguna::create([
                'nama' => $validated['nama'],
                'username' => strtolower($validated['username']),
                'email' => strtolower($validated['email']),
                'no_hp' => $validated['no_hp'],
                'tanggal_lahir' => $validated['tanggal_lahir'],
                'password' => $validated['password'], // Akan di-hash otomatis oleh mutator
                'role' => 'customer',
            ]);

            // Log pendaftaran berhasil
            \Log::info('User registered successfully', [
                'user_id' => $pengguna->id,
                'username' => $pengguna->username,
                'email' => $pengguna->email
            ]);

            // Redirect ke halaman login dengan pesan sukses
            return redirect('/login')->with('success', 'Pendaftaran berhasil! Silakan login dengan akun Anda.');

        } catch (\Exception $e) {
            // Log error
            \Log::error('Registration failed', [
                'error' => $e->getMessage(),
                'username' => $validated['username'] ?? null,
                'email' => $validated['email'] ?? null
            ]);

            return back()->withInput()->withErrors(['error' => 'Terjadi kesalahan saat mendaftar. Silakan coba lagi.']);
        }
    }
}
