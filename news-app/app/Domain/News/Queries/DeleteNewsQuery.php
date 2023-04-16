<?php
namespace BTNewsApp\Domain\News\Queries;

use BTNewsApp\Domain\News\News;
use BTNewsApp\Infrastructure\News\Queries\DeleteNewsQueryContract;

class DeleteNewsQuery implements DeleteNewsQueryContract
{
    public function handle($newsId){
        
        $news = News::findOrFail($newsId);

        return $news->delete();
    }
}