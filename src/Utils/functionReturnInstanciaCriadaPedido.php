<?php

use App\Model\Pedido;

function returnInstanciaCriadaPedido($body, $idUsuario)
{
    $dataAtual = date('Y-m-d H:i:s');
    $hoje = new DateTime($dataAtual);
    $dataEntrega = new DateTime($dataAtual);

    return new Pedido(
        null,
        $hoje,
        $dataEntrega,
        $body["idTipoDePagamento"],
        4,
        $idUsuario
    );
}
