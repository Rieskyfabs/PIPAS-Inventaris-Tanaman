<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UserAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$userRoles): Response
    {
        // Ambil role name dari user yang sedang login
        $roleName = auth()->user()->role->name;

        // Cek apakah role user ada dalam daftar userRoles
        if (in_array($roleName, $userRoles)) {
            return $next($request);
        }

        return response()->view('errors.403', [], 403);
    }
}
