<?php

namespace App\Http\Resources\Api\V1;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use JsonSerializable;

class AddressBookResource extends JsonResource
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
            'company_name' => $this->company_name,
            'street_address' => $this->street_address,
            'street_number' => $this->street_number,
            'suburb' => $this->suburb,
            'state' => $this->state,
            'zip' => $this->zip,
            'country' => $this->country,
            'place_id' => $this->place_id,
            'latitude' => $this->latitude,
            'longitude' => $this->longitude,
            'location_url' => $this->location_url,
            'status' => $this->status,
            'set_as_default' => $this->set_as_default,
            'user' => new UserResource($this->user),
            'area' => new AreaResource($this->area),
            'created_at' => new DateResource($this->created_at),
            'updated_at' => new DateResource($this->updated_at),
            'deleted_at' => new DateResource($this->deleted_at),
        ];
    }
}
