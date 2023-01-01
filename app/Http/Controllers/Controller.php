<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * @param mixed $data
     * @return JsonResponse
     */
    public function successWithData($data): JsonResponse
    {
        return response()->json(
            [
                'success' => true,
                'data' => $data,
            ]
        );
    }

    protected function success(): JsonResponse
    {
        return response()->json(
            [
                'success' => true,
            ]
        );
    }

    protected function failed($statusCode=400):JsonResponse{
        return response()->json(
            [
                'success' => false,
            ], $statusCode
        );
    }


    protected function failedWithMsg(string $msg, string $errcode=null, $statusCode=400): JsonResponse
    {
        return response()->json(
            [
                'success' => false,
                'msg' => $msg,
                'errcode' => $errcode,
            ], $statusCode
        );
    }

    /**
     * Intended for messages that is saved in associative array,
     * with it's error related component as key name.
     */
    protected function failedWithMsgBag(array $msgErrcodeBag, $statusCode=400): JsonResponse
    {
        return response()->json(
            [
                'success' => false,
                'msgs' => $msgErrcodeBag
            ], $statusCode
        );
    }
}
