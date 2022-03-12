<?php

namespace App\Traits;

use Illuminate\Http\JsonResponse;
use Response;

trait ApiResponse
{
    public function success(
        string $message = '',
        array  $data = []
    ): JsonResponse
    {
        return Response::json([
            'message' => $message,
            'result' => $data
        ]);
    }

    public function error(
        string $message = '',
        array $errors = [],
        int $statusCode = 500
    ): JsonResponse {
        return Response::json([
            'message' => $message,
            'errors' => $errors,
            'status_code' => $statusCode,
        ], $statusCode);
    }
}
