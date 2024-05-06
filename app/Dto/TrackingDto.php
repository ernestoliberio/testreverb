<?php

namespace App\Dto;

use App\Models\User;

readonly class TrackingDto
{
    public function __construct(
        public string $channel,
        public User $emitter,
        public int $receptorId,
        public float $lat,
        public float $lng,
    ) {

    }

    public function toArray(): array
    {
       return [
            'channel' =>$this->channel,
            'position'=>[
                'lat'=>$this->lat,
                'lng'=>$this->lng
            ],
            'emitter'=>[
                'id'=>$this->emitter->id,
                'name'=>$this->emitter->name
            ],
            'receptor'=>$this->receptorId,
        ];
    }
}
