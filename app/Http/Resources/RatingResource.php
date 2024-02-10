<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class RatingResource extends JsonResource
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
            "id" => $this->id,
            "rate" => $this->rate,
            "comment" => $this->comment,
            "user" => new UserResource($this->user),
            'section' => new SectionResource($this->section),
            "created_at" => $this->created_at,
            "updated_at" => $this->updated_at,
        ];
    }
}
