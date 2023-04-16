<?php

namespace BTNewsApp\Infrastructure\Comments\Queries;
Interface GetCommentByIdQueryContract{
    public function handle($commentId);
}