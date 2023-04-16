<?php
namespace BTNewsApp\Domain\Logs\Providers;

use Illuminate\Support\ServiceProvider;
use BTNewsApp\Domain\Logs\Queries\GetLogQuery;
use BTNewsApp\Domain\Logs\Repositories\LogRepository;
use BTNewsApp\Infrastructure\Logs\Queries\GetLogQueryContract;
use BTNewsApp\Infrastructure\Logs\Repositories\LogRepositoryInterface;

class LogServiceProvider extends ServiceProvider
{
    public $bindings = [
        LogRepositoryInterface::class => LogRepository::class,
        GetLogQueryContract::class => GetLogQuery::class,
    ];
}