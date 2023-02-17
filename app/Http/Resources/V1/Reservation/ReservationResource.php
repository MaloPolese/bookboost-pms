<?php

namespace App\Http\Resources\V1\Reservation;

use App\Http\Resources\V1\Room\RoomResource;
use App\Http\Resources\V1\User\UserResource;
use Illuminate\Http\Resources\Json\JsonResource;

class ReservationResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */



    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'status' => $this->status,
            'source' => $this->source,
            'segment' => $this->segment,
            'start' => $this->start,
            'end' => $this->end,
            'cancelledAt' => $this->cancelled_at,
            'createdAtInPms' => $this->created_at_in_pms,
            'user' => UserResource::make($this->whenLoaded('user')),
            'room' => RoomResource::make($this->whenLoaded('room')),
        ];
    }
}
