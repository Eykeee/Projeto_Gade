<?php


    require_once '../model/DAO/ProdutoDAO.php';
    require_once '../model/DTO/ProdutoDTO.php';
    require_once '../control/listarProdutosControl.php';

    $idProduto = $_GET['idProduto'];
    // var_dump($id_usuario);

    $produtoDAO = new ProdutoDAO();

    $retorno = $produtoDAO->pesquisarProdutoPorId($idProduto);

    // var_dump($retorno);
?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script
      src="https://kit.fontawesome.com/64d58efce2.js"
      crossorigin="anonymous"
    ></script>
    <link rel="stylesheet" href="../css/style.css" />
    <title>Alterar dados</title>

    <style>
        .maiuscula {
            text-transform: capitalize;
            padding: 5px;
            margin: 5px;
            border-radius: 5px;
            border: none;
            width: 200px;
            font-size: 1em;
            
        }
    </style>


</head>
<body>



    <div class="container">
    <div class="forms-container">
    <div class="signin-signup">
    <form name="alterarProduto" id="alterarPro" action="../control/alterarProdutoControl.php" method="post">

    <h2 class="title">Alterar produto</h2>

    <input type="hidden" name="idProduto" value="<?php echo $retorno["idProduto"];?>">

    
        <div class="input-field">
        <i class="fas fa-user"></i>
        <input class="maiuscula" type="text" name="nome" value="<?php echo $retorno["nome"]; ?>">
        </div>

        <div class="input-field">
        <i class="fas fa-user"></i>
        <input class="imp" type="text" name="valor" value="<?php echo $retorno["valor"];?>"> 
        </div>

        <div class="input-field">
        <i class="fas fa-user"></i>
        <input class="imp" type="text" name="descricao" value="<?php echo $retorno["descricao"];?>">
        </div>

        <div class="input-field">
        <i class="fas fa-user"></i>
        <input class="imp" type="text" name="fornecedor" value="<?php echo $retorno["fornecedor"];?>">
        </div>

        <div class="input-field">
        <i class="fas fa-user"></i>
        <input class="imp" type="text" name="tamanho" value="<?php echo $retorno["tamanho"];?>">
        </div>

        
        
        <input class="imp2" type="file" name="imagem" value="<?php echo $retorno["imagem"];?>">
        

        <input class="btn solid" type="submit" value="Alterar">

        <a class="volt" href="listarProdutos.php">Voltar</a>

        </div>


    </form>
</body>
</html>