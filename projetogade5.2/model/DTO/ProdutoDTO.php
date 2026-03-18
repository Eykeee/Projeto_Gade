<?php

class ProdutoDTO
{
    private $idProduto;
    private $imagem;
    private $valor;
    private $nome;
    private $tamanho;
    private $descricao;
    private $fornecedor;
    

    public function setIdProduto($idProduto)
    {
        $this->idProduto = $idProduto;
    }
    public function getIdProduto()
    {
        return $this->idProduto;
    }
    ////////////

    public function setNome($nome)
    {
        $this->nome = $nome;
    }
    public function getNome()
    {
        return $this->nome;
    }
    /////////////

    public function setValor($valor)
    {
        $this->valor = $valor;
    }
    public function getValor()
    {
        return $this->valor;
    }
    ///////////////


    public function setImagem($imagem)
    {
        $this->imagem = $imagem;
    }
    public function getImagem()
    {
        return $this->imagem;
    }
    //////////////
    

    public function setDescricao($descricao)
    {
        $this->descricao = $descricao;
    }
    public function getDescricao()
    {
        return $this->descricao;
    }

    //////////////////
    public function setTamanho($tamanho)
    {
        $this->tamanho = $tamanho;
    }
    public function getTamanho()
    {
        return $this->tamanho;
    }
    //////////////

    public function setFornecedor($fornecedor)
    {
        $this->fornecedor = $fornecedor;
    }
    public function getFornecedor()
    {
        return $this->fornecedor;
    }




   
}