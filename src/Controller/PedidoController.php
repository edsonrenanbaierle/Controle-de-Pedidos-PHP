<?php

namespace App\Controller;

use App\Http\Request;
use App\Http\Response;

class PedidoController
{

    public function getAllPedidos()
    {
        echo "getAllPedidos";
    }

    public function getPedido()
    {
        try {
            $token = Request::authorization();
            print_r($token);
            print_r($token->email);
            print_r($token->idUsuario);
            exit;

            $respostaAoUsuario = null;
            Response::responseMessage([
                "sucess" => true,
                "failed" => false,
                "token" => $respostaAoUsuario
            ], 200);
        } catch (\Exception $e) {
            Response::responseMessage([
                "sucess" => false,
                "failed" => true,
                "error" => $e->getMessage(),
            ], $e->getCode());
        }
    }

    public function createPedido()
    {
        echo "createPedido";
    }

    public function cancelPedido()
    {
        echo "cancelPedido";
    }

    public function deletePedido()
    {
        echo "deletePedido";
    }
}
