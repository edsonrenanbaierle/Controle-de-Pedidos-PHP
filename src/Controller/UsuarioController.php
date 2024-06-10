<?php 
namespace App\Controller;

use App\DAO\UsuarioDao;
use App\Http\Request;
use App\Http\RequestValidateUsuarioController;
use App\Http\Response;

require_once __DIR__ . "/../Utils/functionReturnInstanciaCriadaUsuario.php";

class UsuarioController{
    public function login(){
        echo "login";
    }

    public function createUser(){
        try {
            $body = Request::body();

            RequestValidateUsuarioController::validateControllerCategoria($body, "createUser");
            $usuario = returnInstanciaCriadaUsuarioCreateUser($body);

            $usuarioDao = new UsuarioDao();
            $respostaAoUsuario = $usuarioDao->createUser($usuario);

            Response::responseMessage([
                "sucess" => true,
                "failed" => false,
                "Message" => $respostaAoUsuario
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
