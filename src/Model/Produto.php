<?php 

namespace App\Model;

class Produto{
    private ?int $idProduto;
    private int $estoque;
    private string $nome;
    private int $preco;
    private string $descricao;

    public function __construct(int $idProduto = null,
    int $estoque,
    string $nome,
    int $preco,
    string $descricao)
    {
        $this->idProduto = $idProduto;
        $this->estoque = $estoque;
        $this->nome = $nome;
        $this->preco = $preco;
        $this->descricao = $descricao;
    }

    public function getIdProduto(): ?int
    {
        return $this->idProduto;
    }

    private function setIdProduto(?int $idProduto)
    {
        $this->idProduto = $idProduto;
    }

    public function getEstoque(): int
    {
        return $this->estoque;
    }

    private function setEstoque(int $estoque)
    {
        $this->estoque = $estoque;
    }

    public function getNome(): string
    {
        return $this->nome;
    }

    private function setNome(string $nome)
    {
        $this->nome = $nome;
    }

    public function getPreco(): int
    {
        return $this->preco;
    }

    private function setPreco(int $preco)
    {
        $this->preco = $preco;
    }

    public function getDescricao(): string
    {
        return $this->descricao;
    }

    private function setDescricao(string $descricao)
    {
        $this->descricao = $descricao;
    }
}