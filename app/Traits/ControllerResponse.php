<?php

namespace App\Traits;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;

trait ControllerResponse
{
    protected function successResponse(string $message, mixed $data = null, int $status = 201): JsonResponse|RedirectResponse
    {
        $response = [
            'success' => true,
            'message' => $message,
        ];

        if (!is_null($data)) {
            $response['data'] = $data;
        }

        return response()->json($response, $status);
    }

    protected function errorResponse(string $message, mixed $error = null, int $status = 500): JsonResponse|RedirectResponse
    {
        $response = [
            'success' => false,
            'message' => $message
        ];

        if (!is_null($error)) {
            $response['errors'] = $error;
        }

        return response()->json($response, $status);
    }
}
