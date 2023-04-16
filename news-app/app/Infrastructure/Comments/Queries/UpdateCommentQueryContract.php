<?php

namespace BTNewsApp\Infrastructure\Comments\Queries;

Interface UpdateCommentQueryContract{
    public function handle($data, $commentId);
}