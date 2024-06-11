<?php

$routes = [
    "POST/login"                => "UsuarioController@login",
    "POST/usuario"              => "UsuarioController@createUser",
    "PATCH/usuario"             => "UsuarioController@updateUser",
    "GET/pedidos"               => "PedidoController@getAllPedidos",
    "GET/pedidos/{id}"          => "PedidoController@getPedido",
    "POST/pedidos"              => "PedidoController@createPedido",
    "POST/pedidos/cancelar"     => "PedidoController@cancelPedido",
    "DELETE/pedidos"            => "PedidoController@deletePedido"
];
