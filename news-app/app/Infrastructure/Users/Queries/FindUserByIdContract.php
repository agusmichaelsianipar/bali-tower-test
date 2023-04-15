<?php

namespace BTNewsApp\Infrastructure\Users\Queries;

Interface FindUserByIdContract{
    public function handle($user_id);
}