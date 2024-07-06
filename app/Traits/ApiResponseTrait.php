<?php

namespace App\Traits;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;
use Illuminate\Pagination\LengthAwarePaginator;

trait ApiResponseTrait{

    protected function validationResponse($validations = null, $status)
    {
        return response()->json($validations, $status);
    }

    protected function successResponse($data, $message = null, $status = 200)
    {
        return response()->json([
            'status'=> $status,
            'message' => $message,
            'data' => $data
        ], $status);
    }

    protected function errorResponse($message = null, $status)
    {
        return response()->json([
            'status'=> $status,
            'message' => $message,
            'data' => []
        ], $status);
    }



}
