<?php
namespace BTNewsApp\Domain\Users\Providers;

use Illuminate\Support\ServiceProvider;
use BTNewsApp\Domain\Users\Queries\FindUserByIdQuery;
use BTNewsApp\Infrastructure\Users\Queries\FindUserByIdQueryContract;

class UserServiceProvider extends ServiceProvider
{
    public $bindings = [
        FindUserByIdQueryContract::class => FindUserByIdQuery::class,
    ];
}