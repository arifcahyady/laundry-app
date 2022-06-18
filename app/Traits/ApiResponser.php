<?php

namespace App\Traits;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

trait ApiResponser
{
    /**
     * @param array $data
     * @param int $statusCode
     * @param array $headers
     * @return array
     */

    /**
     * Return generic json response with the given data.
     *
     * @param array $data
     * @param int $statusCode
     * @param array $headers
     *
     * @return JsonResponse
     */

    /**
     * @param JsonResource $resource
     * @param null $message
     * @param int $statusCode
     * @param array $headers
     * @return JsonResponse
     */

    /**
     * @param ResourceCollection $resourceCollection
     * @param null $message
     * @param int $statusCode
     * @param array $headers
     * @return JsonResponse
     */

    protected function successResponse($data, $message = null, $code = 200)
    {
        return response()->json([
            'success' => true,
            'status' => 'success',
            'message' => $message,
            'data' => $data,
        ], $code);
    }

    protected function errorResponse($message, $code = 400)
    {
        return response()->json([
            'success' => false,
            'status' => 'error',
            'message' => $message,
            'data' => null,
        ], $code);
    }

    protected function notFoundResponse($data = '')
    {
        return response()->json([
            'success' => false,
            'status' => 'not_found',
            'message' => 'Data ' . $data . ' tidak ditemukan !',
            'data' => null,
        ], 404);
    }
}
