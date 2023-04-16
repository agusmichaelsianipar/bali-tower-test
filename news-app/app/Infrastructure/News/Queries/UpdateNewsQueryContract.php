<?php

namespace BTNewsApp\Infrastructure\News\Queries;

Interface UpdateNewsQueryContract{
    public function handle($data, $newsId, $imageName);
}