<?php

namespace App\Http\Controllers;

use App\Models\Pengguna;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class SuperadminController extends Controller
{
    public function index(Request $request)
    {
        $query = Pengguna::query();

        // Filter berdasarkan role
        if ($request->has('role') && $request->role != '') {
            $query->where('role', $request->role);
        }

        // Search berdasarkan nama atau username
        if ($request->has('search') && $request->search != '') {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('nama', 'like', "%{$search}%")
                  ->orWhere('username', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%");
            });
        }

        $users = $query->orderBy('created_at', 'desc')->paginate(15);

        // Data untuk filter
        $roles = ['superadmin', 'admin', 'customer'];

        return view('Superadmin.users', compact('users', 'roles'));
    }

    public function edit($id)
    {
        $user = Pengguna::findOrFail($id);

        // Prevent superadmin from editing their own role
        if ($user->id === Auth::id() && $user->role === 'superadmin') {
            return redirect()->route('superadmin.users')
                ->withErrors(['error' => 'Anda tidak dapat mengubah role Anda sendiri.']);
        }

        return view('Superadmin.users.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = Pengguna::findOrFail($id);

        // Prevent superadmin from changing their own role
        if ($user->id === Auth::id() && $user->role === 'superadmin' && $request->role !== 'superadmin') {
            return redirect()->route('superadmin.users')
                ->withErrors(['error' => 'Anda tidak dapat mengubah role Anda sendiri.']);
        }

        $validated = $request->validate([
            'nama' => 'required|string|max:100|min:2',
            'username' => 'required|string|max:100|min:3|unique:pengguna,username,'.$id.'|alpha_dash',
            'email' => 'required|string|email|max:100|unique:pengguna,email,'.$id,
            'role' => 'required|in:superadmin,admin,customer',
            'no_hp' => 'nullable|string|min:10|max:15|regex:/^[0-9+\-\s]+$/',
            'tanggal_lahir' => 'nullable|date|before:today',
        ], [
            'nama.required' => 'Nama wajib diisi.',
            'nama.min' => 'Nama minimal 2 karakter.',
            'username.required' => 'Username wajib diisi.',
            'username.min' => 'Username minimal 3 karakter.',
            'username.unique' => 'Username sudah digunakan.',
            'username.alpha_dash' => 'Username hanya boleh berisi huruf, angka, dash, dan underscore.',
            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Format email tidak valid.',
            'email.unique' => 'Email sudah terdaftar.',
            'role.required' => 'Role wajib dipilih.',
            'role.in' => 'Role tidak valid.',
            'no_hp.regex' => 'Format nomor HP tidak valid.',
            'tanggal_lahir.before' => 'Tanggal lahir harus sebelum hari ini.',
        ]);

        try {
            $user->update($validated);

            \Log::info('User updated by superadmin', [
                'updated_user_id' => $user->id,
                'updated_by' => Auth::id(),
                'changes' => $validated
            ]);

            return redirect()->route('superadmin.users')
                ->with('success', 'User berhasil diperbarui.');

        } catch (\Exception $e) {
            \Log::error('Failed to update user', [
                'error' => $e->getMessage(),
                'user_id' => $user->id,
                'updated_by' => Auth::id()
            ]);

            return back()->withInput()
                ->withErrors(['error' => 'Gagal memperbarui user. Silakan coba lagi.']);
        }
    }

    public function destroy($id)
    {
        $user = Pengguna::findOrFail($id);

        // Prevent superadmin from deleting themselves
        if ($user->id === Auth::id()) {
            return redirect()->route('superadmin.users')
                ->withErrors(['error' => 'Anda tidak dapat menghapus akun Anda sendiri.']);
        }

        // Prevent deleting the last superadmin
        if ($user->role === 'superadmin') {
            $superadminCount = Pengguna::where('role', 'superadmin')->count();
            if ($superadminCount <= 1) {
                return redirect()->route('superadmin.users')
                    ->withErrors(['error' => 'Tidak dapat menghapus superadmin terakhir.']);
            }
        }

        try {
            $userName = $user->nama;
            $user->delete(); // Soft delete

            \Log::info('User deleted by superadmin', [
                'deleted_user_id' => $user->id,
                'deleted_user_name' => $userName,
                'deleted_by' => Auth::id()
            ]);

            return redirect()->route('superadmin.users')
                ->with('success', "User {$userName} berhasil dihapus.");

        } catch (\Exception $e) {
            \Log::error('Failed to delete user', [
                'error' => $e->getMessage(),
                'user_id' => $user->id,
                'deleted_by' => Auth::id()
            ]);

            return back()->withErrors(['error' => 'Gagal menghapus user. Silakan coba lagi.']);
        }
    }

    public function restore($id)
    {
        $user = Pengguna::withTrashed()->findOrFail($id);

        try {
            $user->restore();

            \Log::info('User restored by superadmin', [
                'restored_user_id' => $user->id,
                'restored_by' => Auth::id()
            ]);

            return redirect()->route('superadmin.users')
                ->with('success', "User {$user->nama} berhasil dipulihkan.");

        } catch (\Exception $e) {
            \Log::error('Failed to restore user', [
                'error' => $e->getMessage(),
                'user_id' => $user->id,
                'restored_by' => Auth::id()
            ]);

            return back()->withErrors(['error' => 'Gagal memulihkan user. Silakan coba lagi.']);
        }
    }

    public function forceDelete($id)
    {
        $user = Pengguna::withTrashed()->findOrFail($id);

        try {
            $userName = $user->nama;
            $user->forceDelete(); // Permanent delete

            \Log::warning('User permanently deleted by superadmin', [
                'deleted_user_id' => $user->id,
                'deleted_user_name' => $userName,
                'deleted_by' => Auth::id()
            ]);

            return redirect()->route('superadmin.users')
                ->with('success', "User {$userName} berhasil dihapus permanen.");

        } catch (\Exception $e) {
            \Log::error('Failed to permanently delete user', [
                'error' => $e->getMessage(),
                'user_id' => $user->id,
                'deleted_by' => Auth::id()
            ]);

            return back()->withErrors(['error' => 'Gagal menghapus user secara permanen. Silakan coba lagi.']);
        }
    }

    public function dashboard()
    {
        $stats = [
            'total_users' => Pengguna::count(),
            'total_customers' => Pengguna::where('role', 'customer')->count(),
            'total_admins' => Pengguna::where('role', 'admin')->count(),
            'total_superadmins' => Pengguna::where('role', 'superadmin')->count(),
            'users_this_month' => Pengguna::whereMonth('created_at', now()->month)
                ->whereYear('created_at', now()->year)->count(),
            'deleted_users' => Pengguna::onlyTrashed()->count(),
        ];

        $recentUsers = Pengguna::orderBy('created_at', 'desc')->limit(10)->get();

        return view('Superadmin.dashboard', compact('stats', 'recentUsers'));
    }
}