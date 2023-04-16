<?php
namespace BTNewsApp\Domain\Comments\Queries;

use BTNewsApp\Domain\Comments\Comment;
use BTNewsApp\Infrastructure\Comments\Queries\DeleteCommentQueryContract;


class DeleteCommentQuery implements DeleteCommentQueryContract
{
    public function handle($commentId){
        $comment = Comment::findOrFail($commentId);

        return $comment->delete();
    }
}