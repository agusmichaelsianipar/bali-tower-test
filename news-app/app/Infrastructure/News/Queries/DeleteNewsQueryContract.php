<?php

namespace BTNewsApp\Infrastructure\News\Queries;

Interface DeleteNewsQueryContract{
    public function handle($newsId);
}