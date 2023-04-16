<?php

namespace BTNewsApp\Infrastructure\Comments\Queries;

Interface StoreCommentQueryContract{
    public function handle($data, $user, $newsId);
}