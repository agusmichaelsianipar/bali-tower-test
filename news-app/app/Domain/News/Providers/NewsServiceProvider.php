<?php
namespace BTNewsApp\Domain\News\Providers;

use Illuminate\Support\ServiceProvider;
use BTNewsApp\Domain\News\Queries\ShowNewsQuery;
use BTNewsApp\Domain\News\Queries\StoreNewsQuery;
use BTNewsApp\Domain\News\Queries\DeleteNewsQuery;
use BTNewsApp\Domain\News\Queries\UpdateNewsQuery;
use BTNewsApp\Domain\News\Queries\FetchNewsWithPaginateQuery;
use BTNewsApp\Infrastructure\News\Queries\ShowNewsQueryContract;
use BTNewsApp\Infrastructure\News\Queries\StoreNewsQueryContract;
use BTNewsApp\Infrastructure\News\Queries\DeleteNewsQueryContract;
use BTNewsApp\Infrastructure\News\Queries\UpdateNewsQueryContract;
use BTNewsApp\Infrastructure\News\Queries\FetchNewsWithPaginateQueryContract;

class NewsServiceProvider extends ServiceProvider
{
    public $bindings = [
        FetchNewsWithPaginateQueryContract::class => FetchNewsWithPaginateQuery::class,
        ShowNewsQueryContract::class => ShowNewsQuery::class,
        StoreNewsQueryContract::class => StoreNewsQuery::class,
        UpdateNewsQueryContract::class => UpdateNewsQuery::class,
        DeleteNewsQueryContract::class => DeleteNewsQuery::class,
    ];
}