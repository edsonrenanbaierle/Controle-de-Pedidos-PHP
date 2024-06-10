<?php

use App\Model\Usuario;

function returnInstanciaCriadaUsuarioCreateUser($body){
    return new Usuario(
        null,
        $body["email"],
        $body["senha"],
        $body["endereco"],
        $body["cep"]
    );
}