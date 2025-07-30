<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Cache;

class TrackAdminActivity
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (auth()->check() && auth()->user() instanceof \App\Models\Admins) {
            $expiresAt = now()->addMinutes(10); // how long to consider "online"
            Cache::put('admin-is-online-' . auth()->id(), true, $expiresAt);
            Cache::put('admin-last-seen-' . auth()->id(), now(), $expiresAt);
        }
        return $next($request);
    }
}
