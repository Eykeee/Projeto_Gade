<?php
require_once'../model/DAO/ProdutoDAO.php';
require_once'../model/DTO/ProdutoDTO.php';



$nome = strip_tags($_POST["nome"]);
$tamanho = strip_tags($_POST["tamanho"]);
$valor = ($_POST["valor"]);
$fornecedor = strip_tags($_POST["fornecedor"]);
$imagem = strip_tags($_POST["imagem"]);
$descricao = strip_tags($_POST["descricao"]);






$produtoDTO = new ProdutoDTO();

$produtoDTO->setNome($nome);
$produtoDTO->setValor($valor);
$produtoDTO->setTamanho($tamanho);
$produtoDTO->setFornecedor($fornecedor);
$produtoDTO->setImagem($imagem);
$produtoDTO->setDescricao($descricao);




$produtoDAO = new ProdutoDAO();

$sucesso = $produtoDAO->salvarProduto($produtoDTO);


/////////
if ($sucesso) {
    echo"
    <script>
    alert(' Cadastrado com SUCESSO!');
    window.location.href = '../view/prompt_comando.php';
    </script>;";

} else {
    $msg = "Aconteceu um problema no cadastramento";
}


// exit;