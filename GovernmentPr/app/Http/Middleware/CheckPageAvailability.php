<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Page;
use Carbon\Carbon;

class CheckPageAvailability
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $slug = $request->route('slug');
        $page = Page::where('slug', $slug)->first();
        if (!$page || $page->status !== 'published') {
            abort(404, 'Page not found or not published.');
        }

        $now = Carbon::now();
        // dd($page->publish_at, $page->expire_at, $now, $page->publish_at->isFuture(), $page->expire_at->isPast());

        if (($page->publish_at && $page->publish_at->isFuture()) ||
            ($page->expire_at && $page->expire_at->isPast())) {
            abort(404, 'This page is not available at this time.');
        }
        return $next($request);
    }
}
