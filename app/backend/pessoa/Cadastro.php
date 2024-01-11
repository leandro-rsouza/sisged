<?php
namespace app\backend\pessoa;

    abstract class Cadastro extends Endereco {
        private $id_cadastro;
        private $fk_endereco;
        private $nome;
        private $contato;
        private $email;

        public function setIdCadastro($id_cadastro){
            $this->id_cadastro = $id_cadastro;
        }

        public function getIdCadastro(){
            return $this->id_cadastro;
        }

        public function setNome($nome){
            $this->nome = $nome;
        }

        public function getNome(){
            return $this->nome;
        }

        public function setContato($contato){
            $this->contato = $contato;
        }

        public function getContato(){
            return $this->contato;
        }

        public function setEmail($email){
            $this->email = $email;
        }

        public function getEmail(){
            return $this->email;
        }

        public function getFkEndereco(){
            return $this->fk_endereco;
        }

        public function setFkEndereco($fk_endereco){
            $this->fk_endereco = $fk_endereco;
        }
    }
?>