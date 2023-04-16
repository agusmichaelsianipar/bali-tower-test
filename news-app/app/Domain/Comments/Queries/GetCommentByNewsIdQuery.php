<?php
namespace BTNewsApp\Domain\Comments\Queries;

use BTNewsApp\Domain\News\News;
use BTNewsApp\Infrastructure\Comments\Queries\GetCommentByNewsIdQueryContract;

class GetCommentByNewsIdQuery implements GetCommentByNewsIdQueryContract
{
    public function handle($newsId){
        return News::with('comment')->findOrFail($newsId);
    }
}