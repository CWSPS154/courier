<?php

namespace App\Http\Resources\Api\V1\Customer;

use App\Http\Resources\Api\fromAddressResource;
use App\Http\Resources\Api\V1\AreaResource;
use App\Http\Resources\Api\V1\CustomerContactResource;
use App\Http\Resources\Api\V1\DateResource;
use App\Http\Resources\Api\V1\Job\AddressResource;
use App\Http\Resources\Api\V1\Job\JobStatusHistoryResource;
use App\Http\Resources\Api\V1\StatusResource;
use App\Http\Resources\Api\V1\UserResource;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use JsonSerializable;

class JobsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param Request $request
     * @return array|Arrayable|JsonSerializable
     */
    public function toArray($request): array|JsonSerializable|Arrayable
    {
        return [
            'id' => $this->id,
            'job_number' => $this->dailyJob->job_number,
            'notes' => $this->notes,
            'van_hire' => $this->van_hire,
            'number_box' => $this->number_box,
            'customer' => new UserResource($this->user),
            'customer_contact' => new CustomerContactResource($this->customerContact),
            'driver' => new UserResource($this->jobAssign->user ?? null),
            'creator' => new UserResource($this->creator),
            'editor' => new UserResource($this->editor),
            'destroyer' => new UserResource($this->destroyer),
            'from_area' => new AreaResource($this->fromArea),
            'to_area' => new AreaResource($this->toArea),
            'to_address' => new AddressResource($this->toAddress),
            'from_address' => new AddressResource($this->fromAddress),
            'job_history' => JobStatusHistoryResource::collection($this->jobStatusHistory),
            'created_at' => new DateResource($this->created_at),
            'updated_at' => new DateResource($this->updated_at),
            'deleted_at' => new DateResource($this->deleted_at),
            'status' => new StatusResource($this->status)
        ];
    }
}
