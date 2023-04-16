<?php
namespace BTNewsApp\Domain\Comments\Queries;

use BTNewsApp\Domain\Comments\Comment;
use BTNewsApp\Infrastructure\Comments\Queries\UpdateCommentQueryContract;


class UpdateCommentQuery implements UpdateCommentQueryContract
{
    public function handle($data, $commentId){
        return Comment::where('id', $commentId)->update([
            'title' => $data->title,
            'content' => $data->content,
        ]);
    }
}