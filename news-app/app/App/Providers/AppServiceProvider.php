<?php

namespace BTNewsApp\App\Providers;

use Illuminate\Support\ServiceProvider;
use BTNewsApp\Domain\News\Repositories\NewsRepository;
use BTNewsApp\Infrastructure\News\Repositories\NewsRepositoryInterface;

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
