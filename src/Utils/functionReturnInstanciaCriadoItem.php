<?php

use App\Model\Item;
use App\Model\Pedido;
use App\Model\Usuario;

function returnInstanciaCriadoItem($body, $idPedido)
{
    return new Item(
        null, 
        $body["quantidade"],
        $body["idProduto"],
        $idPedido
    );
}
