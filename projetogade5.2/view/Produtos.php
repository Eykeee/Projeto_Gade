<?php
session_start();
require_once '../model/DTO/ProdutoDTO.php';
require_once '../model/DAO/ProdutoDAO.php';


$produtos = new ProdutoDAO();
$res = $produtos->listarProduto(); // Chama o método para listar produtos

// Função para adicionar produto ao carrinho
if (isset($_POST['adicionar_ao_carrinho'])) {
    $idProduto = $_POST['idProduto'];
    $quantidade = $_POST['quantidade'];
    
    
    // Se o carrinho ainda não existe, inicializa ele
    if (!isset($_SESSION['carrinho'])) {
        $_SESSION['carrinho'] = array();
    }

    // Verifica se o produto já existe no carrinho
    if (isset($_SESSION['carrinho'][$idProduto])) {
        $_SESSION['carrinho'][$idProduto]['quantidade'] += $quantidade;  // Atualiza a quantidade
    } else {
        // Adiciona novo item ao carrinho
        $_SESSION['carrinho'][$idProduto] = array(
            'id' => $idProduto,
            'quantidade' => $quantidade
        );
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../css/boot.css">
    <link rel="stylesheet" href="../css/produtos.css">
    <!-- <link rel="stylesheet" href="../css/style21.css"> -->

    <title>Produtos</title>
</head>

<body>
    <!-- Cabeçalho -->
    <section>

    <header class="main_header">
                    <div class="main_header_content">
                              <a href="#" class="logo">
                                        <img src="../img/logogade.png"/></a>

                              <nav class="main_header_content_menu">
                                        <ul>

                                        <li>
                                        <a href="carrinho.php" id="botao_direita">Carrinho (<span id="qtd_carrinho"><?php echo isset($_SESSION['carrinho']) ?
                                         count($_SESSION['carrinho']) : 0; ?></span>)</a>
                                        </li>

                                                  <li><a href="index2.php">Voltar</a></li>
                                        </ul>
                              </nav>
                    </div>
          </header>

    

        
            

        <!-- Lista de produtos -->
        <section class="scor" id="promoçoes">
          <div class="gallery">
            <?php foreach ($res as $prod) { ?>
                <div class="content">
                        <img src="<?php echo "../Img/" . $prod['imagem']; ?>">
                        
                   
                    
                    
                        <h3><?php echo $prod['nome']; ?></h3>
                        <h6>R$<?php echo $prod['valor']; ?></h6>

                        <!-- Formulário para adicionar produto ao carrinho -->
                        <form action="" method="POST">
                            <input type="hidden" name="idProduto" value="<?php echo $prod['idProduto']; ?>">
                            <input type="number" name="quantidade" min="1" value="1" class="form-control"
                             style="width: 80px; display: inline-block; border-radius: 5px; text-align: center;">
                           
                            <button class="Buy-1" type="submit" name="adicionar_ao_carrinho" >ADICIONAR</button>
                        </form>
                    
                </div>
            <?php } ?>

            </div>
        </section>
    </section>

</body>
</html>
