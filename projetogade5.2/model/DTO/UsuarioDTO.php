<?php  

        class UsuarioDTO{
            private $nome;
            private $id_Usuario;
            private $email;
            private $senha;
            private $cpf;
            private $cep;
            private $perfil;
            private $endereco;
            private $ncasa;

            public function setNome($nome){
                $this->nome= $nome;
            }
            public function getNome(){
                return $this->nome;
            }
            public function setId_Usuario($id_Usuario){
                $this->id_Usuario = $id_Usuario;
            }
            public function getId_Usuario(){
                return $this->id_Usuario;
            }
            public function getEmail(){
                return $this->email;
            }
            public function setEmail($email){
                $this->email = $email;
            }
            public function getSenha(){
                return $this->senha;
            }
            public function setSenha($senha){
                $this->senha = $senha;
            }
            public function getCpf(){
                return $this->cpf;
            }
            public function setCpf($cpf){
                $this->cpf = $cpf;
            }
            public function getCep(){
                return $this->cep;
            }
            public function setCep($cep){
                $this->cep = $cep;
            }


            public function getEndereco(){
                return $this->endereco;
            }
            public function setEndereco($endereco){
                $this->endereco = $endereco;
            }
            public function getNCasa(){
                return $this->ncasa;
            }
            public function setNCasa($ncasa){
                $this->ncasa = $ncasa;
            }

            //////////////
            public function setPerfil($perfil){
                $this->perfil = $perfil;
            }
            public function getPerfil(){
                return $this->perfil;
            }
           
        }




?>