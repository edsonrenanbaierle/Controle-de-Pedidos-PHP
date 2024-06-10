<?php

namespace App\Http;

use Firebase\JWT\JWT;

class Response
{

    public static function responseMessage(array $body = [], int $statusCode = 200)
    {
        header("Content-type: application/json");
        http_response_code($statusCode);


        echo json_encode($body);
    }

    public static function generateToken($body){
        $payload = [
            "exp" => time() + 2000000000,
            "iat" => time(),
            "email" => $body["email"],
            "idUsuario" => $body["idUsuario"]
        ];

        $encode = JWT::encode($payload, $_ENV['KEY'], "HS256");

        return $encode;
    }
}
