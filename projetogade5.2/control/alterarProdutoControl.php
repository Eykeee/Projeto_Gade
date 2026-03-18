<?php  

     require_once '../model/DTO/ProdutoDTO.php';
     require_once '../model/DAO/ProdutoDAO.php';

    $nome = $_POST['nome'];
    $valor = $_POST['valor'];
    $descricao = $_POST['descricao'];
    $imagem = $_POST['imagem'];
    $fornecedor = $_POST['fornecedor'];
    $tamanho = $_POST['tamanho'];
    $idProduto = $_POST['idProduto'];

    // var_dump($nome, $idade, $id);

    $produtoDTO = new ProdutoDTO();

    $produtoDTO->setNome($nome);
    $produtoDTO->setValor($valor);
    $produtoDTO->setDescricao($descricao);
    $produtoDTO->setImagem($imagem);
    $produtoDTO->setFornecedor($fornecedor);
    $produtoDTO->setTamanho($tamanho);
    $produtoDTO->setIdProduto($idProduto);
    
    // var_dump($usuarioDTO);
    $produtoDAO = new ProdutoDAO();

    $sucesso = $produtoDAO->alterarProduto($produtoDTO);

    if($sucesso){
        // header('Location:../view/listarprodutos.php');

        echo"
<script>
alert(' Cadastrado com SUCESSO!');
window.location.href = '../view/listarProdutos.php';
</script>


";
    }

?>