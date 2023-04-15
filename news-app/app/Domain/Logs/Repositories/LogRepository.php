<?php

namespace BTNewsApp\Domain\Logs\Repositories;

use BTNewsApp\Domain\Logs\Log;
use BTNewsApp\Http\Log\Resources\LogResource;
use BTNewsApp\Infrastructure\Logs\Repositories\LogRepositoryInterface;

class LogRepository implements LogRepositoryInterface {
    
    private $model;
    public function __construct(Log $model){

        $this->model = $model;
        
    }

    public function fetchLog(){
        
        $log = Log::paginate(10);

        return LogResource::collection($log)->response()->getData(true);
    }



}

