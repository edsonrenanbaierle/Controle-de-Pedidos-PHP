<?php

namespace App\Model;

class Status
{
    private ?int $idStatus;
    private string $nomeStatus;

    public function __construct(int $idStatus = null, string $nomeStatus)
    {
        $this->idStatus = $idStatus;
        $this->nomeStatus = $nomeStatus;
    }


    public function getIdStatus(): ?int
    {
        return $this->idStatus;
    }

    private function setIdStatus(?int $idStatus)
    {
        $this->idStatus = $idStatus;
    }

    public function getNomeStatus(): string
    {
        return $this->nomeStatus;
    }

    private function setNomeStatus(string $nomeStatus)
    {
        $this->nomeStatus = $nomeStatus;
    }
}
