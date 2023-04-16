<?php

namespace BTNewsApp\Infrastructure\News\Queries;

Interface FetchNewsWithPaginateQueryContract{
    public function handle($initPaginate);
}