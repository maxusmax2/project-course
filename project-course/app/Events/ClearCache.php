<?php
namespace App\Events;

use Illuminate\Support\Facades\Cache;

class clearCache
{
    public function handle(EndDayEvent $event)
    {
        Cache::flush();
    }
}
