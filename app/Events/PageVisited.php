<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use App\Visit;

class PageVisited implements ShouldBroadcast
{
    use InteractsWithSockets, SerializesModels;
    // public $visit;
    // public $visitArray;
    public $message;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Visit $visit)
    {
        // $this->visit = ''; // $visit;
        // $this->visitArray = $visit->toArray();
        $this->message = 'Hello';
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return Channel|array
     */
    public function broadcastOn()
    {
      // return ['test_channel'];
      return new PresenceChannel('test_channel');
      // return new PrivateChannel('page-visited');
      // return new PresenceChannel('test_channel');
    }
}
