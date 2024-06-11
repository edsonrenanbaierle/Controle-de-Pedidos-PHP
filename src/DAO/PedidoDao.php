<?php 

namespace App\DAO;

use App\Db\DbConn;
use App\Model\Pedido;
use Exception;
use PDO;

class PedidoDao{

    public function createPedido(Pedido $pedido){
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

    public function getPedidos(){
        try {
            $coon = DbConn::coon();


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