<?php

namespace App\Http\Resources\Api\V1;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use JsonSerializable;

class AreaResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  Request  $request
     * @return array|Arrayable|JsonSerializable
     */
    public function toArray($request): array|JsonSerializable|Arrayable
    {
        return [
            'id' => $this->id,
            'area' => $this->area,
            'zone_id' => $this->zone_id,
            'dispatch' => $this->dispatch,
            'status' => $this->status,
            'created_at' => new DateResource($this->created_at),
            'updated_at' => new DateResource($this->updated_at),
            'deleted_at' => new DateResource($this->deleted_at),
        ];
    }
}
