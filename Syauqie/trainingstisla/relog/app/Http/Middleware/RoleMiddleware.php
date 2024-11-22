<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string  $role
     * @return \Illuminate\Http\Response
     */
    public function handle(Request $request, Closure $next, $role)
    {
        if (Auth::check() && Auth::user()->role !== $role) {
            // Jika pengguna tidak memiliki role yang sesuai, kembalikan response error atau redirect
            return redirect('/home'); // Atau halaman yang sesuai
        }

        return $next($request);
    }
}
