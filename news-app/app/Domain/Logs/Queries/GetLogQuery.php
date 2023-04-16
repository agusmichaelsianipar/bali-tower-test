<?php
namespace BTNewsApp\Domain\Logs\Queries;

use BTNewsApp\Domain\Logs\Log;
use BTNewsApp\Infrastructure\Logs\Queries\GetLogQueryContract;

class GetLogQuery implements GetLogQueryContract
{
    public function handle($init_page){
        return Log::paginate($init_page);
    }
}