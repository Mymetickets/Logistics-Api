<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\UserResource;
use App\Http\Resources\LocationResource;
use App\Http\Resources\TransportModeResource;


class LogisticBookingResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        //return parent::toArray($request);
        return [
            'id' => $this->id,
            'user_id' =>new UserResource($this->whenLoaded('user')),
            'location_id'       => new LocationResource($this->whenLoaded('location')),
            'transport_mode_id' => new TransportModeResource($this->whenLoaded('transportMode')),
            'goods_name' => $this->goods_name,
            'weight' => $this->weight,
            'receiver_name' => $this->receiver_name,
            'receiver_phone' => $this->receiver_phone,
            'receiver_address' => $this->receiver_address,
            'receiver_email' => $this->receiver_email,
            'status' => $this->status,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
