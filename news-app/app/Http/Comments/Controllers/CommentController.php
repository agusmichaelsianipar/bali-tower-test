<?php

namespace BTNewsApp\Http\Comments\Controllers;

use Illuminate\Http\Request;
use BTNewsApp\App\Controllers\Controller;
use BTNewsApp\Http\Comments\Requests\CreateCommentRequest;
use BTNewsApp\Http\Comments\Requests\UpdateCommentRequest;
use BTNewsApp\Infrastructure\Comments\Repositories\CommentRepositoryInterface;

class CommentController extends Controller
{
    private $commentRepository;

    public function __construct(CommentRepositoryInterface $commentRepository){

        $this->middleware('auth:api')->except('index','show');

        $this->commentRepository = $commentRepository;
    }
    public function index($newsId)
    {
        $comments = $this->commentRepository->getCommentByNewsId($newsId);

        return $this->jsonSuccessResponse($comments);
        
    }

    public function store(CreateCommentRequest $request, $newsId)
    {
        $comment = $this->commentRepository->storeComment($request, $newsId);

        return $this->jsonSuccessResponse($comment);
    }

    public function show($newsId, $commentId)
    {
        $comment = $this->commentRepository->getCommentById($commentId);

        return $this->jsonSuccessResponse($comment);
    }

    public function update(UpdateCommentRequest $request, $newsId, $commentId)
    {
        $this->commentRepository->updateComment($request, $commentId);

        return $this->jsonSuccessResponse(null);
    }

    public function destroy($commentId, $newsId)
    {
        $this->commentRepository->deleteComment($newsId);
        
        return $this->jsonSuccessResponse(null);
    }
}
