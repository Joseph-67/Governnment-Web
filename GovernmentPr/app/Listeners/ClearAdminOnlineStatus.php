<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Auth\Events\Logout;
use Illuminate\Support\Facades\Cache;

class ClearAdminOnlineStatus
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(Logout $event)
    {
        if ($event->user && $event->user instanceof \App\Models\Admins) {
            Cache::forget('admin-is-online-' . $event->user->id);
            Cache::forget('admin-last-seen-' . $event->user->id);
        }
    }
}
