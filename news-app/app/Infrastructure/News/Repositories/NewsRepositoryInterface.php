<?php

namespace BTNewsApp\Infrastructure\News\Repositories;


Interface NewsRepositoryInterface{

    public function getNews();

    public function getNewsById($id);

    public function storeNews($data);

    public function updateNewsById($data, $id);
    
    public function destroyNewsById($id);
}

?>