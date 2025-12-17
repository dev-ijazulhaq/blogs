<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class HasAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string $permission): Response
    {
        $user = Auth::user();

        if ($user->hasRole('Super Admin')) {
            return $next($request);
        }

        if ($user->hasAnyRole(['Admin', 'Author', 'Visitor'])) {
            if ($user->can($permission)) {
                return $next($request);
            }
        }

        abort(403, 'Access denied, Unauthorized user');
    }
}
