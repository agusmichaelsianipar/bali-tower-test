<?php
namespace BTNewsApp\Domain\Users\Providers;

use Illuminate\Support\ServiceProvider;
use BTNewsApp\Domain\Users\Queries\FindUserById;
use BTNewsApp\Infrastructure\Users\Queries\FindUserByIdContract;

class UserServiceProvider extends ServiceProvider
{
    public $bindings = [
        FindUserByIdContract::class => FindUserById::class,
    ];
}