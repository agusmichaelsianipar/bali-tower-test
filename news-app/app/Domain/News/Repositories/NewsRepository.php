<?php

namespace BTNewsApp\Domain\News\Repositories;

use BTNewsApp\Domain\News\News;
use BTNewsApp\Domain\Users\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use BTNewsApp\App\Log\Event\LogActivityEvent;
use BTNewsApp\Http\News\Resources\NewsResource;
use BTNewsApp\Infrastructure\News\Repositories\NewsRepositoryInterface;

class NewsRepository implements NewsRepositoryInterface {
    
    private $model;
    public function __construct(News $model){

        $this->model = $model;
        
    }

    public function newsLog($event, $url, $method, $ip, $user_agent){
        $user = User::find(Auth::user()->id);
        event(new LogActivityEvent($event, $user->id, $url,$method, $ip,$user_agent));

    }

    public function index(){

        $data = News::paginate(10);

        return NewsResource::collection($data)->response()->getData(true);
    }

    public function showById($id){
        
        return new NewsResource($this->model->with('comment')->findOrFail($id));
    }

    public function storeNews($data, $imageName){

        $user = User::find(Auth::user()->id);
    
        $news =  News::create([
            'user_id' => $user->id,
            'title' => $data->title,
            'content' => $data->content,
            'image' => $imageName
        ]);
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

        return News::where('id', $id)->update([
            'title' => $data->title,
            'content' => $data->content,
            'image' => $imageName
        ]);
        
    }
    
    public function destroyImageStorage($id){
        $news = News::find($id);

        return Storage::disk('public')->delete($news->image);
        
    }
    
    public function destroyNewsById($id){
        
        $news = News::findOrFail($id);

        $news->delete();

        return 1;
    }
}

