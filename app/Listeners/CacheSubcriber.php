<?php

namespace App\Listeners;

use Illuminate\Support\Facades\Log;
use Illuminate\Cache\Events\CacheHit;
use Illuminate\Cache\Events\CacheMissed;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class CacheSubcriber
{


    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handleCacheHit(CacheHit $event)
    {
        Log::info("{$event->key} cache hit");
    }

    public function handleCacheMissed(CacheMissed $event)
    {
        Log::info("{$event->key} cache miss");
    }

    public function subscribe($event)
    {
        $event->listen(
            CacheHit::class,
            'App\Listener\CacheSubcriber@handleCacheHit'
        );
        $event->listen(
            CacheMissed::class,
            'App\Listener\CacheSubcriber@handleCacheMissed'
        );
    }
}
