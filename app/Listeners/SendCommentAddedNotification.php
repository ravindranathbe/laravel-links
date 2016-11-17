<?php

namespace App\Listeners;

use App\Events\CommentAdded;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Log;

class SendCommentAddedNotification
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
    public function handle(CommentAdded $timeline)
    {
        Log::info('Comment added by '.$timeline->timeline['author'].'.');
    }
}
