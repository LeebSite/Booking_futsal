<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    public function handle(Request $request, Closure $next, $role)
    {
        if (!Auth::check() || Auth::user()->role !== $role) { // Perbaiki di sini
            return redirect('/login')->withErrors(['loginError' => 'Anda tidak memiliki akses.']);
        }

        return $next($request);
    }   
}