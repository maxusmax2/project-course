<?php
namespace App\Events;

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Cache;

class ReindexElastick
{
    public function handle(EndDayEvent $event)
    {
        Artisan::call('search:reindex');
    }
}
