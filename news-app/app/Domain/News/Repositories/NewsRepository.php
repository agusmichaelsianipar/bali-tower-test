<?php

namespace BTNewsApp\Domain\News\Repositories;

use BTNewsApp\Domain\News\News;
use BTNewsApp\Infrastructure\News\Queries\DeleteNewsQueryContract;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use BTNewsApp\App\Log\Event\LogActivityEvent;
use BTNewsApp\Http\News\Resources\NewsResource;
use BTNewsApp\Infrastructure\News\Queries\ShowNewsQueryContract;
use BTNewsApp\Infrastructure\News\Queries\StoreNewsQueryContract;
use BTNewsApp\Infrastructure\News\Queries\UpdateNewsQueryContract;
use BTNewsApp\Infrastructure\Users\Queries\FindUserByIdQueryContract;
use BTNewsApp\Infrastructure\News\Repositories\NewsRepositoryInterface;
use BTNewsApp\Infrastructure\News\Queries\FetchNewsWithPaginateQueryContract;

class NewsRepository implements NewsRepositoryInterface {
    
    private $findUserByIdQuery, $fetchNewsWithPaginateQuery;
    private $showNewsQuery, $storeNewsQuery, $updateNewsQuery;
    private $deleteNewsQuery;
    public function __construct(
        FetchNewsWithPaginateQueryContract $fetchNewsWithPaginateQuery,
        ShowNewsQueryContract $showNewsQuery,
        FindUserByIdQueryContract $findUserByIdQuery,
        StoreNewsQueryContract $storeNewsQuery,
        UpdateNewsQueryContract $updateNewsQuery,
        DeleteNewsQueryContract $deleteNewsQuery
    ){
        $this->fetchNewsWithPaginateQuery = $fetchNewsWithPaginateQuery;
        $this->showNewsQuery = $showNewsQuery;
        $this->findUserByIdQuery = $findUserByIdQuery;
        $this->storeNewsQuery = $storeNewsQuery;
        $this->updateNewsQuery = $updateNewsQuery;
        $this->deleteNewsQuery = $deleteNewsQuery;
        
    }

    public function newsLog($event, $url, $method, $ip, $user_agent){

        $user = $this->findUserByIdQuery->handle(Auth::user()->id);

        event(new LogActivityEvent($event, $user->id, $url,$method, $ip,$user_agent));


    }

    public function index(){

        $initPaginate = 10;

        $data = $this->fetchNewsWithPaginateQuery->handle($initPaginate); 

        return NewsResource::collection($data)->response()->getData(true);

    }

    public function showById($id){

        $news = $this->showNewsQuery->handle($id);

        return new NewsResource($news);
    }

    public function storeNews($data, $imageName){

        $users = $this->findUserByIdQuery->handle(Auth::user()->id);
    
        $news = $this->storeNewsQuery->handle($data, $users, $imageName);

        return new NewsResource($news);
    }

    public function storeImageNews($data){

        $file = $data->file('image');

        $image_uploaded_path = $file->store('assets/image', 'public');
        
        $uploadedImageResponse = array(
           "image_name" => basename($image_uploaded_path),
           "image_url" => Storage::disk('public')->url($image_uploaded_path),
           "mime" => $file->getClientMimeType() 
        );

        return 'assets/image'.'/'.$uploadedImageResponse["image_name"];

    }
    
    public function updateNewsById($data, $id, $imageName){

        return $this->updateNewsQuery->handle($data, $id, $imageName);
    }
    
    public function destroyImageStorage($id){

        $news = $this->showNewsQuery->handle($id);

        return Storage::disk('public')->delete($news->image);
        
    }
    
    public function destroyNewsById($id){
        

        return $this->deleteNewsQuery->handle($id);
    }
}

