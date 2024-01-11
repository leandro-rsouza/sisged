<?php
namespace app\backend\pessoa;

    class PessoaJuridica extends Cadastro {
        private $id_pj;
        private $fk_cadastro;
        private $cnpj;

        public function setIdJuridico($id_pj){
            $this->id_pj = $id_pj;
        }

        public function getIdJuridico(){
            return $this->id_pj;
        }

        public function setCnpj($cnpj){
            $this->cnpj = $cnpj;
        }

        public function getCnpj(){
            return $this->cnpj;
        }


        public function getFkCadastro(){
            return $this->fk_cadastro;
        }

        public function setFkCadastro($fk_cadastro){
            $this->fk_cadastro = $fk_cadastro;
        }
    }
?>