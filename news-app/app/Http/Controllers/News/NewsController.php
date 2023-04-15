<?php

namespace BTNewsApp\Http\Controllers\News;

use BTNewsApp\Http\News\Requests\CreateNewsRequest;
use BTNewsApp\Infrastructure\News\Repositories\NewsRepositoryInterface;
use BTNewsApp\App\Controllers\Controller;
use Illuminate\Http\Request;

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

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
