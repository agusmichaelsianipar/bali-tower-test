<?php
namespace BTNewsApp\Domain\News\Queries;

use BTNewsApp\Domain\News\News;
use BTNewsApp\Infrastructure\News\Queries\FetchNewsWithPaginateQueryContract;

class FetchNewsWithPaginateQuery implements FetchNewsWithPaginateQueryContract
{
    public function handle($initPaginate){
        return News::paginate($initPaginate);
    }
}