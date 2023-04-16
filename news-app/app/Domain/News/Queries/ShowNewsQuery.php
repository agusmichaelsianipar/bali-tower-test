<?php
namespace BTNewsApp\Domain\News\Queries;

use BTNewsApp\Domain\News\News;
use BTNewsApp\Infrastructure\News\Queries\ShowNewsQueryContract;

class ShowNewsQuery implements ShowNewsQueryContract
{
    public function handle($newsId){
        return News::with('comment')->findOrFail($newsId);
    }
}