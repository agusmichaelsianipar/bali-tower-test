<?php

namespace BTNewsApp\Infrastructure\Users\Queries;

Interface FindUserByIdQueryContract{
    public function handle($user_id);
}