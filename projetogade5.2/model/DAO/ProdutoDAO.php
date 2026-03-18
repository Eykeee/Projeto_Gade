<?php

require_once 'Conexao.php';
// require_once '../model/DTO/ProduroDTO.php';

class ProdutoDAO
{

    public $pdo = null;
    public function __construct()
    {
        $this->pdo = Conexao::getInstance();
    }

    // INSERT
    public function salvarProduto(ProdutoDTO $produtoDTO)
    {
        try {
            $sql = "INSERT INTO gade.produto (nome,valor,imagem,descricao,tamanho,fornecedor) 
            VALUES (?, ?, ?, ?, ?,?)";
            $stmt = $this->pdo->prepare($sql);

            $nome = $produtoDTO->getNome();
            $valor = $produtoDTO->getValor();
            $imagem = $produtoDTO->getImagem();
            $descricao = $produtoDTO->getDescricao();
            $tamanho = $produtoDTO->getTamanho();
            $fornecedor = $produtoDTO->getFornecedor();
      


            $stmt->bindValue(1, $nome);
            $stmt->bindValue(2, $valor);
            $stmt->bindValue(3, $imagem);
            $stmt->bindValue(4, $descricao);
            $stmt->bindValue(5, $tamanho);
            $stmt->bindValue(6, $fornecedor);

            $retorno = $stmt->execute(); 
            return $retorno;

            
        } catch(PDOException $exe){
            echo $exe->getMessage();
        }
    }


    public function listarProduto()
    {
        try {
            //campo pesquisar do listar produtos

                $sql = "SELECT * FROM produto";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();
            $retorno = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $retorno;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }


    } //fim do campo pesquisar produtos






    //excluir produtos
    public function excluirProduto($idProduto)
    {
        try {
            $sql = "DELETE FROM produto WHERE idProduto = ?";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(1, $idProduto);
            $retorno = $stmt->execute();
            return $retorno;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }

        // header('location: ../view/listarProdutos.php'); //retornar a pagina /view/listarProdutos.php
    }

    public function alterarProduto(ProdutoDTO $produtoDTO)
    {
        try {



            $idProduto = $produtoDTO->getIdProduto();
            $nome = $produtoDTO->getNome();
            $valor = $produtoDTO->getValor();
            $fornecedor = $produtoDTO->getFornecedor();
            $imagem = $produtoDTO->getImagem();
            $descricao = $produtoDTO->getDescricao();
            $tamanho = $produtoDTO->getTamanho();
            




            $sql = "UPDATE produto SET
             nome = '{$nome}',
             valor = '{$valor}',
             fornecedor = '{$fornecedor}', 
             tamanho = '{$tamanho}',
             imagem = '{$imagem}', 
             descricao = '{$descricao}' 
            WHERE idProduto = '{$idProduto}'";
            $stmt = $this->pdo->prepare($sql);


            $retorno = $stmt->execute();
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
        //
         header('location: ../view/listarprodutos.php'); //retornar a pagina /view/listarProdutos.php
    }

    //PesquisarProdutoPorId
    public function pesquisarProdutoPorId($idProduto)
    {
        try {
            $sql = "SELECT * FROM produto WHERE idProduto = ?";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(1, $idProduto);
            $stmt->execute();
            $retorno = $stmt->fetch(PDO::FETCH_ASSOC);
            return $retorno;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

    //////

}