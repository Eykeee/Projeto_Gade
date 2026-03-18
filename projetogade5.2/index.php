<?php

    session_start();
    require_once 'model/DTO/ProdutoDTO.php';
    require_once 'model/DAO/ProdutoDAO.php';

    $produtos = new ProdutoDAO();
    $res = $produtos->listarProduto();

?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/still.css">
    <link rel="stylesheet" href="css/boot.css">
    <link rel="stylesheet" href="css/styllys.css">


    <title>Gade</title>
</head>
<body>

    <section>
            
        <div class="circle"></div>

        <header>

            <a href="#"><img src="img/logogade.png" alt="logo" class="logo"></a>

            <nav class="navegation">
                <ul>
                    <li>
                    <div class="search-box">
                    
            </div>
                    <li><a href="view/login.php">Login</a></li>
                    <!-- <li><a href="#">Contato</a></li> -->
  
                </ul>
            </nav>
        </header>

  

        
        
        <div class="container">
            <div class="text">                
                <div class="spacer">
                    <h2> FIQUE MAIS ESTILOSO <br> <span>E BONITO</span> </h2>
                </div>

            <p>
            A Gade é uma empresa que atua no mercado desde 2015 no ramo de serigrafia e sublimação.
            Tendo em vista que a tecnologia tem avançado e todos estão inseridos nessa era digital,
            isso foi uma forma de expandir os negócios.
            </p>

                <a href="view/saibaMais.php">Saiba Mais</a>
        </div>
        </div>

        <div class="boxing">
            <img src="img/CamisaMorder.png" alt="" cllas="img1">
        </div>

    </section>


    <!-- PRODUTOS -->

<section class="scor">

<div class="gallery">

    <!-- <div class="content">
        <img src="../img/moletonlufy-removebg-preview.png">
        <h3>Moletom Lufy</h3>
        <p>Belo moletom, feito para você!</p>
        <h6>R$120,00</h6>
        <a href="#"><button class="Buy-1">Add Carrinho</button></a>
    </div> -->

    <?php
        foreach ($res as $prod) {
    ?>
        
        <div class="content">
                <img  src="<?php echo "Img/" . $prod['imagem']; ?>">
                <h3><?php echo $prod['nome']; ?></h3>
                <p><?php echo $prod['descricao']; ?></p>
                <h6>R$<?php echo $prod['valor']; ?></h6>

                <a href="view/login.php" class="Buy-1">Comprar</a>
         </div>
    <?php } ?>
</div>
</section>


<!-- FIM PRODUTOS -->

    <!-- Final -->

    

    <!-- Final -->

   
    <footer class="fot">
            <p>&copy; Gade - TODOS DIREITOS RESERVADOS</p>
        </footer>
    
</body>
</html>