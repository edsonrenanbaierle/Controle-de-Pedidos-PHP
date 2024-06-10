<?php 

namespace App\Model;

class Item{
    private ?int $idItem;
    private int $quantidade;
    private int $idProduto;
    private int $idPedido;

    public function __construct(int $idItem, int $quantidade, int $idProduto, int $idPedido)
    {
        $this->idItem = $idItem;
        $this->quantidade = $quantidade;
        $this->idProduto = $idProduto;
        $this->idPedido = $idPedido;
    }

    
    public function getIdItem(): ?int
    {
        return $this->idItem;
    }

    private function setIdItem(?int $idItem)
    {
        $this->idItem = $idItem;
    }

    public function getQuantidade(): int
    {
        return $this->quantidade;
    }

    private function setQuantidade(int $quantidade)
    {
        $this->quantidade = $quantidade;
    }

    public function getIdProduto(): int
    {
        return $this->idProduto;
    }

    private function setIdProduto(int $idProduto)
    {
        $this->idProduto = $idProduto;
    }

    public function getIdPedido(): int
    {
        return $this->idPedido;
    }

    private function setIdPedido(int $idPedido)
    {
        $this->idPedido = $idPedido;
    }
}