<?php
namespace BTNewsApp\Domain\News\Queries;

use BTNewsApp\Domain\News\News;
use BTNewsApp\Infrastructure\News\Queries\StoreNewsQueryContract;

class StoreNewsQuery implements StoreNewsQueryContract
{
    public function handle($data, $users, $imageName){
        return  News::create([
            'user_id' => $users->id,
            'title' => $data->title,
            'content' => $data->content,
            'image' => $imageName
        ]);
    }
}