<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        if (isSupervisor()) {
            return [
                'id' => $this->id,
                'section' => new SectionResource($this->section),
                'total_price' => $this->total_price,
                "status" => $this->status,
                "user" => new UserResource($this->user),
                'created_at' => $this->created_at,
                'updated_at' => $this->updated_at,
            ];
        } else {
            return [
                'id' => $this->id,
                'supervisor' => new SupervisorResource($this->supervisor),
                'section' => new SectionResource($this->section),
                'total_price' => $this->total_price,
                "user" => new UserResource($this->user),

                "status" => $this->status,
                "is_rate" => $this->is_rate,
                'created_at' => $this->created_at,
                'updated_at' => $this->updated_at,
            ];
        }

    }
}
