<?php

namespace App\DAO;

use App\Db\DbConn;
use App\Http\Response;
use App\Model\Usuario;
use Exception;
use PDO;

class UsuarioDao
{

    public function auth($body)
    {
        try {
            $coon = DbConn::coon();

            $email = $body["email"];

            $sql = "SELECT * FROM usuario
                    WHERE email = :email";

            $stmt = $coon->prepare($sql);
            $stmt->bindParam(":email", $email);
            $stmt->execute();

            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($stmt->rowCount() == 0) throw new Exception("Email ou Senha incorreto", 401);
            if (!password_verify($body["senha"], $user["senha"])) throw new Exception("Email ou Senha incorreto", 401);

            $token = Response::generateToken($user);
            return $token;
        } catch (\PDOException $e) {
            throw new Exception($e->getMessage(), 500);
        } catch (\Exception $e) {
            throw new Exception($e->getMessage(), $e->getCode());
        } finally {
            $coon = null;
        }
    }

    public function createUser(Usuario $usuario)
    {
        try {
            $coon = DbConn::coon();

            $email = $usuario->getEmail();
            $senha = $usuario->getSenha();
            $endereco = $usuario->getEndereco();
            $cep = $usuario->getCep();
            $idPermissao = 1;

            $sql = "INSERT INTO usuario (email, senha, endereco, cep, idPermissao)
                    VALUES (:email, :senha, :endereco, :cep, :idPermissao)";

            $stmt = $coon->prepare($sql);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':senha', $senha);
            $stmt->bindParam(':endereco', $endereco);
            $stmt->bindParam(':cep', $cep);
            $stmt->bindParam(':idPermissao', $idPermissao);
            $stmt->execute();

            return "Usuario cadastrado com sucesso";
        } catch (\PDOException $e) {
            if ($e->getCode() == 23000) throw new Exception("Email já cadastrado", 500);
            throw new Exception($e->getMessage(), 500);
        } catch (\Exception $e) {
            throw new Exception($e->getMessage(), 404);
        } finally {
            $coon = null;
        }
    }

    public function updateUser(Usuario $usuario, $id)
    {
        try {
            $coon = DbConn::coon();

            $email = $usuario->getEmail();
            $senha = $usuario->getSenha();
            $endereco = $usuario->getEndereco();
            $cep = $usuario->getCep();

            $sql = "UPDATE usuario 
                    SET email = :email, senha = :senha, endereco = :endereco, cep = :cep
                    WHERE idUsuario = :id";

            $stmt = $coon->prepare($sql);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':senha', $senha);
            $stmt->bindParam(':endereco', $endereco);
            $stmt->bindParam(':cep', $cep);
            $stmt->bindParam(':id', $id);
            $stmt->execute();

            return "Usuario atualizado com sucesso";
        } catch (\PDOException $e) {
            throw new Exception($e->getMessage(), 500);
        } catch (\Exception $e) {
            throw new Exception($e->getMessage(), 404);
        } finally {
            $coon = null;
        }
    }

    public function getUser($idUsuario)
    {
        try {
            $coon = DbConn::coon();

            $sql = "SELECT email, endereco, cep FROM usuario
                    WHERE idUsuario = :idUsuario";

            $stmt = $coon->prepare($sql);
            $stmt->bindParam(':idUsuario', $idUsuario);
            $stmt->execute();

            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (\PDOException $e) {
            throw new Exception($e->getMessage(), 500);
        } catch (\Exception $e) {
            throw new Exception($e->getMessage(), 404);
        } finally {
            $coon = null;
        }
    }
}
