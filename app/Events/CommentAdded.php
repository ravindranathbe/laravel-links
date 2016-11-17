<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use App\Timeline;

class CommentAdded implements ShouldBroadcast
{
    use InteractsWithSockets, SerializesModels;
    public $timeline;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Timeline $timeline)
    {
        $this->timeline = $timeline;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return Channel|array
     */
    public function broadcastOn()
    {
      return ['timeline_channel'];
      // return new PresenceChannel('test_channel');
      // return new PrivateChannel('test_channel');
    }

    /*
    public function broadcastAs()
    {
      return 'comment.added';
    }
    */
}
