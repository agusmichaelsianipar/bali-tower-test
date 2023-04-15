<?php

namespace BTNewsApp\App\Providers;

use Illuminate\Support\ServiceProvider;
use BTNewsApp\Domain\News\Repositories\NewsRepository;
use BTNewsApp\Domain\Comments\Repositories\CommentRepository;
use BTNewsApp\Infrastructure\News\Repositories\NewsRepositoryInterface;
use BTNewsApp\Infrastructure\Comments\Repositories\CommentRepositoryInterface;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(NewsRepositoryInterface::class, NewsRepository::class);
        $this->app->bind(CommentRepositoryInterface::class, CommentRepository::class);
        
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
