<?php

use App\Model\Usuario;

function returnInstanciaCriadaUsuarioCreateUser($body)
{
    $body["senha"] = password_hash($body["senha"], PASSWORD_DEFAULT);
    return new Usuario(
        null,
        $body["email"],
        $body["senha"],
        $body["endereco"],
        $body["cep"],
        null
    );
}

function returnInstanciaCriadaUsuarioUpdateUser($body)
{
    $body["senha"] = password_hash($body["senha"], PASSWORD_DEFAULT);
    return new Usuario(
        null,
        $body["email"],
        $body["senha"],
        $body["endereco"],
        $body["cep"],
        null
    );
}
