<?php

namespace App\Listeners;

use App\Link;
use App\User;
use App\Events\RateAdded;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Log;

class SendRatedNotification
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
     * @param  RateAdded  $event
     * @return void
     */
    public function handle(RateAdded $event)
    {
        $link = new Link;

        $link->title = 'TEST';
        $link->url = 'http://test.com/';
        $link->description = 'TEST';
        $link->created_by = 1;
        $link->modified_by = 1;
        $link->save();
    }
}
