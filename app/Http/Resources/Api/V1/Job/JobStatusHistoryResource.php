<?php

namespace App\Http\Resources\Api\V1\Job;

use App\Http\Resources\Api\V1\DateResource;
use App\Http\Resources\Api\V1\StatusResource;
use App\Http\Resources\Api\V1\UserResource;
use App\Models\JobStatus;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use JsonSerializable;

class JobStatusHistoryResource extends JsonResource
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
            'user_id' => new UserResource($this->user),
            'from_status' => new StatusResource($this->fromStatus),
            'to_status' => new StatusResource($this->toStatus),
            'comment' => $this->comment,
            'image' => $this->to_status_id==JobStatus::getStatusId(JobStatus::DELIVERED) ?
                $this->getFirstMediaUrl('job_status_images', 'base-image') : null,
            'created_at' => new DateResource($this->created_at),
            'updated_at' => new DateResource($this->updated_at),
            'deleted_at' => new DateResource($this->deleted_at)
        ];
    }
}
