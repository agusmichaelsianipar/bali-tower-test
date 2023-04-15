<?php

namespace BTNewsApp\Http\Controllers\News;

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
        return $this->newsRepository->getNews();
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        return $this->newsRepository->getNewsById($id);
    }

    public function edit($id)
    {
        //
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
