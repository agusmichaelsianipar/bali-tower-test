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
        $this->commentRepository = $commentRepository;
    }
    public function index($newsId)
    {
        return $this->commentRepository->getCommentByNewsId($newsId);
        
    }

    public function store(CreateCommentRequest $request, $newsId)
    {
        return $this->commentRepository->storeComment($request, $newsId);
    }

    public function show($newsId, $commentId)
    {
        return $this->commentRepository->getCommentById($commentId);
    }

    public function update(UpdateCommentRequest $request, $newsId, $commentId)
    {
        return $this->commentRepository->updateComment($request, $commentId);
    }

    public function destroy($commentId, $newsId)
    {
        return $this->commentRepository->deleteComment($newsId);
    }
}
