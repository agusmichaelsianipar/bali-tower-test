<?php

namespace BTNewsApp\Domain\News\Repositories;

use BTNewsApp\Domain\News\News;
use BTNewsApp\Http\Resources\News\NewsResource;
use BTNewsApp\Infrastructure\News\Repositories\NewsRepositoryInterface;

class NewsRepository implements NewsRepositoryInterface {
    
    private $model;

    public function __construct(News $model){
        $this->model = $model;
    }

    public function getNews(){
        $data = News::paginate(10);
        return [
            'key' => NewsResource::collection($data)->response()->getData(true)
        ];
    }

    public function getNewsById($id){
        
    }

    public function storeNews($data){
        
    }
    
    public function updateNewsById($data, $id){
        

    }
    
    public function destroyNewsById($id){
        

    }
}

