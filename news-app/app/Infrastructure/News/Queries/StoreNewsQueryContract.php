<?php

namespace BTNewsApp\Infrastructure\News\Queries;

Interface StoreNewsQueryContract{
    public function handle($data, $users, $imageName);
}