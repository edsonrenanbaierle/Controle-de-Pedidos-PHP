<?php

namespace App\Db;

use App\Http\Response;
use PDO;

class DbConn
{

    public static function coon()
    {
        try {
            return new PDO("mysql:host=" . $_ENV['HOST'] . ";dbname=" . $_ENV['DB'], $_ENV['USER'], $_ENV['PASSWORD']);
        } catch (\PDOException $e) {
            Response::responseMessage(
                ["error" => "Erro ao conectar-se ao banco de dados"],
                404
            );
            exit;
        }
    }
}
