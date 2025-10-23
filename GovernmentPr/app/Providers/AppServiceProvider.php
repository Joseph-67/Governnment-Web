<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Cache;
use App\Models\Page;
use Carbon\Carbon;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        // Share data globally across all views
        View::composer('*', function ($view) {
            
    // ✅ Cache pages to reduce DB load
    // $pages = Cache::remember('global_active_pages', now()->addMinutes(30), function () {
    //             return Page::where('status', 'published')
    //                 ->where('visibility', '<>', 'private')
    //                 ->where(function ($q) {
    //                     // Show pages that are published (no publish_at or already published)
    //                     $q->whereNull('publish_at')
    //                     ->orWhere('publish_at', '<=', now());
    //                 })
    //                 ->where(function ($q) {
    //                     // Exclude expired pages (no expire_at or still valid)
    //                     $q->whereNull('expire_at')
    //                     ->orWhere('expire_at', '>', now());
    //                 })
    //                 ->orderBy('menu_order')
    //                 ->get(['page_id', 'title', 'slug', 'parent_id', 'categories']);
    //         });

    // dd(now());
            $rootpages = Page::query()
                ->where('status', 'published')
                ->where('visibility', '<>', 'private')
                ->where(function ($q) {
                    // Show only pages that are already published or have no publish date
                    $q->whereNull('publish_at')
                    ->orWhere('publish_at', '<=', now());
                })
                ->where(function ($q) {
                    // Show only pages that are not expired or have no expiry date
                    $q->whereNull('expire_at')
                    ->orWhere('expire_at', '>', now());
                })
                ->orderBy('menu_order')
                ->get(['page_id', 'title', 'slug', 'parent_id', 'categories']);

    // ✅ Group by parent_id for easy nested menus
            $groupedPages = $rootpages->groupBy('parent_id');

            // ✅ Share data globally across all Blade views
            $view->with([
                'authUser' => Auth::user(),
                'rootpages' => $rootpages,
                'groupedPages' => $groupedPages,
            ]);
        });
        Schema::defaultStringLength(191);
    }
}
