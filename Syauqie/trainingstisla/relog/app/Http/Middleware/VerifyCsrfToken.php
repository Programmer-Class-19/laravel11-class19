<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Exception\BadRequestException;

class VerifyCsrfToken
{
    public function handle(Request $request, Closure $next)
    {
        if ($request->method() !== 'GET' && $request->session()->token() !== $request->input('_token')) {
            throw new BadRequestException('CSRF token mismatch.');
        }

        return $next($request);
    }
}
