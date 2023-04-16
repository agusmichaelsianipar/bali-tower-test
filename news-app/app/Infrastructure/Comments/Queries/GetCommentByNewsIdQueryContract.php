<?php

namespace BTNewsApp\Infrastructure\Comments\Queries;

Interface GetCommentByNewsIdQueryContract{
    public function handle($newsId);
}