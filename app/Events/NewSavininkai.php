<?php

namespace App\Events;

use App\Models\Savininkai;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class NewSavininkai
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $savininkais;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Savininkai $savininkais)
    {
        $this->$savininkais=$savininkais;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
