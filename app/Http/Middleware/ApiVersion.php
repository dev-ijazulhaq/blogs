<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ApiVersion
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $version = $request->header('X-API-Version', 'v1');
        $request->merge(['api_version' => $version]);

        $locale = $request->header('X-App-Locale', config('app.locale'));
        app()->setLocale($locale);

        return $next($request);
    }
}
