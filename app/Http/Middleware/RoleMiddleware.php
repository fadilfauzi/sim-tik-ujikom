<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$roles)
    {
        if (!in_array($request->user()->role, $roles)) {
            // Jika peran pengguna TIDAK ada dalam daftar peran yang diizinkan,
            // alihkan ke dashboard yang sesuai atau tampilkan error 403 (Forbidden)
            return redirect('/dashboard')->with('error', 'Akses ditolak.'); 
        }
        return $next($request);
    }
}
