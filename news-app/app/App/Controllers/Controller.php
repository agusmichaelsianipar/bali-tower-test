<?php

namespace BTNewsApp\App\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function jsonSuccessResponse($data, $code = 200 , $message = 'Success', $status = true, $meta = []){
        $response = [
            'status' => $status,
            'code' => $code,
            'message' => $message,
            'data' => $data,
        ];

        return response()->json($response, $code);
    }

    public function jsonErrorResponse($error, $code = 422, $status = false, $errorDetails = []){
        $response = [
            'error' => $error,
            'code' => $code,
            'status' => $status,
        ];

        if (!empty($errorDetails)) {
            $response['errorDetails'] = $errorDetails;
        }

        return response()->json($response, $code);
    }
}
