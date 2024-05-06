<?php

namespace App\Listeners;

use App\Dto\TrackingDto;
use App\Jobs\TrackingJob;
use App\Models\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Laravel\Reverb\Events\MessageReceived;

class ReceiveMessageListener
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(MessageReceived $event): void
    {
        $message = json_decode($event->message);
        if ($message->event==='tracking'){
            $data = json_decode($message->data);
            $tracking = new TrackingDto(
                'trackingView.'.$data->receptor,
                User::find($data->emitter),
                $data->receptor,
                $data->lat,
                $data->lng
            );
            logger(json_encode($tracking));
            dispatch(new TrackingJob($tracking));
        }
logger(json_encode($message));

    }
}
