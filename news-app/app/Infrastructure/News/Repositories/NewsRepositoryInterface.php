<?php

namespace BTNewsApp\Infrastructure\News\Repositories;


Interface NewsRepositoryInterface{

    public function index();

    public function showById($id);

    public function storeNews($data, $imageName);

    public function storeImageNews($data);

    public function destroyImageStorage($id);

    public function updateNewsById($data, $id, $imageName);
    
    public function destroyNewsById($id);

    public function newsLog($event, $url, $method, $ip, $user_agent);
}

?>