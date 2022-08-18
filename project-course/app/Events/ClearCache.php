<?php
namespace App\Events;

use Illuminate\Support\Facades\Cache;

class clearCache
{
    //Очистка всего кеша каждый день
    public function handle(EndDayEvent $event)
    {
        Cache::flush();
    }
}
