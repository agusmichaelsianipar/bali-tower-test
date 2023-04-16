<?php
namespace BTNewsApp\Domain\Comments\Queries;

use BTNewsApp\Domain\Comments\Comment;
use BTNewsApp\Infrastructure\Comments\Queries\GetCommentByIdQueryContract;

class GetCommentByIdQuery implements GetCommentByIdQueryContract
{
    public function handle($commentId){
        return Comment::with('news')->findOrFail($commentId);
    }
}