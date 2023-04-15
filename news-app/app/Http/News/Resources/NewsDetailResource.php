<?php

namespace BTNewsApp\Http\News\Resources;

use Ramsey\Collection\Collection;
use BTNewsApp\Http\Users\Resources\UserResource;
use Illuminate\Http\Resources\Json\JsonResource;
use BTNewsApp\Http\Comments\Resources\CommentResource;

class NewsDetailResource extends JsonResource
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
            'id' => $this->id,
            'title' => $this->title,
            'content' => $this->content,
            'image' => $this->image,
            'author' => new UserResource($this->user_id),
            'comments' => CommentResource::collection($this->comment),
        ];
    }
}
