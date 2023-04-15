<?php

namespace BTNewsApp\Domain\Comments\Repositories;

use BTNewsApp\Domain\News\News;
use BTNewsApp\Domain\Comments\Comment;
use BTNewsApp\Http\News\Resources\NewsResource;
use BTNewsApp\Http\Comments\Resources\CommentResource;
use BTNewsApp\Infrastructure\Comments\Repositories\CommentRepositoryInterface;

class CommentRepository implements CommentRepositoryInterface{

    private $model;

    public function __construct(Comment $model){
        $this->model = $model;
    }

    public function getCommentByNewsId($newsId){

        $data = News::with('comment')->findOrFail($newsId);
        
        return CommentResource::collection($data->comment)->response()->getData(true);
    }

    public function getCommentById($commentId)
    {
        return new CommentResource($this->model->with('news')->findOrFail($commentId));
    }

    public function storeComment($data, $newsId)
    {
        $user_id = 2;

        return Comment::create([
            'user_id'=>$user_id,
            'news_id' => $newsId,
            'title' => $data->title,
            'content'=> $data->content
        ]);
    }

    public function updateComment($data, $commentId){

    }
    public function deleteComment($commentId){

    }

}
