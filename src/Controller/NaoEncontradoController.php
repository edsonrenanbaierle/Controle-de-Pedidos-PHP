<?php

namespace App\Controller;

use App\Http\Response;

class NaoEncontradoController
{

    public function naoEncontradoRota()
    {
        $body = [
            "erro" => true,
            "sucess" => false,
            "message" => "Rota definida não encontrada"
        ];

        Response::responseMessage($body, 404);
    }
}
