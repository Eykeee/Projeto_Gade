<?php
    include_once '../model/DTO/UsuarioDTO.php';
    include_once '../model/DAO/UsuarioDAO.php';

        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $senha = $_POST['senha'];
        $cpf = $_POST['cpf'];
        $cep = $_POST['cep'];
        $endereco = $_POST['endereco'];
        $ncasa = $_POST['ncasa'];

        //  var_dump($nome);

        $usuarioDTO = new UsuarioDTO();

        $usuarioDTO->setNome($nome);
        $usuarioDTO->setEmail($email);
        $usuarioDTO->setSenha($senha);
        $usuarioDTO->setCpf($cpf);
        $usuarioDTO->setCep($cep);
        $usuarioDTO->setEndereco($endereco);
        $usuarioDTO->setNCasa($ncasa);

        // echo "<pre>";
        // var_dump($usuarioDTO);

        $usuarioDAO = new UsuarioDAO();

        $sucesso=$usuarioDAO->salvarUsuario($usuarioDTO);

        if($sucesso){
            echo"
<script>
alert(' Cadastrado com SUCESSO!');
window.location.href = '../view/prompt_comando.php';
</script>


";
        }else{
            
        }
        

        /////////////////////
        

        // echo "<pre>";
        // var_dump($usuarioDTO);
         

?>