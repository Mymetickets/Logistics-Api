<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\CountryResource; // Importing CountryResource


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
            'status' => $this->status, // It will be cast to Enum value due to model casting
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            // Include the country relationship using the CountryResource
            // 'whenLoaded' ensures it's only included if eager loaded (e.g., with('country'))
            'country' => new CountryResource($this->whenLoaded('country')), // <--- ADD THIS LINE

        ];
    }
}
