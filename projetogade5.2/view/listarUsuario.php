<?php

include_once '../control/listarUsuarioControl.php';

// var_dump($todos);

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/stilitabela.css">
    <link rel="stylesheet" href="../css/style21.css">

    <script src="../css/SweetAlert2/sweetalert2.all.min.js"></script><!--local-->


    <style>
        .maiuscula {
            text-transform: capitalize;
        }

        .btn {
            width: 100px;
            height: 30;
            background-color: white;
            color: black;
            cursor: pointer;
            transition: 0.5s;
            border-radius: 5px;
            border: none;
            color: #fff;
            padding: 5px;

        }

        #btn {

            background-color: red;

        }
    </style>

    <script>
        function confirmarExclusao(id_Usuario) {
            Swal.fire({
                title: 'Você tem certeza?',
                text: "Essa ação não pode ser desfeita! Excluir Registro nº " + id_Usuario + "?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Sim, excluir!',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {

                    window.location.href = '../control/excluirUsuarioControl.php?id_Usuario=' + id_Usuario;
                }
            });

        }


        //function alterar usuario
        function alterarUsuario(id_Usuario) {
            Swal.fire({
                title: 'Editar dados?',
                text: "Essa ação podera alterar os dados do Registro nº " + id_Usuario + "?",
                icon: 'success',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Sim, alterar!',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {

                    // Redireciona para a página de exclusão

                    window.location.href = ' alterarUsuario.php?id_Usuario=' + id_Usuario;
                }
            });
        }
    </script>

    <title>Listar Dados</title>
</head>

<body>

    <section>
        <header>
            <!-- <a id="btn" href="./prompt_comando.php"><img src="../img/logogade.png" alt="logo" class="logo" title="Voltar Painel Administrador"></a>
            <h1>Lista de Usuários</h1>
            <a href="../view/prompt_comando.php"><button class="btn" type="button">Voltar</button></a> -->

            <!-- <a href="../view/logOff.php"><button class="btn" type="button">Sair</button></a> -->

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
        </header>
    </section>

    <h1>Listar Usuários</h1>

    <section class="list_container">
        <table class="tab">
            <tr>
                <th>Id</th>
                <th>Nome</th>
                <th>Email</th>
                <th>Perfil</th>
                <th>CPF</th>
                <th>CEP</th>
                <th colspan="2">Operações</th>
            </tr>

            </div>

            <tr>
            <td>&nbsp;</td>
        </tr>


            <!-- vamos colocar as linhas dentro do foreach -->

            <?php foreach ($todos as $t) { ?>
                <tr>
                    <td><?php echo $t['id_Usuario']; ?></td>
                    <td class="maiuscula"><?php echo  $t['nome']; ?></td>
                    <td><?php echo $t['email']; ?></td>
                    <td class="maiuscula"><?php echo $t['perfil']; ?></td>
                    <td><?php echo $t['cpf']; ?></td>
                    <td><?php echo $t['cep']; ?></td>

                    <td>

                
                        <button class="btn btn-sm btn-danger" id="btn" type="button" onclick="confirmarExclusao(<?php echo $t['id_Usuario']; ?>)">Excluir</button>




                    </td>
                    <td>

                        <button class="btn btn-sm btn-success" id="btn" type="button" onclick="alterarUsuario(<?php echo $t['id_Usuario']; ?>)">Alterar</button>


                    </td>

                </tr>

            <?php } ?>


        </table>
    </section>



</body>

</html>