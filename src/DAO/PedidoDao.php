<?php

namespace App\DAO;

use App\Db\DbConn;
use App\Model\Pedido;
use Exception;
use PDO;

class PedidoDao
{

    public function createPedido(Pedido $pedido)
    {
        try {
            $coon = DbConn::coon();

            $dataPedido = $pedido->getDataPedido();
            $dataEntregaPedido = $pedido->getDataEntregaPedido();
            $idTipoPagamento = $pedido->getIdTipoPagamento();
            $idStatus = $pedido->getIdStatus();
            $idUsuario = $pedido->getIdUsuario();

            // print_r($idUsuario);
            // print_r($idStatus);
            // print_r($idTipoPagamento);
            // exit;

            $dataPedido = $dataPedido->format("Y-m-d H:i:s");
            $dataEntregaPedido = $dataEntregaPedido->format("Y-m-d H:i:s");

            $sql = "INSERT INTO pedido (dataPedido, dataEntregaPedido, idTipoPagamento, idStatus, idUsuario)
                    values (:dataPedido, :dataEntregaPedido, :idTipoPagamento, :idStatus, :idUsuario)";

            $stmt = $coon->prepare($sql);
            $stmt->bindParam(':dataPedido', $dataPedido);
            $stmt->bindParam(':dataEntregaPedido', $dataEntregaPedido);
            $stmt->bindParam(':idTipoPagamento', $idTipoPagamento, PDO::PARAM_INT);
            $stmt->bindParam(':idStatus', $idStatus, PDO::PARAM_INT);
            $stmt->bindParam(':idUsuario', $idUsuario, PDO::PARAM_INT);
            $stmt->execute();

            return $coon->lastInsertId();
        } catch (\PDOException $e) {
            throw new Exception($e->getMessage(), 500);
        } catch (\Exception $e) {
            throw new Exception($e->getMessage(), 404);
        } finally {
            $coon = null;
        }
    }

    public function getAllPedidos($idUsuario)
    {
        try {
            $coon = DbConn::coon();

            $sql = "SELECT p.idPedido, p.dataPedido, p.dataEntregaPedido , tp.nomePagamento as tipoDePagamento, u.email, st.nomeStatus as status
                    FROM pedido AS p
                    INNER JOIN tipoPagamento AS tp ON p.idTipoPagamento = tp.idPagamento
                    INNER JOIN usuario AS u ON p.idUsuario = u.idUsuario
                    INNER JOIN status AS st ON p.idStatus = st.idStatus
                    WHERE p.idUsuario = :idUsuario
                    AND st.nomeStatus != 'inativo'
                    AND st.nomeStatus != 'cancelados'";

            $stmt = $coon->prepare($sql);
            $stmt->bindParam(':idUsuario', $idUsuario);
            $stmt->execute();

            $pedidos = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $pedidos;
        } catch (\PDOException $e) {
            throw new Exception($e->getMessage(), 500);
        } catch (\Exception $e) {
            throw new Exception($e->getMessage(), 404);
        } finally {
            $coon = null;
        }
    }

    public function getPedido($idUsuario, $idPedido)
    {
        try {
            $coon = DbConn::coon();

            $sql = "SELECT p.idPedido, p.dataPedido, p.dataEntregaPedido , tp.nomePagamento as tipoDePagamento, u.email, st.nomeStatus as status
                    FROM pedido AS p
                    INNER JOIN tipoPagamento AS tp ON p.idTipoPagamento = tp.idPagamento
                    INNER JOIN usuario AS u ON p.idUsuario = u.idUsuario
                    INNER JOIN status AS st ON p.idStatus = st.idStatus
                    WHERE p.idUsuario = :idUsuario
                    AND st.nomeStatus != 'inativo'
                    AND st.nomeStatus != 'cancelados'
                    AND p.idPedido = :idPedido";

            $stmt = $coon->prepare($sql);
            $stmt->bindParam(':idUsuario', $idUsuario);
            $stmt->bindParam(':idPedido', $idPedido);
            $stmt->execute();

            if($stmt->rowCount() == 0) throw new Exception("Pedido não encontrado", 404);
            

            $pedidos = $stmt->fetch(PDO::FETCH_ASSOC);

            return $pedidos;
        } catch (\PDOException $e) {
            throw new Exception($e->getMessage(), 500);
        } catch (\Exception $e) {
            throw new Exception($e->getMessage(), 404);
        } finally {
            $coon = null;
        }
    }


    public function deletePedido($idPedido)
    {
        try {
            $coon = DbConn::coon();

            $idStatus = 5;

            $sql = "UPDATE FROM pedido SET idStatus = :idStatus
                    where idPedido = :idPedido";

            $stmt = $coon->prepare($sql);
            $stmt->bindParam(':idStatus', $idStatus);
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
