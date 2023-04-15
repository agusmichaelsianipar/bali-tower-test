<?php

namespace BTNewsApp\Http\Comments\Resources;

use BTNewsApp\Http\Users\Resources\UserResource;
use Illuminate\Http\Resources\Json\JsonResource;

class CommentResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'content' => $this->content,
            'user' => new UserResource($this->user),
        ];
    }
}
