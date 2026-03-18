<?php
session_start();
require_once '../model/DTO/ProdutoDTO.php';
require_once '../model/DAO/ProdutoDAO.php';

$idUsuLogin = ""; // Variável em branco, sem login
if (isset($_SESSION["id_Usuario"])) {
    $idUsuLogin = $_SESSION["id_Usuario"]; // login definido
    $nomeUsuLogin = $_SESSION["nome"];
    $perfilUsuLogin = $_SESSION["perfil"];
}

// Verifica se a sessão de carrinho está vazia
if (!isset($_SESSION['carrinho']) || empty($_SESSION['carrinho'])) {
    header("Location: carrinho.php"); // Redireciona para o carrinho caso a compra não tenha sido realizada
    exit;
}

// Função para calcular o total com desconto
$total = 0;
foreach ($_SESSION['carrinho'] as $id => $item) {
    $produtoDAO = new ProdutoDAO();
    $produto = $produtoDAO->pesquisarProdutoPorId($id);
    if ($produto) {
        $preco = $produto['valor'];
        $quantidade = $item['quantidade'];
        $subtotal = $preco * $quantidade;
        $total += $subtotal;
    }
}

// Função para finalizar a compra (simulação)
if (isset($_POST['finalizar_compra'])) {
    // Simula a finalização da compra
    $_SESSION['carrinho'] = array(); // Limpa o carrinho após a compra
    echo "<script>
            alert('Compra finalizada com sucesso!');
            alert('Aguarde o envio da mercadoria!');
            window.location.href='carrinho.php'; // Redireciona para o carrinho (agora vazio)
          </script>";
    exit;
}

// Calcula o desconto de 10%
$desconto = $total * 0.10;
$valorComDesconto = $total - $desconto;

// Gerar o QR Code (usando uma API externa ou uma biblioteca como PHP QR Code)
$fornecedor = "Fornecedor Exemplo";  // Defina o nome do fornecedor aqui
$valorTotal = number_format($valorComDesconto, 2, ',', '.');

// Gerando o QR Code (simulação de uma URL de pagamento)
$qrCodeUrl = "https://api.qrserver.com/v1/create-qr-code/?data=Pagamento+de+" . urlencode($valorComDesconto) . "+para+" . urlencode($fornecedor) . "&size=150x150";
?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmação de Compra</title>
    <link rel="stylesheet" href="../Css/bootstrap-5.3.3-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/pagamento.css">
</head>

<body>
<h1>Pagamento!</h1>
    <div class="container">
        
        
        <img src="https://api.qrserver.com/v1/create-qr-code/?data=Pagamento+de+" alt="QR Code para pagamento" class="img">
        
        

        <br>
        <table  class="pagamento">
        
            <td style="font-size: 25px;">
                <p><span class="font">Valor Total: R$ <?php echo number_format($valorComDesconto + $desconto, 2, ',', '.'); ?> </span></p>
                <!-- <p><strong class="font">Desconto de 10%: </strong>R$ <?php echo number_format($desconto, 2, ',', '.'); ?></p> -->
                <!-- <p><strong class="font">Valor Total (com desconto de 10%): </strong>R$ <?php echo  number_format($valorComDesconto, 2, ',', '.'); ?></p> -->
            </td>
        </table><br>
        

        <form action="" method="POST">

            <a href="Produtos.php" class="b">Continue Comprando!</a>
            <button type="submit" name="finalizar_compra" class="btn">Finalizar Compra</button>
            <!-- <button type="button" id="noprint" onclick="window.print()" class="btn ">Imprimir</button> -->

        </form>

    </div>

</body>

</html>