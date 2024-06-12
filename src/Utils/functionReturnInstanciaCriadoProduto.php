<?php

use App\Model\Produto;

function returnInstanciaCriadoProduto($body)
{
    return new Produto(
        null,
        0,
        $body["nome"],
        $body["preco"],
        $body["descricao"]
    );
}

function returnInstanciaUpdateProduto($body)
{
    return new Produto(
        $body["idProduto"],
        $body["estoque"],
        $body["nome"],
        $body["preco"],
        $body["descricao"]
    );
}
