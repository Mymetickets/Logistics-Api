<?php

namespace App\Http\Resources\Locations;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Locations\CountryResource;

class StateResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'status' => $this->status ? 'active' : 'inactive',
            'country_id' => $this->country_id,
            'country' => $this->whenLoaded('country', function () {
                return new CountryResource($this->country);
            }),
            'created_at' => $this->created_at?->format('Y-m-d H:i:s'),
            'updated_at' => $this->updated_at?->format('Y-m-d H:i:s'),

        ];
    }
}