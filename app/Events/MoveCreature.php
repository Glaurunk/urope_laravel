<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;

class MoveCreature implements ShouldBroadcastNow
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $creatureType;
    public $creatureId;
    public $targetId;
    public $sourceId;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($creatureType,$creatureId,$targetId,$sourceId)
    {
        $this->creatureType = $creatureType;
        $this->creatureId = $creatureId;
        $this->targetId = $targetId;
        $this->sourceId = $sourceId;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new Channel('actions');
    }
}
