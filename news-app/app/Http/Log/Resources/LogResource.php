<?php

namespace BTNewsApp\Http\Log\Resources;

use BTNewsApp\Http\Users\Resources\UserResource;
use Illuminate\Http\Resources\Json\JsonResource;

class LogResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'event' => $this->event,
            'url' => $this->url,
            'method' => $this->method,
            'ip_address' => $this->ip_address,
            'user_agent' => $this->user_agent,
            'user_id' => new UserResource($this->user),
        ];
    }
}
