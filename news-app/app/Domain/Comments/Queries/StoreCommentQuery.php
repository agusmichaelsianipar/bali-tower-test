<?php
namespace BTNewsApp\Domain\Comments\Queries;

use BTNewsApp\Domain\Comments\Comment;
use BTNewsApp\Infrastructure\Comments\Queries\StoreCommentQueryContract;


class StoreCommentQuery implements StoreCommentQueryContract
{
    public function handle($data, $user, $newsId){
        return Comment::create([
            'user_id'=>$user->id,
            'news_id' => $newsId,
            'title' => $data->title,
            'content'=> $data->content
        ]);
    }
}