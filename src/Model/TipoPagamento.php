<?php

namespace App\Model;

class TipoPagamento
{
    private ?int $idPagamento;
    private string $nomePagamento;

    public function __construct(int $idPagamento, string $nomePagamento)
    {
        $this->idPagamento = $idPagamento;
        $this->nomePagamento = $nomePagamento;
    }

    public function getIdPagamento(): int
    {
        return $this->idPagamento;
    }

    private function setIdPagamento(int $idPagamento)
    {
        $this->idPagamento = $idPagamento;
    }

    public function getNomePagamento(): string
    {
        return $this->nomePagamento;
    }

    private function setNomePagamento(string $nomePagamento)
    {
        $this->nomePagamento = $nomePagamento;
    }
}
