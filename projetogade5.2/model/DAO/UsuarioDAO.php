<?php

include_once 'Conexao.php';
include_once '../model/DTO/UsuarioDTO.php';

class UsuarioDAO
{
    public $pdo = null;
    public function __construct()
    {
        $this->pdo = Conexao::getInstance();
    }
    public function salvarUsuario(UsuarioDTO $usuarioDTO)
    {
        try {
            $sql = "INSERT INTO usuario(nome,email,senha,cpf,cep,endereco,ncasa) VALUES (?,?,?,?,?,?,?)";

            $stmt = $this->pdo->prepare($sql);

            //recuperar os dados dos usuariosDTO 
            $nome = $usuarioDTO->getNome();
            $email = $usuarioDTO->getEmail();
            $senha = $usuarioDTO->getSenha();
            $cpf = $usuarioDTO->getCpf();
            $cep = $usuarioDTO->getCep();
            $endereco = $usuarioDTO->getEndereco();
            $ncasa = $usuarioDTO->getNCasa();

            $stmt->bindValue(1, $nome);
            $stmt->bindValue(2, $email);
            $stmt->bindValue(3, $senha);
            $stmt->bindValue(4, $cpf);
            $stmt->bindValue(5, $cep);
            $stmt->bindValue(6, $endereco);
            $stmt->bindValue(7, $ncasa);

            $retorno = $stmt->execute();
            return $retorno;
        } catch (PDOException $exe) {
            echo $exe->getMessage();
        }
    }
    public function listarUsuarios()
    {
        try {
            $sql = "SELECT * FROM usuario";
            $stmt = $this->pdo->prepare($sql);

            $stmt->execute();

            $retorno = $stmt->fetchALL(PDO::FETCH_ASSOC);

            return $retorno;
        } catch (PDOException $exe) {
            echo $exe->getMessage();
        }
    }
    public function excluirUsuario($id_Usuario)
    {
        try {
            $sql = "DELETE FROM usuario where id_Usuario= ?";
            $stmt = $this->pdo->prepare($sql);

            $stmt->bindValue(1, $id_Usuario);

            $retorno = $stmt->execute();

            return $retorno;
        } catch (PDOException $exe) {
            echo $exe->getMessage();
        }
    }
    public function buscarUsuarioPorID($id_Usuario)
    {
        try {
            $sql = "SELECT * FROM usuario WHERE id_Usuario = {$id_Usuario}";
            $stmt = $this->pdo->prepare($sql);

            $stmt->execute();

            $retorno = $stmt->fetch(PDO::FETCH_ASSOC);
            return $retorno;
        } catch (PDOException $exe) {
            echo $exe->getMessage();
        }
    }
    public function alterarUsuario(UsuarioDTO $usuarioDTO)
    {
        try {
            $sql = "UPDATE usuario SET
                     nome=?,
                     email=?,
                     perfil=?,
                     cpf=?,
                     cep=?,
                     endereco=?,
                     ncasa=?

                    WHERE id_Usuario=?";
            $stmt = $this->pdo->prepare($sql);

            //recuperar os dados dos usuariosDTO
            $id_Usuario = $usuarioDTO->getId_Usuario();
            $nome = $usuarioDTO->getNome();
            $email = $usuarioDTO->getEmail();
            $perfil = $usuarioDTO->getPerfil();
            $cpf = $usuarioDTO->getCpf();
            $cep = $usuarioDTO->getCep();
            $endereco = $usuarioDTO->getEndereco();
            $ncasa = $usuarioDTO->getNCasa();
           


            $stmt->bindValue(1, $nome);
            $stmt->bindValue(2, $email);
            $stmt->bindValue(3, $perfil);
            $stmt->bindValue(4, $cpf);
            $stmt->bindValue(5, $cep);
            $stmt->bindValue(6, $endereco);
            $stmt->bindValue(7, $ncasa);
            $stmt->bindValue(8, $id_Usuario);



            $retorno = $stmt->execute();
            return $retorno;
        } catch (PDOException $exe) {
            echo $exe->getMessage();
        }
    }

    public function validarLogin($email, $senha)
    {
        try {

            $sql = "SELECT * FROM usuario WHERE email = '{$email}' AND senha = '{$senha}'";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();
            $logado = $stmt->fetch(PDO::FETCH_ASSOC);
            return $logado;
        } catch (PDOException $exe) {
            echo $exe->getMessage();
        }
    }
}
