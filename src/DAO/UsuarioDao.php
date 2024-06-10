<?php 

namespace App\DAO;

use App\Db\DbConn;
use App\Model\Usuario;
use Exception;

class UsuarioDao{
    public function createUser(Usuario $usuario){
        try {
            $coon = DbConn::coon();

            $email = $usuario->getEmail();
            $senha = $usuario->getSenha();
            $endereco = $usuario->getEndereco();
            $cep = $usuario->getCep();

            $sql = "INSERT INTO usuario (email, senha, endereco, cep)
                    VALUES (:email, :senha, :endereco, :cep)";

            $stmt = $coon->prepare($sql);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':senha', $senha);
            $stmt->bindParam(':endereco', $endereco);
            $stmt->bindParam(':cep', $cep);
            $stmt->execute();

            return "Usuario cadastrado com sucesso";
        } catch (\PDOException $e) {
            if($e->getCode() == 23000) throw new Exception("Email já cadastrado", 500);
            throw new Exception($e->getMessage(), 500);
        } catch (\Exception $e) {
            throw new Exception($e->getMessage(), 404);
        } finally {
            $coon = null;
        }
    }

    
}