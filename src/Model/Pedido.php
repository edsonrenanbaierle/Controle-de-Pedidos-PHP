<?php

namespace App\Model;

use DateTime;

class Pedido
{
    private ?int $idPedido;
    private DateTime $dataPedido;
    private DateTime $dataEntregaPedido;
    private int $idTipoPagamento;
    private int $idStatus;
    private int $idUsuario;

    public function __construct(
        int $idPedido = null,
        DateTime $dataPedido,
        DateTime $dataEntregaPedido,
        int $idTipoPagamento,
        int $idStatus,
        int $idUsuario
    ) {
        $this->idPedido = $idPedido;
        $this->dataPedido = $dataPedido;
        $this->dataEntregaPedido = $dataEntregaPedido;
        $this->idTipoPagamento = $idTipoPagamento;
        $this->idStatus = $idStatus;
        $this->idUsuario = $idUsuario;
    }

    public function getIdPedido(): ?int
    {
        return $this->idPedido;
    }


    public function setIdPedido(?int $idPedido)
    {
        $this->idPedido = $idPedido;
    }


    public function getDataPedido(): DateTime
    {
        return $this->dataPedido;
    }

    public function setDataPedido(DateTime $dataPedido)
    {
        $this->dataPedido = $dataPedido;
    }


    public function getDataEntregaPedido(): DateTime
    {
        return $this->dataEntregaPedido;
    }

    public function setDataEntregaPedido(DateTime $dataEntregaPedido)
    {
        $this->dataEntregaPedido = $dataEntregaPedido;
    }


    public function getIdTipoPagamento(): int
    {
        return $this->idTipoPagamento;
    }

    public function setIdTipoPagamento(int $idTipoPagamento)
    {
        $this->idTipoPagamento = $idTipoPagamento;
    }

    public function getIdStatus(): int
    {
        return $this->idStatus;
    }

    public function setIdStatus(int $idStatus)
    {
        $this->idStatus = $idStatus;
    }

    public function getIdUsuario(): int
    {
        return $this->idUsuario;
    }

    public function setIdUsuario(int $idUsuario)
    {
        $this->idUsuario = $idUsuario;
    }
}
