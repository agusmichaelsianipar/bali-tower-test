<?php

namespace BTNewsApp\Http\Comments\Controllers;

use Illuminate\Http\Request;
use BTNewsApp\App\Controllers\Controller;
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

    public function store(Request $request, $newsId)
    {
        return $this->commentRepository->storeComment($request, $newsId);
    }

    public function show($newsId, $commentId)
    {
        return $this->commentRepository->getCommentById($commentId);
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
