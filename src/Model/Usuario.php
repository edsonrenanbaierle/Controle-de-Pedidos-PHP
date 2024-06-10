<?php

namespace App\Model;

class Usuario
{
    private ?int $idUsuario;
    private string $email;
    private string $senha;
    private string $endereco;
    private string $cep;

    public function __construct(int $idUsuario = null, string $email, string $senha, string $endereco, string $cep)
    {
        $this->idUsuario = $idUsuario;
        $this->email = $email;
        $this->senha = $senha;
        $this->endereco = $endereco;
        $this->cep = $cep;
    }

    public function getIdUsuario(): int
    {
        return $this->idUsuario;
    }

    private function setIdUsuario(int $idUsuario)
    {
        $this->idUsuario = $idUsuario;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    private function setEmail(string $email)
    {
        $this->email = $email;
    }

    public function getSenha(): string
    {
        return $this->senha;
    }

    private function setSenha(string $senha)
    {
        $this->senha = $senha;
    }

    public function getEndereco(): string
    {
        return $this->endereco;
    }


    private function setEndereco(string $endereco)
    {
        $this->endereco = $endereco;
    }

    public function getCep(): string
    {
        return $this->cep;
    }

    private function setCep(string $cep)
    {
        $this->cep = $cep;
    }
}
