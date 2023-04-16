<?php

namespace BTNewsApp\Domain\Comments\Repositories;

use BTNewsApp\Domain\News\News;
use BTNewsApp\Domain\Users\User;
use BTNewsApp\Infrastructure\Users\Queries\FindUserByIdQueryContract;
use Illuminate\Support\Facades\Auth;
use BTNewsApp\Domain\Comments\Comment;
use BTNewsApp\Http\Comments\Resources\CommentResource;
use BTNewsApp\Infrastructure\Comments\Queries\StoreCommentQueryContract;
use BTNewsApp\Infrastructure\Comments\Queries\DeleteCommentQueryContract;
use BTNewsApp\Infrastructure\Comments\Queries\UpdateCommentQueryContract;
use BTNewsApp\Infrastructure\Comments\Queries\GetCommentByIdQueryContract;
use BTNewsApp\Infrastructure\Comments\Queries\GetCommentByNewsIdQueryContract;
use BTNewsApp\Infrastructure\Comments\Repositories\CommentRepositoryInterface;

class CommentRepository implements CommentRepositoryInterface{

    private $findUserById, $getCommentByNewsIdQuery, $getCommentByIdQuery;
    private $storeCommentQuery, $updateCommentQuery, $deleteCommentQuery;

    public function __construct(
        FindUserByIdQueryContract $findUserById,
        GetCommentByNewsIdQueryContract $getCommentByNewsIdQuery,
        GetCommentByIdQueryContract $getCommentByIdQuery,
        StoreCommentQueryContract $storeCommentQuery,
        UpdateCommentQueryContract $updateCommentQuery,
        DeleteCommentQueryContract $deleteCommentQuery
        ){

        $this->findUserById = $findUserById;
        $this->getCommentByNewsIdQuery = $getCommentByNewsIdQuery;
        $this->getCommentByIdQuery = $getCommentByIdQuery;
        $this->storeCommentQuery = $storeCommentQuery;
        $this->updateCommentQuery = $updateCommentQuery;
        $this->deleteCommentQuery = $deleteCommentQuery;

    }

    public function getCommentByNewsId($newsId){

        $data = $this->getCommentByNewsIdQuery->handle($newsId);
        
        return CommentResource::collection($data->comment)->response()->getData(true);
    }

    public function getCommentById($commentId)
    {
        $comment = $this->getCommentByIdQuery->handle($commentId);
        
        return new CommentResource($comment);
    }

    public function storeComment($data, $newsId)
    {
        $user = $this->findUserById->handle(Auth::user()->id);

        $comment = $this->storeCommentQuery->handle($data, $user, $newsId);

        return new CommentResource($comment);
    }

    public function updateComment($data, $commentId){

        return $this->updateCommentQuery->handle($data, $commentId);
    }
    public function deleteComment($commentId){

        return $this->deleteCommentQuery->handle($commentId);
    }

}
