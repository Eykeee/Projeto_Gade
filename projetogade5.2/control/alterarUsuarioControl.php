<?php

require_once '../model/DTO/usuarioDTO.php';
require_once '../model/DAO/usuarioDAO.php';


$id_Usuario = $_POST['id_Usuario'];
$nome = $_POST['nome'];
$email = $_POST['email'];
$perfil = $_POST['perfil'];
$cpf = $_POST['cpf'];
$cep = $_POST['cep'];
$endereco = $_POST['endereco'];
$ncasa = $_POST['ncasa'];




// var_dump($nome, $idade, $id);

$usuarioDTO = new UsuarioDTO();

$usuarioDTO->setId_Usuario($id_Usuario);
$usuarioDTO->setNome($nome);
$usuarioDTO->setEmail($email);
$usuarioDTO->setPerfil($perfil);
$usuarioDTO->setCpf($cpf);
$usuarioDTO->setCep($cep);
$usuarioDTO->setEndereco($endereco);
$usuarioDTO->setNCasa($ncasa);

// var_dump($usuarioDTO);
$usuarioDAO = new UsuarioDAO();

$sucesso = $usuarioDAO->alterarUsuario($usuarioDTO);

if ($sucesso) {

    echo"
    <script>
    alert(' Alterado com SUCESSO!');
    window.location.href = '../view/listarUsuario.php';
    </script>";

}else {
    echo"
    <script>
    alert(' Falha na alteração!');
    window.location.href = '../view/alterarUsuario.php';
    </script>";
}
