<?php
namespace BTNewsApp\Domain\Users\Queries;

use BTNewsApp\Domain\Users\User;
use BTNewsApp\Infrastructure\Users\Queries\FindUserByIdQueryContract;

class FindUserByIdQuery implements FindUserByIdQueryContract
{
    public function handle($user_id){
        return User::query()->find($user_id);
    }
}