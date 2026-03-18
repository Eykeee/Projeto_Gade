<?php
    include_once '../model/DTO/UsuarioDTO.php';
    include_once '../model/DAO/UsuarioDAO.php';

      $id_Usuario = $_GET['id_Usuario'];

      var_dump($id_Usuario);


      $usuarioDAO = new UsuarioDAO();

      $sucesso = $usuarioDAO->excluirUsuario($id_Usuario);

      if($sucesso){
        header('Location:../view/listarUsuario.php');
      }







?>