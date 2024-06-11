<?php

namespace App\Controller;

use App\DAO\ItemDao;
use App\DAO\PedidoDao;
use App\Http\Request;
use App\Http\Response;

require_once __DIR__ . "/../Utils/functionReturnInstanciaCriadaPedido.php";
require_once __DIR__ . "/../Utils/functionReturnInstanciaCriadoItem.php";

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
        try {
            $token = Request::authorization();
            $body = Request::body();

            $pedido = returnInstanciaCriadaPedido($body, $token->idUsuario);
            $pedidoDao = new PedidoDao();
            $pedidoId = $pedidoDao->createPedido($pedido);

            $itemDao = new ItemDAO();
            for ($i=0; $i < count($body["pedido"]); $i++) { 
                $item = returnInstanciaCriadoItem($body["pedido"][$i], $pedidoId);
                $itemDao->addItem($item);
            }

            Response::responseMessage([
                "sucess" => true,
                "failed" => false,
                "message" => "pedido criado com sucesso!"
            ], 200);
        } catch (\Exception $e) {
            Response::responseMessage([
                "sucess" => false,
                "failed" => true,
                "error" => $e->getMessage(),
            ], $e->getCode());
        }
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
