<?php  

    include_once '../control/listarProdutosControl.php';
    

    // var_dump($todos);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/stilitabela.css">
    <link rel="stylesheet" href="../css/style21.css">

    <script src="../css/SweetAlert2/sweetalert2.all.min.js"></script><!--local-->
    <script>
        function confirmarExclusao(idProduto) {
            Swal.fire({
                title: 'Você tem certeza?',
                text: "Essa ação não pode ser desfeita! Excluir Registro nº " + idProduto + "?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Sim, excluir!',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {

                    window.location.href = '../control/excluirProdutoControl.php?idProduto=' + idProduto;
                }
            });

        }


        //function alterar usuario
        function alterarProduto(idProduto) {
            Swal.fire({
                title: 'Editar dados?',
                text: "Essa ação podera alterar os dados do Registro nº " + idProduto + "?",
                icon: 'success',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Sim, alterar!',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {

                    // Redireciona para a página de exclusão

                    window.location.href = ' alterarProduto.php?idProduto=' + idProduto;
                }
            });
        }
    </script>

    <title>Listar Produto</title>
</head>
<body>
    
    <section>
     <!-- <header class="header">
        <a href="./prompt_comando.php"><img src="../img/logogade.png" alt="logo" class="logo"></a>
        <a href="prompt_comando.php" class="bt"><button>Voltar</button></a>
         
     </header> -->

     <header class="main_header">
                    <div class="main_header_content">
                              <a href="#" class="logo">
                                        <img src="../img/logogade.png"/></a>

                              <nav class="main_header_content_menu">
                                        <ul>

                                                  <li><a href="prompt_comando.php">Voltar</a></li>
                                        </ul>
                              </nav>
                    </div>
          </header>


     <h1>Lista de Produtos</h1>

    </section>

        <section class="list_container">
    <table class="tab">
        <tr>
            <th>idProduto</th>
            <th>Nome</th>
            <th>Preço</th>
            <th>Descrição</th>
            <th>Fornecedor</th>
            <th>Tamanho</th>
            <th>Imagem</th>
            <th colspan= "2">Operações</th>
        </tr>

        </div>

        <tr>
            <td>&nbsp;</td>
        </tr>


        <!-- vamos colocar as linhas dentro do foreach -->
       
        <?php foreach($todos as $t){?>
            <tr>
                <td><?php echo $t['idProduto'];?></td>
                <td><?php echo $t['nome'];?></td>
                <td><?php echo $t['valor'];?></td>
                <td><?php echo $t['descricao'];?></td>
                <td><?php echo $t['fornecedor'];?></td>
                <td><?php echo $t['tamanho'];?></td>
                <td><?php echo $t['imagem'];?></td>
                
                <td>

                <button class="btn-sm-btn-danger" id="" type="button" onclick="confirmarExclusao(<?php echo $t['idProduto']; ?>)">Excluir</button>
                     <!-- <a class="btn" href="../control/excluirProdutoControl.php?idProduto=<?php echo $t['idProduto'];?>"> <button> Excluir</a> -->
                </td>
                <td>
                <button class="btn-sm-btn-danger" id="" type="button" onclick="alterarProduto(<?php echo $t['idProduto']; ?>)">Alterar</button>
                    <!-- <a class="btn" href="alterarProduto.php?idProduto=<?php echo $t['idProduto'];?>">
                        <button>Alterar</a> -->
                </td>
               
            </tr>

        <?php } ?>
       
        
    </table>
        </section>



</body>
</html>