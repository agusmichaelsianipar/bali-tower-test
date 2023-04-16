<?php

namespace BTNewsApp\Infrastructure\News\Queries;

Interface ShowNewsQueryContract{
    public function handle($newsId);
}