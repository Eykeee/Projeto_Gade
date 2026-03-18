<?php  
 
    include_once '../model/DAO/ProdutoDAO.php';
    include_once '../model/DTO/ProdutoDTO.php';

    $produtoDAO = new ProdutoDAO();
    
    $todos = $produtoDAO->listarProduto();

    // echo '<pre>';
    // var_dump($todos);








?>