<?php

namespace App\Db;

use App\Http\Response;
use PDO;

class DbConn
{

    public static function coon()
    {
        try {
            $host = "meu-mysql-desafio3-1";
            $user = "root";
            $password = "root";
            $db = "desafio3product";

            return new PDO("mysql:host=$host;dbname=$db", $user, $password);
        } catch (\PDOException $e) {
            Response::responseMessage(
                ["error" => "Erro ao conectar-se ao banco de dados"],
                404
            );
            exit;
        }
    }
}
