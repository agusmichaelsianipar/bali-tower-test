<?php

namespace BTNewsApp\Infrastructure\News\Repositories;


Interface NewsRepositoryInterface{

    public function index();

    public function showById($id);

    public function storeNews($data, $imageName);

    public function storeImageNews($data);

    public function updateNewsById($data, $id);
    
    public function destroyNewsById($id);
}

?>