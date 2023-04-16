<?php
namespace BTNewsApp\Domain\News\Queries;

use BTNewsApp\Domain\News\News;
use BTNewsApp\Infrastructure\News\Queries\UpdateNewsQueryContract;


class UpdateNewsQuery implements UpdateNewsQueryContract
{
    public function handle($data, $newsId, $imageName){
        return News::where('id', $newsId)->update([
            'title' => $data->title,
            'content' => $data->content,
            'image' => $imageName
        ]);
    }
}