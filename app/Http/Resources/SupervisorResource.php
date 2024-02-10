<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SupervisorResource extends JsonResource
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
            "name" => $this->name,
            "email" => $this->email,
            "phone" => $this->phone,
            "address" => $this->address,
            'type' => $this->type,
            'price' => $this->price,
            "is_pending" => $this->is_pending == 1 ? false : true,
            "is_expired" => $this->is_expired,
            "expired_date" => $this->expired_date,
            "latitude" => (float) $this->latitude,
            "longitude" => (float) $this->longitude,
            'media' => $this->getMedia('media', ['type' => 'media'])->first() ? new FileResource($this->getMedia('media', ['type' => 'media'])->first()) : null,
            "identity_media" => $this->getMedia('media', ['type' => 'identity'])->first() ? new FileResource($this->getMedia('media', ['type' => 'identity'])->first()) : null,
            "area" => new AreaResource($this->area),
            "governorate" => new GovernorateResource($this->area->governorate),
            "sections" => SectionResource::collection($this->sections),
            "ratings" => RatingResource::collection($this->ratings),
            "plan_days" => (integer) $this->plan_days,
            "remaining_days" => (float) $this->remaining_days,
            "created_at" => $this->created_at,
            "updated_at" => $this->updated_at,
        ];
    }
}
