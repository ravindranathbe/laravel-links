<?php

namespace App\Listeners;

use App\Events\PageVisited;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Log;

class SendPageVisitedNotification
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  PageVisited  $event
     * @return void
     */
    public function handle(PageVisited $event)
    {
        Log::info('Page visit from: '.$event->visit['ip']);
    }
}
