<?php

namespace App\Repositories\Comment;

Interface CommentRepositoryInterface{

    public function getCommentByNewsId($newsId);

    public function getCommentById($commentId);

    public function storeComment($data);

    public function updateComment($data, $id);

    public function deleteComment($id);
}

?>