<?php

use App\Model\Item;

function returnInstanciaCriadoItem($body, $idPedido)
{
    return new Item(
        null,
        $body["quantidade"],
        $body["idProduto"],
        $idPedido
    );
}
