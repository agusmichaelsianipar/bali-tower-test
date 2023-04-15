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

    public function getCommentByNewsId($newsId){

    }

    public function getCommentById($commentId)
    {
        return new CommentResource($this->model->with('news')->findOrFail($commentId));
    }

    public function storeComment($data)
    {
        
    }

    public function updateComment($data, $commentId){

    }
    public function deleteComment($commentId){

    }

}
