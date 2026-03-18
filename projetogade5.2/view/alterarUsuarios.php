<?php 
include_once '../js/cpf.php';
include_once '../js/cep.php';
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
    <title>Sign in & Sign up Form</title>
  </head>
  <body>

          <!-- Login -->

    <div class="container">
      <div class="forms-container">
        <div class="signin-signup">
          <form action="../control/loginControl.php" method="post" class="sign-in-form">
            <h2 class="title">Login</h2>
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="email" name="email" placeholder="E-mail" />
            </div>

            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" name="senha" placeholder="Senha" />
            </div>
      
            <input type="submit" value="Entrar" class="btn solid" />

            <a class="volt" href="../index.php">Voltar</a>
            
          </form>

            <!-- Login -->

            <!-- Cadastrar -->
           
          <form action="../control/usuarioControl.php" method="post" class="sign-up-form">

          <input type="hidden" name="id_Usuario" id="">

            <h2 class="title">Cadastrar</h2>
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="text" name="nome" placeholder="Nome" required />
            </div>
            <div class="input-field">
              <i class="fas fa-cpf"></i>
              <input type="text" name="cpf"  onkeyup="formatarCPF(this)"  placeholder="CPF" maxlength="14" required/>
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="text" name="cep"  onkeyup="formatarCEP(this)" placeholder="CEP" maxlength="10" required />
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="text" name="endereco" placeholder="ENDEREÇO" required />
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="text" name="ncasa" placeholder="Nº Casa" />
            </div>
            <div class="input-field">
              <i class="fas fa-envelope"></i>
              <input type="email" name="email" placeholder="E-mail" required />
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" name="senha" placeholder="Senha" required />
            </div>
            <input type="submit" value="CADASTRAR-SE" class="btn solid" />
            

          </form>
        </div>
      </div>

        <!-- Cadastrar -->

      <div class="panels-container">
        <div class="panel left-panel">
          <div class="content">
            <h3>Novo por aqui ?</h3>
            <p>
            Seja bem vindo! Para uma melhor esperiência, cadastre-se usando
            o botão abaixo.
            </p>
            <button class="btn transparent" id="sign-up-btn">
              Cadastrar-se
            </button>
          </div>
          <img src="../img/CamisaMorder.png" class="image" alt="" />
        </div>
        <div class="panel right-panel">
          <div class="content">
            <h3>Já sou cliente!</h3>
            <p>
              Agora que já é cliente da Gade Camiseteria, aperte o botão abaixo 
              para fazer o login.
            </p>
            <button class="btn transparent" id="sign-in-btn">
              Logar
            </button>
          </div>
          <img src="../img/CamisaMorder.png" class="image" alt="" />
        </div>
      </div>
    </div>

    <script src="../js/app.js"></script>
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