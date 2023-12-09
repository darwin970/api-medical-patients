<?php

namespace App\Http\Responses;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\Response;

class GeneralJsonResponse
{
    private static string $defaultMessage = 'Operación exitosa.';

    public static function success(string $message, Model $data = null)
    {
        return response()->json([
            'message' => $message,
            'data' => $data,
        ], Response::HTTP_OK);
    }

    public static function successList(array $data = null)
    {
        return response()->json([
            'message' => self::$defaultMessage,
            'data' => $data,
        ], Response::HTTP_OK);
    }

    public static function error(string $message, int $statusCode)
    {
        throw new HttpResponseException(response()->json([
            'message' => $message,
            'errors' => [],
        ])->setStatusCode($statusCode));
    }
}
