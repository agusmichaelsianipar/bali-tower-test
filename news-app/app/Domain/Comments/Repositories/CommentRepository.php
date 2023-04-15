<?php

namespace BTNewsApp\Domain\Comments\Repositories;

use BTNewsApp\Domain\Comments\Comment;
use BTNewsApp\Http\Comments\Resources\CommentResource;
use App\Repositories\Comment\CommentRepositoryInterface;

class CommentRepository implements CommentRepositoryInterface{

    private $model;

    public function __construct(Comment $model){
        $this->model = $model;
    }

    public function getCommentById($id)
    {
        return new CommentResource($this->model->with('news')->findOrFail($id));
    }

    public function storeComment($data, $guest)
    {
        $comment = Comment::create([
            'member_id' => $guest,
            'news_id' => $data->news,
            'title' => $data->title,
            'content' => $data->content
        ]);

        return new CommentResource($comment);
    }

}
