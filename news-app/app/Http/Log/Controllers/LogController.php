<?php

namespace BTNewsApp\Http\Log\Controllers;

use BTNewsApp\App\Controllers\Controller;
use BTNewsApp\Infrastructure\Logs\Repositories\LogRepositoryInterface;

class LogController extends Controller
{
    private $logRepository;

    public function __construct(LogRepositoryInterface $logRepository){

        $this->logRepository = $logRepository;
    }
    public function index()
    {
        $logs = $this->logRepository->fetchLog();

        return $this->jsonSuccessResponse($logs);
        
    }

}
