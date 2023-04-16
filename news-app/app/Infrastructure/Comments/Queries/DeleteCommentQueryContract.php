<?php

namespace BTNewsApp\Infrastructure\Comments\Queries;
Interface DeleteCommentQueryContract{
    public function handle($commentId);
}