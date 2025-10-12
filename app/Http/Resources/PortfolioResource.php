<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PortfolioResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "id" => $this->id,
            "title" => $this->title,
            "category" => $this->category,
            "description" => $this->description,
            "image" => asset('storage/' . $this->image),
            "technologies" => $this->technologies,
            "link" => $this->link,
            "user" => $this->whenLoaded('user'),
            "featured" => $this->featured,
            "created_at" => $this->created_at,
            "updated_at" => $this->updated_at
        ];
    }
}
