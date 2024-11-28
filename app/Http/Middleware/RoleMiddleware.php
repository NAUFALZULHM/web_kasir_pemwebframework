<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $role): Response
    {
        // Periksa apakah pengguna login
        if (!Auth::check()) {
            return redirect('/login'); // Redirect ke login jika belum login
        }

        // Periksa apakah pengguna memiliki role yang sesuai
        if (Auth::user()->role !== $role) {
            abort(403, 'Unauthorized action.'); // Tampilkan error 403
        }

        return $next($request);
    }
}
