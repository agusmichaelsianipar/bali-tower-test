<?php

namespace BTNewsApp\Domain\Logs\Repositories;

use BTNewsApp\Domain\Logs\Log;
use BTNewsApp\Http\Log\Resources\LogResource;
use BTNewsApp\Infrastructure\Logs\Queries\GetLogQueryContract;
use BTNewsApp\Infrastructure\Logs\Repositories\LogRepositoryInterface;

class LogRepository implements LogRepositoryInterface {
    
    private $getLog;
    public function __construct(GetLogQueryContract $getLog){

        $this->getLog = $getLog;
        
    }

    public function fetchLog(){

        $init_page = 10;

        $log = $this->getLog->handle($init_page);

        return LogResource::collection($log)->response()->getData(true);
    }



}

