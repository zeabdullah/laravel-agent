<?php

namespace App\Common;

trait ResponseTrait
{
    public static function responseJson($payload, $status = "success", int $status_code = 200)
    {
        return response()->json([
            "status" => $status,
            "payload" => $payload
        ], $status_code);
    }
}
