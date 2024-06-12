<?php

namespace App\DAO;

use App\Db\DbConn;
use App\Model\Produto;
use Exception;

class ProdutoDao
{

    public function createProduto(Produto $produto)
    {
        try {
            $coon = DbConn::coon();

            $estoque = $produto->getEstoque();
            $nome = $produto->getNome();
            $preco = $produto->getPreco();
            $descricao = $produto->getDescricao();

            $sql = "INSERT INTO produto (estoque, nome, preco, descricao)
                    VALUES (:estoque, :nome, :preco, :descricao)";

            $stmt = $coon->prepare($sql);
            $stmt->bindParam(':estoque', $estoque);
            $stmt->bindParam(':nome', $nome);
            $stmt->bindParam(':preco', $preco);
            $stmt->bindParam(':descricao', $descricao);
            $stmt->execute();

            return "Produto Cadastrado com sucesso!";
        } catch (\PDOException $e) {
            throw new Exception($e->getMessage(), 500);
        } catch (\Exception $e) {
            throw new Exception($e->getMessage(), 404);
        } finally {
            $coon = null;
        }
    }

    public function updateProduto(Produto $produto)
    {
        try {
            $coon = DbConn::coon();

            $idProduto = $produto->getIdProduto();
            $estoque = $produto->getEstoque();
            $nome = $produto->getNome();
            $preco = $produto->getPreco();
            $descricao = $produto->getDescricao();

            $sql = "UPDATE produto 
                    SET estoque = :estoque, nome = :nome, preco = :preco, descricao = :descricao 
                    WHERE idProduto = :idProduto";

            $stmt = $coon->prepare($sql);
            $stmt->bindParam(':estoque', $estoque);
            $stmt->bindParam(':nome', $nome);
            $stmt->bindParam(':preco', $preco);
            $stmt->bindParam(':descricao', $descricao);
            $stmt->bindParam(':idProduto', $idProduto);
            $stmt->execute();

            return "Produto atualizado com sucesso!";
        } catch (\PDOException $e) {
            throw new Exception($e->getMessage(), 500);
        } catch (\Exception $e) {
            throw new Exception($e->getMessage(), 404);
        } finally {
            $coon = null;
        }
    }

    public function deleteProduto($idProduto)
    {
        try {
            $coon = DbConn::coon();

            $sql = "DELETE FROM produto
                    WHERE idProduto = :idProduto";

            $stmt = $coon->prepare($sql);
            $stmt->bindParam(':idProduto', $idProduto);
            $stmt->execute();

            return "Produto deletado com sucesso!";
        } catch (\PDOException $e) {
            throw new Exception($e->getMessage(), 500);
        } catch (\Exception $e) {
            throw new Exception($e->getMessage(), 404);
        } finally {
            $coon = null;
        }
    }

    public function getAllProdutos()
    {
        try {
            $coon = DbConn::coon();

            $sql = "SELECT * FROM produto";

            $stmt = $coon->prepare($sql);
            $stmt->execute();
            
            return $stmt->fetchAll(\PDO::FETCH_ASSOC);
        } catch (\PDOException $e) {
            throw new Exception($e->getMessage(), 500);
        } catch (\Exception $e) {
            throw new Exception($e->getMessage(), 404);
        } finally {
            $coon = null;
        }
    }

    public function getProduto($idProduto)
    {
        try {
            $coon = DbConn::coon();

            $sql = "SELECT * FROM produto
                    WHERE idProduto = :idProduto";

            $stmt = $coon->prepare($sql);
            $stmt->bindParam(":idProduto", $idProduto);
            $stmt->execute();
            
            return $stmt->fetch(\PDO::FETCH_ASSOC);
        } catch (\PDOException $e) {
            throw new Exception($e->getMessage(), 500);
        } catch (\Exception $e) {
            throw new Exception($e->getMessage(), 404);
        } finally {
            $coon = null;
        }
    }
}
