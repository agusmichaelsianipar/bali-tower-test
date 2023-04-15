<?php

namespace BTNewsApp\Infrastructure\Comments\Repositories;

Interface CommentRepositoryInterface{

    public function getCommentByNewsId($newsId);

    public function getCommentById($commentId);

    public function storeComment($data, $newsId);

    public function updateComment($data, $id);

    public function deleteComment($id);
}

?>