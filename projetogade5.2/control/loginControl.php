<?php

    include_once '../model/DTO/UsuarioDTO.php';
    include_once '../model/DAO/UsuarioDAO.php';

    session_start();

    $email = $_POST['email'];
    $senha = $_POST['senha'];

    var_dump($email, $senha);

    if (empty($email)) {
        
        header('Location:../view/loguin.php?msg=Acesso indevido');

    }


    $usuarioDAO = new UsuarioDAO();

    $logado = $usuarioDAO->validarLogin($email, $senha);

    if ($logado) {
        header('Location:../view/index2.php');
        $_SESSION["id_Usuario"] = $logado["id_Usuario"];
        $_SESSION["nome"] = $logado["nome"];
        $_SESSION["perfil"] = $logado["perfil"];
    }else {
        header('Location:../view/login.php');
        $msg="Não existe";
        echo "$msg";
    }



?>