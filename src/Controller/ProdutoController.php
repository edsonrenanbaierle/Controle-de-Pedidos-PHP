<?php

namespace App\Controller;

use App\DAO\ProdutoDao;
use App\Http\Request;
use App\Http\RequestValidateProdutoController;
use App\Http\Response;

require_once __DIR__ . "/../Utils/functionReturnInstanciaCriadoProduto.php";

class ProdutoController
{

    public function createProduto()
    {
        try {
            $token = Request::authorization();
            if ($token->permissao != 2) throw new \Exception("Sem autorização", 401);

            $body = Request::body();
            RequestValidateProdutoController::validateProdutoController($body, "createProduto");

            $produto = returnInstanciaCriadoProduto($body);
            $produtoDao = new ProdutoDao();
            $response = $produtoDao->createProduto($produto);

            Response::responseMessage([
                "sucess" => true,
                "failed" => false,
                "message" => $response
            ], 200);
        } catch (\Exception $e) {
            Response::responseMessage([
                "sucess" => false,
                "failed" => true,
                "error" => $e->getMessage(),
            ], $e->getCode());
        }
    }

    public function deleteProduto()
    {
        try {
            $token = Request::authorization();
            if ($token->permissao != 2) throw new \Exception("Sem autorização", 401);

            $body = Request::body();
            RequestValidateProdutoController::validateProdutoController($body, "deleteProduto");

            $produtoDao = new ProdutoDao();
            $response = $produtoDao->deleteProduto($body["idProduto"]);

            Response::responseMessage([
                "sucess" => true,
                "failed" => false,
                "message" => $response
            ], 200);
        } catch (\Exception $e) {
            Response::responseMessage([
                "sucess" => false,
                "failed" => true,
                "error" => $e->getMessage(),
            ], $e->getCode());
        }
    }

    public function getAllProdutos()
    {
        try {
            $token = Request::authorization();
            if ($token->permissao != 2) throw new \Exception("Sem autorização", 401);

            $produtoDao = new ProdutoDao();
            $response = $produtoDao->getAllProdutos();

            Response::responseMessage([
                "sucess" => true,
                "failed" => false,
                "produtos" => $response
            ], 200);
        } catch (\Exception $e) {
            Response::responseMessage([
                "sucess" => false,
                "failed" => true,
                "error" => $e->getMessage(),
            ], $e->getCode());
        }
    }

    public function updateProduto()
    {
        try {
            $token = Request::authorization();
            if ($token->permissao != 2) throw new \Exception("Sem autorização", 401);

            $body = Request::body();
            RequestValidateProdutoController::validateProdutoController($body, "updateProduto");

            $produto = returnInstanciaUpdateProduto($body);
            $produtoDao = new ProdutoDao();
            $response = $produtoDao->updateProduto($produto);

            Response::responseMessage([
                "sucess" => true,
                "failed" => false,
                "message" => $response
            ], 200);
        } catch (\Exception $e) {
            Response::responseMessage([
                "sucess" => false,
                "failed" => true,
                "error" => $e->getMessage(),
            ], $e->getCode());
        }
    }

    public function getProduto($id)
    {
        try {
            $token = Request::authorization();
            if ($token->permissao != 2) throw new \Exception("Sem autorização", 401);

            $produtoDao = new ProdutoDao();
            $response = $produtoDao->getProduto($id[0]);

            Response::responseMessage([
                "sucess" => true,
                "failed" => false,
                "produto" => $response
            ], 200);
        } catch (\Exception $e) {
            Response::responseMessage([
                "sucess" => false,
                "failed" => true,
                "error" => $e->getMessage(),
            ], $e->getCode());
        }
    }
}
