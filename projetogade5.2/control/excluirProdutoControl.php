<?php
    include_once '../model/DTO/ProdutoDTO.php';
    include_once '../model/DAO/ProdutoDAO.php';

      $idProduto = $_GET['idProduto'];

      // var_dump($codigoProduto);


      $produtoDAO = new ProdutoDAO();

      $sucesso = $produtoDAO->excluirProduto($idProduto);

      if($sucesso){
        header('Location:../view/listarProdutos.php');
      }







?>