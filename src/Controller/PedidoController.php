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
        try {
            $token = Request::authorization();

            $pedidoDao = new PedidoDao();
            $result = $pedidoDao->getAllPedidos($token->idUsuario);

            $itemDao = new ItemDao();
            for ($i = 0; $i < count($result); $i++) {
                $itensDoPedido = $itemDao->getItensPedidoComProdutos($result[$i]["idPedido"]);
                $result[$i]["dadosPedido"] = $itensDoPedido;
            }

            Response::responseMessage([
                "sucess" => true,
                "failed" => false,
                "data" => $result
            ], 200);
        } catch (\Exception $e) {
            Response::responseMessage([
                "sucess" => false,
                "failed" => true,
                "error" => $e->getMessage(),
            ], $e->getCode());
        }
    }

    public function getPedido($id)
    {
        try {
            $token = Request::authorization();

            $pedidoDao = new PedidoDao();
            $result = $pedidoDao->getPedido($token->idUsuario, $id[0]);
            $itemDao = new ItemDao();
            $itensDoPedido = $itemDao->getItensPedidoComProdutos($result["idPedido"]);
            $result["dadosPedido"] = $itensDoPedido;

            Response::responseMessage([
                "sucess" => true,
                "failed" => false,
                "data" => $result
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
            for ($i = 0; $i < count($body["pedido"]); $i++) {
                $item = returnInstanciaCriadoItem($body["pedido"][$i], $pedidoId);
                $itemDao->addItem($item);
            }

            Response::responseMessage([
                "sucess" => true,
                "failed" => false,
                "message" => "pedido criado com sucesso!"
            ], 200);
        } catch (\Exception $e) {
            //$pedidoDao->deletePedido($pedidoId);//ver aqui ainda
            Response::responseMessage([
                "sucess" => false,
                "failed" => true,
                "error" => $e->getMessage(),
            ], $e->getCode());
        }
    }

    public function cancelPedido()
    {
        try {
            $token = Request::authorization();
            $body = Request::body();

            $pedidoDao = new PedidoDao();
            $result = $pedidoDao->cancelPedido($body["idPedido"], $token->idUsuario);

            Response::responseMessage([
                "sucess" => true,
                "failed" => false,
                "message" => $result
            ], 200);
        } catch (\Exception $e) {
            Response::responseMessage([
                "sucess" => false,
                "failed" => true,
                "error" => $e->getMessage(),
            ], $e->getCode());
        }
    }

    public function deletePedido()
    {
        echo "deletePedido";
    }
}
