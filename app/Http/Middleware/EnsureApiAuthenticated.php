<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureApiAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ?string $role = null): Response
    {
        if (!session()->has('api_token')) {
            return redirect('/login')->with('error', 'Silakan login terlebih dahulu.');
        }

        if ($role && ($userRole = session('user.role')) !== $role) {
            if ($userRole === 'kasir') {
                return redirect('/transaksi')->with('error', 'Akses ditolak. Fitur ini hanya dapat diakses oleh Admin.');
            }
        }

        return $next($request);
    }
}
