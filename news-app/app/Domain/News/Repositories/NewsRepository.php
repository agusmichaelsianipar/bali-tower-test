<?php

namespace BTNewsApp\Domain\News\Repositories;

use BTNewsApp\Domain\News\News;
use Illuminate\Support\Facades\Storage;
use BTNewsApp\Http\Resources\News\NewsResource;
use BTNewsApp\Infrastructure\News\Repositories\NewsRepositoryInterface;

class NewsRepository implements NewsRepositoryInterface {
    
    private $model;

    public function __construct(News $model){
        $this->model = $model;
    }

    public function index(){

        $data = News::paginate(10);

        return [
            'key' => NewsResource::collection($data)->response()->getData(true)
        ];
    }

    public function showById($id){
        
        return new NewsResource($this->model->with('comment')->findOrFail($id));
    }

    public function storeNews($data, $imageName){

        $user = 1;
        
        $news = News::create([
            'user_id' => $user,
            'title' => $data->title,
            'content' => $data->content,
            'image' => $imageName
        ]);

        return response()->json([
            'status' => true,
            'data' => $news
        ],200);
    }

    public function storeImageNews($data){

        $file = $data->file('image');

        $image_uploaded_path = $file->store('assets/image', 'public');
        
        $uploadedImageResponse = array(
           "image_name" => basename($image_uploaded_path),
           "image_url" => Storage::disk('public')->url($image_uploaded_path),
           "mime" => $file->getClientMimeType() 
        );

        return 'storage/assets/image'.'/'.$uploadedImageResponse["image_name"];

    }
    
    public function updateNewsById($data, $id){

    }
    
    public function destroyNewsById($id){
        

    }
}

