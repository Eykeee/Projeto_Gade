<?php
session_start();
require_once '../model/DTO/ProdutoDTO.php';
require_once '../model/DAO/ProdutoDAO.php';


$idUsuLogin = ""; //variavel em branco, sem login
if (isset($_SESSION["idUsu"])) {
    $idUsuLogin = $_SESSION["idUsu"]; //login definido
    $nomeUsuLogin = $_SESSION["nomeUsu"];
    $perfilUsuLogin = $_SESSION["perfilUsu"];
}


$produtos = new ProdutoDAO(); // Cria uma instância do ProdutoDAO

// Função para remover produto do carrinho
if (isset($_GET['remover'])) {
    $idProduto = $_GET['remover'];
    unset($_SESSION['carrinho'][$idProduto]); // Remove o item do carrinho
}

// Função para atualizar a quantidade do produto no carrinho
if (isset($_POST['atualizar_quantidade'])) {
    $idProduto = $_POST['idProduto'];
    $novaQuantidade = $_POST['quantidade'];
    if ($novaQuantidade > 0) {
        $_SESSION['carrinho'][$idProduto]['quantidade'] = $novaQuantidade; // Atualiza a quantidade
    }
}




?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Css/bootstrap-5.3.3-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/carrinho.css">
    <title>Carrinho de Compras</title>

    <script type="text/javascript">
        // Função para confirmar a remoção de um item
        function confirmarRemocao(idProduto) {
            var confirmar = confirm("Você tem certeza que deseja remover este item do carrinho?");
            if (confirmar) {
                window.location.href = "?remover=" + idProduto; // Se confirmado, remove o item
            }
        }
    </script>


</head>

<body>
    

        <!-- <h1 class="titulo">Seja bem vindo: <?php echo " {$_SESSION['nome']}" ?></h1><br><br> -->



        <section >

        <header class="main_header">
                    <div class="main_header_content">
                              <a href="#" class="logo">
                                        <img src="../img/logogade.png"/></a>

                              <nav class="main_header_content_menu">
                                        <ul>


                                                  <li><a href="Produtos.php">Voltar</a></li>
                                        </ul>
                              </nav>
                    </div>
          </header>

          <h1 class="h1">CARRINHO DE COMPRAS</h1>
            <!-- <h1>Carrinho de Compras</h1> -->

            <div class="container">
            <!-- carrinho vazio -->
            <?php if (!isset($_SESSION['carrinho']) || empty($_SESSION['carrinho'])) { ?>
                <p align="center">O carrinho está vazio.

                <br><br>    <a href="../view/Produtos.php" id="botao_direita" class="btn ">Voltar</a>
                </p>
            <?php } else { ?>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Produto</th>
                            <th scope="col">Valor Unitário</th>
                            <th scope="col">Quantidade</th>
                            <th scope="col">Preço</th>
                            <th scope="col">Ação</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $total = 0;
                        foreach ($_SESSION['carrinho'] as $id => $item) {
                            // Busca o produto no banco usando o método pesquisarProdutoPorId
                            $produto = $produtos->pesquisarProdutoPorId($id); // Método que busca o produto pelo ID
                            if ($produto) {
                                $preco = $produto['valor'];
                                $quantidade = $item['quantidade'];
                                $subtotal = $preco * $quantidade;
                                $total += $subtotal;
                        ?>
                                <tr>
                                    <td><?php echo $produto['nome']; ?></td>
                                    <td>R$<?php echo number_format($produto['valor'], 2, ',', '.'); ?></td>
                                    <td>
                                        <!-- Formulário para atualizar a quantidade -->
                                        <form action="" method="POST" style="display: inline;">
                                            <input type="number" name="quantidade" value="<?php echo $quantidade; ?>" min="1" required>
                                            <input type="hidden" name="idProduto" value="<?php echo $id; ?>">
                                            <button type="submit" name="atualizar_quantidade" class="bb" id="noprint">Atualizar</button>
                                        </form>
                                    </td>
                                    <td align="right" width="65px">R$<?php echo number_format($subtotal, 2, ',', '.'); ?></td>
                                    <td id="noprint">
                                        <a href="javascript:void(0);" class="b" onclick="confirmarRemocao(<?php echo $id;?>)" id="noprint">Remover</a>
                                    </td>
                                </tr>
                        <?php
                            }
                        }
                        ?>
                       
                    </tbody>
                </table>
                
                <div class="esp">
                        <tr class="t">
                            <td colspan="2">
                                <strong>Total: </strong><strong>R$ <?php echo number_format($total, 2, ',', '.'); ?></strong>
                            </td>
                        </tr>

                </div>

                <!-- Botão efetuar pagamento -->
                <form action="" method="POST">

                    <a href="confirmacao_compra.php">
                        <button type="button" id="noprint" class="btn btn-primary ">Efetuar Pagamento</button>

                    </a>
                    <!-- <a href="../view/Produtos.php" id="noprint" class="btn btn-primary ">Voltar</a> -->
                    <!-- <button type="button" id="noprint" onclick="window.print()" class="btn btn-primary ">Imprimir</button> -->
                </form>
            <?php } ?>
        </section>
    </div>

    

</body>

</html>