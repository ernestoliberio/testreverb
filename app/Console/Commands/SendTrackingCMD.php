<?php

namespace App\Console\Commands;

use App\Dto\TrackingDto;
use App\Jobs\TrackingJob;
use App\Models\User;
use Illuminate\Console\Command;

class sendTrackingCMD extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:send-tracking';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Test Send Tracking';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $user = User::first();
        $demo=[
            ['lat'=>-2.092893,'lng'=> -79.693279],
            ['lat'=>-2.092863,'lng'=> -79.693704],
            ['lat'=>-2.092881,'lng'=> -79.694284],
            ['lat'=>-2.092975,'lng'=> -79.694698],
            ['lat'=>-2.093082,'lng'=> -79.694990],
            ['lat'=>-2.093294,'lng'=> -79.695654],
            ['lat'=>-2.093405,'lng'=> -79.695872],
            ['lat'=>-2.093686,'lng'=> -79.696487],
        ];
        foreach ($demo as $trace){
            $tracking = new TrackingDto(
                'trackingView.2',
                $user,
                2,
                $trace['lat'],
                $trace['lng']
            );
            dispatch(new TrackingJob($tracking));
            sleep(2);
        }

    }
}
