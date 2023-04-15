<?php

namespace BTNewsApp\Http\News\Controllers;

use Illuminate\Http\Request;
use BTNewsApp\App\Controllers\Controller;
use BTNewsApp\Http\News\Requests\CreateNewsRequest;
use BTNewsApp\Http\News\Requests\UpdateNewsRequest;
use BTNewsApp\Infrastructure\News\Repositories\NewsRepositoryInterface;
use Illuminate\Support\Facades\Auth;

class NewsController extends Controller
{
    private $newsRepository;
    public function __construct(NewsRepositoryInterface $newsRepository){

        $this->middleware(['auth:api','isAdmin'])->except('index','show');
        
        $this->newsRepository = $newsRepository;

    }
    public function index()
    {
        $news = $this->newsRepository->index();

        return $this->jsonSuccessResponse($news);
    }

    public function show($id)
    {
        $news = $this->newsRepository->showById($id);

        return $this->jsonSuccessResponse($news);
    }

    public function store(CreateNewsRequest $request)
    {
        $imageName = $this->newsRepository->storeImageNews($request);
        
        $news = $this->newsRepository->storeNews($request, $imageName);
        
        $this->newsRepository->newsLog("News successfully created!",$request->url(), $request->method(), $request->ip(), $request->userAgent());

        return $this->jsonSuccessResponse($news);
    }

    public function update(UpdateNewsRequest $request, $id)
    {
        $imageName = $this->newsRepository->storeImageNews($request);

        $this->newsRepository->destroyImageStorage($id);

        $news = $this->newsRepository->updateNewsById($request, $id, $imageName);
        
        $this->newsRepository->newsLog("News successfully updated!",$request->url(), $request->method(), $request->ip(), $request->userAgent());

        return $this->jsonSuccessResponse(null);
    }

    public function destroy(Request $request, $id)
    {
        $this->newsRepository->destroyNewsById($id);

        $this->newsRepository->newsLog("News successfully deleted!", $request->url(), $request->method(), $request->ip(), $request->userAgent());

        return $this->jsonSuccessResponse(null);
    }
}
