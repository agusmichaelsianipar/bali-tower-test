<?php

namespace BTNewsApp\Http\Controllers\News;

use Illuminate\Http\Request;
use BTNewsApp\App\Controllers\Controller;
use BTNewsApp\Http\News\Requests\CreateNewsRequest;
use BTNewsApp\Http\News\Requests\UpdateNewsRequest;
use BTNewsApp\Infrastructure\News\Repositories\NewsRepositoryInterface;

class NewsController extends Controller
{
    private $newsRepository;
    public function __construct(NewsRepositoryInterface $newsRepository){

        $this->newsRepository = $newsRepository;

    }
    public function index()
    {
        return $this->newsRepository->index();
    }

    public function show($id)
    {
        return $this->newsRepository->showById($id);
    }

    public function store(CreateNewsRequest $request)
    {
        $imageName = $this->newsRepository->storeImageNews($request);
        
        return $this->newsRepository->storeNews($request, $imageName);
    }

    public function update(UpdateNewsRequest $request, $id)
    {
        $imageName = $this->newsRepository->storeImageNews($request);

        $this->newsRepository->destroyImageStorage($id);

        return $this->newsRepository->updateNewsById($request, $id, $imageName);
        
    }

    public function destroy($id)
    {
        //
    }
}
