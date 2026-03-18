<?php 



require_once '../model/DAO/UsuarioDAO.php';
require_once '../model/DTO/UsuarioDTO.php';
require_once '../js/cep.php';
require_once '../js/cpf.php';


$id_Usuario = $_GET['id_Usuario'];


$usuarioDAO = new UsuarioDAO();

$retorno = $usuarioDAO->buscarUsuarioPorID($id_Usuario);

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
            margin-left: 30%;
        }
    </style>

  </head>
  <body>

          <!-- Login -->

    <div class="container">
      <div class="forms-container">
        <div class="signin-signup">
          <form action="../control/alterarUsuarioControl.php" method="post" class="sign-in-form">

            <h2 class="title">Alterar Usuário</h2>

            <input type="hidden" name="id_Usuario" value="<?php echo $retorno["id_Usuario"]; ?>">

            <div class="input-field">
              <i class="fas fa-user"></i>
              <input class="maiuscula" type="text" name="nome" value="<?php echo $retorno["nome"]; ?>"> 
            </div>
            <div class="input-field">
              <i class="fas fa-cpf"></i>
              <input class="imp" type="text" name="cpf" onkeyup="formatarCPF(this)" maxlength="14" value="<?php echo $retorno["cpf"]; ?>">
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input class="imp" type="text" name="cep" onkeyup="formatarCEP(this)" maxlength="10" value="<?php echo $retorno["cep"]; ?>">
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input class="imp" type="text" name="endereco" value="<?php echo $retorno["endereco"]; ?>">
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input class="imp" type="int" name="ncasa" value="<?php echo $retorno["ncasa"]; ?>">
            </div>
            <div class="input-field">
              <i class="fas fa-envelope"></i>
              <input class="imp" type="email" name="email" value="<?php echo $retorno["email"]; ?>">
            </div>
            
              
              <select class="selet" name="perfil" id="" value="<?php echo $retorno["perfil"]; ?>">
              <option value = "Cliente">Cliente</optiion>
              <option value = "Administrador">Administrador</optiion>
              </select>
            
            <input type="submit" value="Alterar" class="btn solid" />

            <a class="volt" href="listarUsuario.php">Voltar</a>
            
          </form>

           

  </body>
</html>


<!-- CPF -->
<script>
    function formatarCPF(input) {
        // Remove tudo o que não é dígito
        var cpf = input.value.replace(/\D/g, '');

        // Adiciona a formatação no formato XXX.XXX.XXX-XX
        cpf = cpf.replace(/(\d{3})(\d{3})(\d{3})(\d{2})/, '$1.$2.$3-$4');
        input.value = cpf;
    }
</script>

<!-- CEP -->
<script>
    function formatarCEP(input) {
        // Remove todos os caracteres não numéricos
        let cep = input.value.replace(/\D/g, '');

        // Aplica a máscara: XX.XXX-XXX
        if (cep.length > 5) {
            cep = cep.slice(0, 2) + '.' + cep.slice(2, 5) + '-' + cep.slice(5, 8);
        } else if (cep.length > 2) {
            cep = cep.slice(0, 2) + '.' + cep.slice(2);
        }

        // Atualiza o valor do campo de entrada com o CEP formatado
        input.value = cep;
    }
</script>