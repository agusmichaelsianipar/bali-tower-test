<?php

namespace BTNewsApp\App\Providers;

use Illuminate\Support\ServiceProvider;
use BTNewsApp\Domain\Logs\Repositories\LogRepository;
use BTNewsApp\Domain\News\Repositories\NewsRepository;
use BTNewsApp\Domain\Comments\Repositories\CommentRepository;
use BTNewsApp\Infrastructure\Logs\Repositories\LogRepositoryInterface;
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
        // 
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
