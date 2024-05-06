<?php

namespace App\Jobs;

use App\Dto\TrackingDto;
use App\Events\TrackingEvent;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class TrackingJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct(private readonly TrackingDto $trackingDto)
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        event(new TrackingEvent($this->trackingDto));
    }
}
