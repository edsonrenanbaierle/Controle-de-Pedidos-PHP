<?php

namespace App\DAO;

use App\Db\DbConn;
use App\Model\Item;
use Exception;

class ItemDAO
{

    public function addItem(Item $item, $coon)
    {
        try {

            $quantidade = $item->getQuantidade();
            $idProduto = $item->getIdProduto();
            $idPedido = $item->getIdPedido();

            $sql = "INSERT INTO item (quantidade, idProduto, idPedido)
                VALUES  (:quantidade, :idProduto, :idPedido)";

            $stmt = $coon->prepare($sql);
            $stmt->bindParam(':quantidade', $quantidade);
            $stmt->bindParam(':idProduto', $idProduto);
            $stmt->bindParam(':idPedido', $idPedido);
            $stmt->execute();

            return true;
        } catch (\PDOException $e) {
            if ($e->getCode() == 23000) throw new Exception("Falha no processamento do pedido, produto não encontrado", 404);

            throw new Exception($e->getMessage(), 500);
        } catch (\Exception $e) {
            throw new Exception($e->getMessage(), 404);
        } finally {
            $coon = null;
        }
    }

    public function getItensPedidoComProdutos($idPedido)
    {
        try {
            $coon = DbConn::coon();

            $sql = "SELECT i.quantidade, p.nome AS nome_produto, p.preco AS preco_produto
                FROM item AS i
                INNER JOIN produto AS p ON i.idProduto = p.idProduto
                WHERE i.idPedido = :idPedido";

            $stmt = $coon->prepare($sql);
            $stmt->bindParam(':idPedido', $idPedido);
            $stmt->execute();

            $itens = $stmt->fetchAll(\PDO::FETCH_ASSOC);

            return $itens;
        } catch (\PDOException $e) {
            throw new Exception($e->getMessage(), 500);
        } catch (\Exception $e) {
            throw new Exception($e->getMessage(), 404);
        } finally {
            $coon = null;
        }
    }
}
