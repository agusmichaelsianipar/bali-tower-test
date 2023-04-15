<?php

namespace BTNewsApp\Domain\Comments\Repositories;

use BTNewsApp\Domain\News\News;
use BTNewsApp\Domain\Users\User;
use Illuminate\Support\Facades\Auth;
use BTNewsApp\Domain\Comments\Comment;
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
        $user = User::find(Auth::user()->id);

        $comment = Comment::create([
            'user_id'=>$user->id,
            'news_id' => $newsId,
            'title' => $data->title,
            'content'=> $data->content
        ]);

        return new CommentResource($comment);
    }

    public function updateComment($data, $commentId){
        
        Comment::where('id', $commentId)->update([
            'title' => $data->title,
            'content' => $data->content,
        ]);

        return true;
    }
    public function deleteComment($commentId){
        
        $comment = Comment::findOrFail($commentId);

        $comment->delete();

        return true;
    }

}
