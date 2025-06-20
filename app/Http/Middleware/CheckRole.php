<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    public function handle(Request $request, Closure $next, $role)
    {
        // Cek apakah user sudah login dan rolenya sesuai
        if (!Auth::check() || Auth::user()->role !== $role) {
            Auth::logout();
            return redirect('/login')->withErrors(['loginError' => 'Anda tidak memiliki akses.']);
        }

        return $next($request);
    }   
}