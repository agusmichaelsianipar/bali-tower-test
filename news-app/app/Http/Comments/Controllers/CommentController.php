<?php

namespace BTNewsApp\Http\Comments\Controllers;

use BTNewsApp\App\Controllers\Controller;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    private $commentRepository;

    public function __construct(){
        
    }
    public function index()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        return $this->commentRepository->getCommentById($id);
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
