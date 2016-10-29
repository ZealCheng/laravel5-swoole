<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;

use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Support\Facades\Event;

class RedisRealTimeEvent extends Event implements ShouldBroadcast
{

    public $channel;

    public $data;

    use InteractsWithSockets;

    public function __construct($channel, $data)
    {
        $this->channel = $channel;
        $this->data    = $data;
    }

    public function broadcastOn()
    {
        //return new PrivateChannel($this->channel);
        return [$this->channel];
    }

    public function broadcastAs()
    {
        return 'message.publish';
    }

    //public function broadcastWith()
    //{
    //    return ['data' => $this->data ];
    //}
}
