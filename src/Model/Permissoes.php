<?php 

namespace App\Model;

class Permissoes{
    private ?int $idPermissao;
    private string $nome;

    public function __construct(int $idPermissao = null, string $nome)
    {
        $this->idPermissao = $idPermissao;
        $this->nome = $nome;
    }

    public function getIdPermissao()
    {
        return $this->idPermissao;
    }

    public function setIdPermissao($idPermissao)
    {
        $this->idPermissao = $idPermissao;
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function setNome($nome)
    {
        $this->nome = $nome;
    }
}