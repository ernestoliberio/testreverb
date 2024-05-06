<?php

namespace App\Events;

use App\Dto\TrackingDto;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class TrackingEvent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * Create a new event instance.
     */
    public function __construct(private TrackingDto $trackingDto)
    {
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return array<int, \Illuminate\Broadcasting\Channel>
     */
    public function broadcastOn(): array
    {
       return [ new PrivateChannel($this->trackingDto->channel)];
    }

    public function broadcastWith(): array
    {
        return $this->trackingDto->toArray();
    }

    public function broadcastAs(): string
    {
        return 'tracking';
    }
}

