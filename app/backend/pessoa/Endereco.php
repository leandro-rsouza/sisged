<?php
namespace app\backend\pessoa;

    abstract class Endereco {
        private $id_endereco;
        private $cep;
        private $logradouro;
        private $bairro;
        private $numero;

        public function setIdEndereco($id_endereco){
            $this->id_endereco = $id_endereco;
        }

        public function getIdEndereco(){
            return $this->id_endereco;
        }

        public function getCep(){
            return $this->cep;
        }

        public function setCep($cep){
            $this->cep = $cep;
            return $this;
        }

        public function setLogradouro($logradouro){
            $this->logradouro = $logradouro;
        }

        public function getLogradouro(){
            return $this->logradouro;
        }

        public function setBairro($bairro){
            $this->bairro = $bairro;
        }

        public function getBairro(){
            return $this->bairro;
        }

        public function setNumero($numero){
            $this->numero = $numero;
        }

        public function getNumero(){
            return $this->numero;
        }
    }
?>