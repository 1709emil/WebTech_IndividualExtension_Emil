<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ModeratorMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (auth()->check() && $request->user()->CheckRole($request->user()) == 'Moderator' || $request->user()->CheckRole($request->user()) == 'Admin') {
            return $next($request);
        }
        abort(403, 'Not authorized');
    }
}
