<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BookingResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'booking_id' => $this->id,
            'booking_date' => $this->booking_date,
            'guests'       => $this->guests,
            'total_price'  => $this->total_price,
            'status'       => $this->status,
            'user'         => new UserResource($this->whenLoaded('user')),
            'destination'  => new DestinationResource($this->whenLoaded('destination')),
            'experience'   => new ExperienceResource($this->whenLoaded('experience')),
        ];
    }
}
