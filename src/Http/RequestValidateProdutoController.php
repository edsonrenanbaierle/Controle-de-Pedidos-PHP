<?php

namespace App\Http;

class RequestValidateProdutoController
{
    private static $dataRequestControllerConfirmation = [
        "createProduto" => ["nome", "preco", "descricao"],
        "updateProduto" => ["idProduto", "nome", "preco", "descricao", "estoque"],
        "deleteProduto" => ["idProduto"]
    ];

    public static function validateProdutoController($body, $nameFunctionControlerProduct)
    {
        $deveConterPorParametro = self::$dataRequestControllerConfirmation[$nameFunctionControlerProduct];
        foreach ($deveConterPorParametro as $value) {
            if (!isset($body["$value"])) {
                $error =  ["error" => "Campo $value não informado"];
                break;
            }
        }
        if (count($body) > count($deveConterPorParametro)) {
            $quantidadeDeParametrosExtras = count($body) - count($deveConterPorParametro);
            $error = ["error" => "Por favor confirme os parametro, $quantidadeDeParametrosExtras parametro passado a mais"];
        }

        if (isset($error["error"])) {
            throw new \Exception($error["error"], 400);
        }
    }
}
