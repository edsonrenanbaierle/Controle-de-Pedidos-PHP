<?php

namespace App\DAO;

use App\Db\DbConn;
use App\Model\Item;
use Exception;

class ItemDAO
{

    public function addItem(Item $item)
    {
        try {
            $coon = DbConn::coon();

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
            throw new Exception($e->getMessage(), 500);
        } catch (\Exception $e) {
            throw new Exception($e->getMessage(), 404);
        } finally {
            $coon = null;
        }
    }
}
