<?php

$routes = [
    "POST/login"                => "UsuarioController@login",
    "POST/usuario"              => "UsuarioController@createUser",
    "PUT/usuario"               => "UsuarioController@updateUser",
    "GET/usuario"               => "UsuarioController@getUser",
    "GET/pedidos"               => "PedidoController@getAllPedidos",
    "GET/pedidos/{id}"          => "PedidoController@getPedido",
    "POST/pedidos"              => "PedidoController@createPedido",
    "POST/pedidos/cancelar"     => "PedidoController@cancelPedido",
    "DELETE/pedidos"            => "PedidoController@deletePedido",
    "POST/produto"              => "ProdutoController@createProduto",
    "DELETE/produto"            => "ProdutoController@deleteProduto",
    "PUT/produto"               => "ProdutoController@updateProduto",
    "GET/allProdutos"           => "ProdutoController@getAllProdutos",
    "GET/produto/{id}"          => "ProdutoController@getProduto"
];
