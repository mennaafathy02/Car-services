<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class OfferResource extends JsonResource
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
                "id" => $this->id,
                "name" => $this->name,
                "description" => $this->description,
                "price" => $this->price,
                "status" => $this->status,
                'section' => new SectionResource($this->section),
                'media' => new FileResource($this->files[0]),
                "created_at" => $this->created_at,
                "updated_at" => $this->updated_at,
            ];
        } else {

            return [
                "id" => $this->id,
                "name" => $this->name,
                "description" => $this->description,
                "price" => $this->price,
                "status" => $this->status,
                "supervisor" => new SupervisorResource($this->supervisor),
                'section' => new SectionResource($this->section),
                'media' => new FileResource($this->files[0]),
                "created_at" => $this->created_at,
                "updated_at" => $this->updated_at,
            ];}
    }
}
